<?php

/**
 * Plugin Name: Wtyczka poprawiajaca prace z rezerwacjami w MotoPress Hotel Booking Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// -------------------------------------------------------------
// 1. SPRAWDZONY MECHANIZM: Podmiana statusu na draft przed zapisem
// -------------------------------------------------------------
add_filter( 'wp_insert_post_data', function( $data, $postarr ) {
    if ( isset( $data['post_type'] ) && in_array( $data['post_type'], array( 'mphb_booking', 'mphb_reserved_room' ), true ) ) {
        if ( isset( $data['post_status'] ) && in_array( $data['post_status'], array( 'pending-admin', 'pending' ), true ) ) {
            // Jeśli admin nie zatwierdza tego celowo w panelu, wymuś draft
            if ( ! isset( $_POST['mphb_manual_confirm_action'] ) ) {
                $data['post_status'] = 'draft';
            }
        }
    }
    return $data;
}, 10, 2 );

// Czyszczenie cache dostępności po zapisie
add_action( 'save_post', function( $post_id, $post, $update ) {
    if ( isset( $post->post_type ) && in_array( $post->post_type, array( 'mphb_booking', 'mphb_reserved_room' ), true ) ) {
        if ( function_exists( 'MPHB' ) && method_exists( MPHB(), 'getAvailabilityCache' ) ) {
            MPHB()->getAvailabilityCache()->clean();
        }
    }
}, 20, 3 );


// -------------------------------------------------------------
// 2. SORTOWANIE W PANELU ADMINA: Starsze wyżej (FIFO)
// -------------------------------------------------------------
add_action( 'pre_get_posts', function( $query ) {
    if ( is_admin() && $query->is_main_query() && $query->get( 'post_type' ) === 'mphb_booking' ) {
        if ( ! isset( $_GET['orderby'] ) ) {
            $query->set( 'orderby', 'date' );
            $query->set( 'order', 'ASC' );
        }
    }
} );


// -------------------------------------------------------------
// 3. FUNKCJA POMOCNICZA: Wykrywanie kolizji ze statusem confirmed
// -------------------------------------------------------------
function mphb_znajdz_kolizje( $booking_id ) {
    $check_in  = get_post_meta( $booking_id, 'mphb_check_in_date', true );
    $check_out = get_post_meta( $booking_id, 'mphb_check_out_date', true );

    if ( empty( $check_in ) || empty( $check_out ) ) {
        return false;
    }

    // Pobierz identyfikatory fizycznych domków przypisanych do tego zapytania
    $assigned_rooms = array();
    $res_rooms = get_posts( array(
        'post_type'      => 'mphb_reserved_room',
        'post_parent'    => $booking_id,
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
    ) );
    foreach ( $res_rooms as $r_id ) {
        $room_id = get_post_meta( $r_id, 'mphb_room_id', true );
        if ( $room_id ) {
            $assigned_rooms[] = $room_id;
        }
    }

    // Pobierz wszystkie POTWIERDZONE (confirmed) rezerwacje
    $confirmed_bookings = get_posts( array(
        'post_type'      => 'mphb_booking',
        'post_status'    => 'confirmed',
        'posts_per_page' => -1,
        'post__not_in'   => array( $booking_id ),
        'fields'         => 'ids',
    ) );

    foreach ( $confirmed_bookings as $conf_id ) {
        $c_in  = get_post_meta( $conf_id, 'mphb_check_in_date', true );
        $c_out = get_post_meta( $conf_id, 'mphb_check_out_date', true );

        if ( ! $c_in || ! $c_out ) {
            continue;
        }

        // Sprawdź nakładanie się przedziałów czasowych
        if ( ( $check_in < $c_out ) && ( $check_out > $c_in ) ) {
            $conf_rooms = array();
            $c_res = get_posts( array(
                'post_type'      => 'mphb_reserved_room',
                'post_parent'    => $conf_id,
                'posts_per_page' => -1,
                'post_status'    => 'any',
                'fields'         => 'ids',
            ) );
            foreach ( $c_res as $cr_id ) {
                $cr_room = get_post_meta( $cr_id, 'mphb_room_id', true );
                if ( $cr_room ) {
                    $conf_rooms[] = $cr_room;
                }
            }

            // Jeśli którykolwiek domek się pokrywa:
            if ( empty( $assigned_rooms ) || ! empty( array_intersect( $assigned_rooms, $conf_rooms ) ) ) {
                return $conf_id;
            }
        }
    }

    return false;
}


// -------------------------------------------------------------
// 4. BLOKADA PRZED PRZYPADKOWYM ZATWIERDZENIEM KOLIZJI
// -------------------------------------------------------------
add_action( 'save_post_mphb_booking', function( $post_id, $post, $update ) {
    if ( ! is_admin() || ! $update || wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
        return;
    }

    if ( $post->post_status !== 'confirmed' ) {
        return;
    }

    $conflict_id = mphb_znajdz_kolizje( $post_id );
    if ( $conflict_id ) {
        // Cofnij status do draft
        remove_action( 'save_post_mphb_booking', __FUNCTION__ );
        wp_update_post( array(
            'ID'          => $post_id,
            'post_status' => 'draft',
        ) );
        add_action( 'save_post_mphb_booking', __FUNCTION__, 10, 3 );

        // Ustaw powiadomienie o błędzie
        set_transient( 'mphb_kolizja_error_' . get_current_user_id(), array(
            'attempted' => $post_id,
            'conflict'  => $conflict_id,
        ), 45 );
    }
}, 20, 3 );

add_action( 'admin_notices', function() {
    $error = get_transient( 'mphb_kolizja_error_' . get_current_user_id() );
    if ( $error ) {
        delete_transient( 'mphb_kolizja_error_' . get_current_user_id() );
        ?>
        <div class="notice notice-error is-dismissible" style="border-left-color: #d63638; padding: 12px;">
            <p style="font-size: 15px; font-weight: bold; margin: 0 0 5px 0; color: #d63638;">
                ⚠️ BLOKADA ZATWIERDZENIA: Termin jest już zajęty!
            </p>
            <p style="margin: 0;">
                Nie można zatwierdzić rezerwacji <strong>#<?php echo esc_html( $error['attempted'] ); ?></strong>, 
                ponieważ nakłada się na potwierdzoną rezerwację 
                <strong><a href="<?php echo esc_url( get_edit_post_link( $error['conflict'] ) ); ?>">#<?php echo esc_html( $error['conflict'] ); ?></a></strong>.
                <br>Status rezerwacji pozostał jako <strong>Szkic (Draft)</strong>.
            </p>
        </div>
        <?php
    }
} );


// -------------------------------------------------------------
// 5. ŻÓŁTE PODŚWIETLENIE I ETYKIETA KOLIZJI NA LIŚCIE REZERWACJI
// -------------------------------------------------------------
add_filter( 'post_class', function( $classes, $class, $post_id ) {
    if ( is_admin() && get_post_type( $post_id ) === 'mphb_booking' ) {
        if ( get_post_status( $post_id ) === 'draft' ) {
            if ( mphb_znajdz_kolizje( $post_id ) ) {
                $classes[] = 'mphb-kolizja-row';
            }
        }
    }
    return $classes;
}, 10, 3 );

add_action( 'admin_head', function() {
    $screen = get_current_screen();
    if ( $screen && $screen->post_type === 'mphb_booking' ) {
        ?>
        <style>
            tr.mphb-kolizja-row {
                background-color: #fff9e6 !important;
                border-left: 5px solid #dba617 !important;
            }
            tr.mphb-kolizja-row:hover {
                background-color: #fff2c4 !important;
            }
            .mphb-badge-kolizja {
                display: inline-block;
                background-color: #ffe69c;
                color: #7a5400;
                border: 1px solid #e0c268;
                padding: 2px 7px;
                border-radius: 4px;
                font-size: 11px;
                font-weight: 600;
                margin-left: 6px;
            }
        </style>
        <?php
    }
} );

add_filter( 'the_title', function( $title, $id ) {
    if ( is_admin() && get_post_type( $id ) === 'mphb_booking' && in_the_loop() ) {
        if ( get_post_status( $id ) === 'draft' ) {
            $conflict_id = mphb_znajdz_kolizje( $id );
            if ( $conflict_id ) {
                $title .= ' <span class="mphb-badge-kolizja">⚠️ Kolizja z #' . esc_html( $conflict_id ) . '</span>';
            }
        }
    }
    return $title;
}, 10, 2 );
?>