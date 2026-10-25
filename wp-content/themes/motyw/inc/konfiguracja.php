<?php
/**
 * Konfiguracja strony przy włączeniu motywu i po wgraniu nowych podstron.
 *
 * Deploy przez FTP przenosi na serwer tylko pliki, a strony i menu są w bazie danych.
 * Dlatego motyw sam zakłada brakujące strony z listy (inc/strony.php) i wstawia do pustych
 * stron treść startową. Niczego nie nadpisuje ani nie usuwa, więc może działać wielokrotnie.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'motyw_konfiguracja' );
add_action( 'admin_init', 'motyw_sprawdz_strony' );

/**
 * Przy włączeniu motywu: ustawia stronę główną, uzupełnia strony z listy i tworzy menu główne.
 */
function motyw_konfiguracja() {
	$strona_glowna = motyw_ustaw_strone_glowna();
	$strony        = motyw_uzupelnij_strony();

	motyw_utworz_menu( array(
		$strona_glowna,
		isset( $strony['cennik'] ) ? $strony['cennik'] : 0,
		isset( $strony['kontakt'] ) ? $strony['kontakt'] : 0,
	) );
}

/**
 * Po deployu, który zmienia listę stron albo pliki treści startowej, uzupełnia strony
 * przy pierwszym wejściu do panelu. Wybór strony głównej zostaje bez zmian.
 */
function motyw_sprawdz_strony() {
	if ( ! current_user_can( 'edit_pages' ) || get_option( 'motyw_podpis_stron' ) === motyw_podpis_stron() ) {
		return;
	}

	// WordPress zapamiętuje listę wzorców z patterns/; nowe pliki mają być widoczne w edytorze od razu.
	wp_get_theme()->delete_pattern_cache();

	motyw_uzupelnij_strony();
}

/**
 * Zwraca podpis listy stron i plików treści startowej. Zmienia się, gdy dojdzie nowa strona lub plik.
 *
 * @return string
 */
function motyw_podpis_stron() {
	$pliki = glob( get_theme_file_path( 'patterns/*.php' ) );

	return md5( wp_json_encode( array(
		array_keys( motyw_lista_stron() ),
		array_map( 'basename', $pliki ? $pliki : array() ),
	) ) );
}

/**
 * Zakłada brakujące strony z listy i wstawia treść startową do stron pustych.
 *
 * Strona, którą motyw już raz założył lub znalazł, nie jest zakładana ponownie,
 * więc strona usunięta celowo w panelu nie wraca.
 *
 * @return int[] Adres strony => ID strony (0, gdy strony nie ma).
 */
function motyw_uzupelnij_strony() {
	$znane = (array) get_option( 'motyw_znane_strony', array() );
	$wynik = array();

	foreach ( motyw_lista_stron() as $slug => $tytul ) {
		if ( 'strona-glowna' === $slug ) {
			// Treść strony głównej trafia do strony wybranej w Ustawienia → Czytanie.
			$id = 'page' === get_option( 'show_on_front' ) ? (int) get_option( 'page_on_front' ) : 0;
		} else {
			$id = motyw_znajdz_strone( $slug );

			if ( ! $id && ! in_array( $slug, $znane, true ) ) {
				$id = motyw_utworz_strone( $slug, $tytul );
			}
		}

		if ( $id ) {
			$znane[] = $slug;
			motyw_wstaw_tresc_startowa( $id, $slug );
		}

		$wynik[ $slug ] = $id;
	}

	update_option( 'motyw_znane_strony', array_values( array_unique( $znane ) ), false );
	update_option( 'motyw_podpis_stron', motyw_podpis_stron(), false );

	return $wynik;
}

/**
 * Zwraca ID opublikowanej strony o podanym adresie albo 0.
 *
 * @param string $slug Adres strony, np. 'cennik'.
 * @return int
 */
function motyw_znajdz_strone( $slug ) {
	$strona = get_page_by_path( $slug );

	return ( $strona && 'publish' === $strona->post_status ) ? $strona->ID : 0;
}

/**
 * Zwraca ID opublikowanej strony o podanym adresie. Gdy jej nie ma, zakłada ją.
 *
 * @param string $slug  Adres strony, np. 'cennik'.
 * @param string $tytul Tytuł nowej strony.
 * @return int ID strony albo 0 przy błędzie.
 */
function motyw_utworz_strone( $slug, $tytul ) {
	$strona = get_page_by_path( $slug );

	// Strona istnieje, ale np. jako szkic: nie publikujemy jej za kogoś.
	if ( $strona ) {
		return 'publish' === $strona->post_status ? $strona->ID : 0;
	}

	$id = wp_insert_post( array(
		'post_type'   => 'page',
		'post_status' => 'publish',
		'post_title'  => $tytul,
		'post_name'   => $slug,
	) );

	return is_wp_error( $id ) ? 0 : $id;
}

/**
 * Wstawia treść startową do strony, ale tylko gdy strona jest pusta i treść startowa istnieje.
 *
 * @param int    $id   ID strony.
 * @param string $slug Adres strony z listy, określa plik treści startowej.
 */
function motyw_wstaw_tresc_startowa( $id, $slug ) {
	$tresc = motyw_tresc_startowa( $slug );

	if ( '' === $tresc || '' !== trim( get_post_field( 'post_content', $id ) ) ) {
		return;
	}

	// Treść pochodzi z plików motywu, więc nie przepuszczamy jej przez filtr HTML dla autorów.
	$filtr = false !== has_filter( 'content_save_pre', 'wp_filter_post_kses' );
	kses_remove_filters();

	wp_update_post( array(
		'ID'           => $id,
		'post_content' => $tresc,
	) );

	if ( $filtr ) {
		kses_init_filters();
	}
}

/**
 * Ustawia statyczną stronę główną, jeśli w Ustawienia → Czytanie żadna nie jest wybrana.
 *
 * @return int ID strony głównej, także już wcześniej ustawionej, albo 0.
 */
function motyw_ustaw_strone_glowna() {
	$obecna = (int) get_option( 'page_on_front' );

	if ( 'page' === get_option( 'show_on_front' ) && $obecna ) {
		return $obecna;
	}

	$id = motyw_utworz_strone( 'strona-glowna', __( 'Strona główna', 'motyw' ) );

	if ( $id ) {
		update_option( 'page_on_front', $id );
		update_option( 'show_on_front', 'page' );
	}

	return $id;
}

/**
 * Tworzy menu główne z podanych stron, jeśli do lokalizacji 'primary' nie przypisano menu.
 *
 * @param int[] $strony ID stron w kolejności pozycji menu. Zera są pomijane.
 */
function motyw_utworz_menu( $strony ) {
	if ( has_nav_menu( 'primary' ) ) {
		return;
	}

	$nazwa = __( 'Menu główne', 'motyw' );

	// Menu o tej nazwie już istnieje: tylko je przypisujemy, bez dopisywania pozycji.
	$menu = wp_get_nav_menu_object( $nazwa );

	if ( $menu ) {
		$menu_id = $menu->term_id;
	} else {
		$menu_id = wp_create_nav_menu( $nazwa );

		if ( is_wp_error( $menu_id ) ) {
			return;
		}

		foreach ( array_filter( $strony ) as $strona_id ) {
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-object-id' => $strona_id,
				'menu-item-object'    => 'page',
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
			) );
		}
	}

	$lokalizacje            = get_theme_mod( 'nav_menu_locations', array() );
	$lokalizacje['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $lokalizacje );
}
