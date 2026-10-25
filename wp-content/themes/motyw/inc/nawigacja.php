<?php
/**
 * Nawigacja: link do rezerwacji i menu domyślne.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Zwraca adres strony startowej rezerwacji albo pusty tekst, gdy takiej strony nie ma.
 *
 * Kolejność wyboru:
 * 1. opublikowana strona o adresie /rezerwacja/,
 * 2. strona z wyszukiwarką terminów MotoPress [mphb_availability_search],
 * 3. strona z listą domków MotoPress [mphb_rooms].
 *
 * Wynik można nadpisać filtrem 'motyw_url_rezerwacji'.
 *
 * @return string
 */
function motyw_url_rezerwacji() {
	static $url = null;

	if ( null !== $url ) {
		return $url;
	}

	$url    = '';
	$strona = get_page_by_path( 'rezerwacja' );

	if ( $strona && 'publish' === $strona->post_status ) {
		$url = get_permalink( $strona );
	} else {
		foreach ( array( 'mphb_availability_search', 'mphb_rooms' ) as $shortcode ) {
			$id = motyw_znajdz_strone_z_shortcodem( $shortcode );

			if ( $id ) {
				$url = get_permalink( $id );
				break;
			}
		}
	}

	$url = (string) apply_filters( 'motyw_url_rezerwacji', $url );

	return $url;
}

/**
 * Zwraca ID najstarszej opublikowanej strony zawierającej podany shortcode albo 0.
 *
 * @param string $shortcode Nazwa shortcode'u bez nawiasów, np. 'mphb_rooms'.
 * @return int
 */
function motyw_znajdz_strone_z_shortcodem( $shortcode ) {
	$strony = get_posts( array(
		'post_type'      => 'page',
		'post_status'    => 'publish',
		's'              => '[' . $shortcode,
		'orderby'        => 'ID',
		'order'          => 'ASC',
		'posts_per_page' => 10,
	) );

	foreach ( $strony as $strona ) {
		if ( has_shortcode( $strona->post_content, $shortcode ) ) {
			return $strona->ID;
		}
	}

	return 0;
}

/**
 * Menu domyślne, gdy do lokalizacji 'primary' nie przypisano menu.
 * Pokazuje stronę główną oraz strony Cennik i Kontakt, jeśli istnieją.
 *
 * @param array $args Argumenty wp_nav_menu().
 */
function motyw_menu_domyslne( $args ) {
	$pozycje = array(
		array(
			'tytul'   => __( 'Strona główna', 'motyw' ),
			'url'     => home_url( '/' ),
			'aktywna' => is_front_page(),
		),
	);

	foreach ( array( 'cennik' => __( 'Cennik', 'motyw' ), 'kontakt' => __( 'Kontakt', 'motyw' ) ) as $slug => $tytul ) {
		$strona = get_page_by_path( $slug );

		if ( $strona && 'publish' === $strona->post_status ) {
			$pozycje[] = array(
				'tytul'   => $tytul,
				'url'     => get_permalink( $strona ),
				'aktywna' => is_page( $strona->ID ),
			);
		}
	}

	printf( '<ul id="%s" class="%s">', esc_attr( $args['menu_id'] ), esc_attr( $args['menu_class'] ) );

	foreach ( $pozycje as $pozycja ) {
		printf(
			'<li class="menu-item%s"><a href="%s"%s>%s</a></li>',
			$pozycja['aktywna'] ? ' current-menu-item' : '',
			esc_url( $pozycja['url'] ),
			$pozycja['aktywna'] ? ' aria-current="page"' : '',
			esc_html( $pozycja['tytul'] )
		);
	}

	echo '</ul>';
}

/**
 * Oznacza, że przeglądarka obsługuje JavaScript (klasa "js" na <html>).
 * Bez JavaScriptu menu na telefonie jest zawsze rozwinięte, więc nawigacja działa.
 */
add_action( 'wp_head', function() {
	wp_print_inline_script_tag( "document.documentElement.classList.add('js');" );
}, 1 );
