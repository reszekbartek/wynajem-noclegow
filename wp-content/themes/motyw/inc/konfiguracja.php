<?php
/**
 * Konfiguracja strony przy włączeniu motywu.
 *
 * Deploy przez FTP przenosi na serwer tylko pliki, a strony i menu są w bazie danych.
 * Dlatego motyw przy włączeniu sam zakłada to, czego mu brakuje. Niczego nie nadpisuje
 * ani nie usuwa, więc ponowne włączenie motywu jest bezpieczne.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'motyw_konfiguracja' );

/**
 * Zakłada brakujące strony, ustawia stronę główną i menu główne.
 */
function motyw_konfiguracja() {
	$strona_glowna = motyw_ustaw_strone_glowna();

	$cennik  = motyw_utworz_strone( 'cennik', __( 'Cennik', 'motyw' ) );
	$kontakt = motyw_utworz_strone( 'kontakt', __( 'Kontakt', 'motyw' ) );

	motyw_utworz_menu( array( $strona_glowna, $cennik, $kontakt ) );
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
