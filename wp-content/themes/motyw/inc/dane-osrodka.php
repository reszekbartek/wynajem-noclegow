<?php
/**
 * Dane ośrodka w jednym miejscu. Korzystają z nich nagłówek, stopka i strona Kontakt.
 *
 * Źródło: https://wiele.com.pl/kontakt/
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Zwraca wszystkie dane ośrodka.
 *
 * @return array
 */
function motyw_dane_osrodka() {
	return array(
		'nazwa'       => 'Ośrodek Kolonijno-Wczasowy BEAVER',
		'firma'       => 'BEAVER-Tourist s.c.',
		'adres'       => 'Wiele – Rogalewo 1',
		'kod_miasto'  => '83-441 Karsin',
		'wojewodztwo' => 'woj. pomorskie',
		'telefony'    => array(
			array(
				'opis'  => 'Informacja i rezerwacje grupowe',
				'numer' => '+48 604 880 644',
			),
			array(
				'opis'  => 'Recepcja',
				'numer' => '+48 58 687 34 24',
			),
		),
		'email'       => 'wczasy.info@gmail.com',
		'konto'       => '52 1090 1098 0000 0001 4487 8421',
		'facebook'    => 'https://www.facebook.com/beavertourist/',
	);
}

/**
 * Zwraca jedną wartość z danych ośrodka.
 *
 * @param string $klucz Klucz z tablicy motyw_dane_osrodka(), np. 'email'.
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
