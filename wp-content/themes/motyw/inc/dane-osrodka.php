<?php
/**
 * Dane ośrodka w jednym miejscu. Korzystają z nich nagłówek, stopka i strona Kontakt.
 *
 * Wartości można zmienić w panelu: Wygląd → Dostosuj → Dane ośrodka (inc/customizer.php).
 * Dopóki pole w panelu jest puste, używana jest wartość domyślna z tego pliku.
 *
 * Źródło wartości domyślnych: https://wiele.com.pl/kontakt/
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Zwraca domyślne dane ośrodka jako płaską listę pól, takich samych jak w panelu.
 *
 * @return array
 */
function motyw_dane_domyslne() {
	return array(
		'nazwa'           => 'Ośrodek Kolonijno-Wczasowy BEAVER',
		'firma'           => 'BEAVER-Tourist s.c.',
		'adres'           => 'Wiele – Rogalewo 1',
		'kod_miasto'      => '83-441 Karsin',
		'wojewodztwo'     => 'woj. pomorskie',
		'telefon_1_opis'  => 'Informacja i rezerwacje grupowe',
		'telefon_1_numer' => '+48 604 880 644',
		'telefon_2_opis'  => 'Recepcja',
		'telefon_2_numer' => '+48 58 687 34 24',
		'email'           => 'wczasy.info@gmail.com',
		'konto'           => '52 1090 1098 0000 0001 4487 8421',
		'facebook'        => 'https://www.facebook.com/beavertourist/',
	);
}

/**
 * Zwraca wartość pola: z panelu, a gdy pole w panelu jest puste, wartość domyślną.
 *
 * @param string $pole Klucz z motyw_dane_domyslne(), np. 'telefon_1_numer'.
 * @return string
 */
function motyw_dane_pole( $pole ) {
	$domyslne = motyw_dane_domyslne();
	$wartosc  = trim( (string) get_theme_mod( 'motyw_' . $pole, '' ) );

	if ( '' !== $wartosc ) {
		return $wartosc;
	}

	return isset( $domyslne[ $pole ] ) ? $domyslne[ $pole ] : '';
}

/**
 * Zwraca wszystkie dane ośrodka. Telefony są zebrane w listę 'telefony'.
 *
 * @return array
 */
function motyw_dane_osrodka() {
	$dane = array();

	foreach ( array_keys( motyw_dane_domyslne() ) as $pole ) {
		if ( 0 !== strpos( $pole, 'telefon_' ) ) {
			$dane[ $pole ] = motyw_dane_pole( $pole );
		}
	}

	$dane['telefony'] = array();

	foreach ( array( 1, 2 ) as $nr ) {
		$dane['telefony'][] = array(
			'opis'  => motyw_dane_pole( 'telefon_' . $nr . '_opis' ),
			'numer' => motyw_dane_pole( 'telefon_' . $nr . '_numer' ),
		);
	}

	return $dane;
}

/**
 * Zwraca jedną wartość z danych ośrodka.
 *
 * @param string $klucz Klucz z tablicy motyw_dane_osrodka(), np. 'email' albo 'telefony'.
 * @return mixed Wartość albo pusty tekst, gdy klucza nie ma.
 */
function motyw_dane( $klucz ) {
	$dane = motyw_dane_osrodka();

	return isset( $dane[ $klucz ] ) ? $dane[ $klucz ] : '';
}

/**
 * Zamienia numer telefonu na adres linku tel:, np. '+48 58 687 34 24' -> 'tel:+48586873424'.
 *
 * @param string $numer Numer telefonu w dowolnym zapisie.
 * @return string
 */
function motyw_link_tel( $numer ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $numer );
}
