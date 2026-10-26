<?php
/**
 * Sekcja „Dane ośrodka” w Wygląd → Dostosuj.
 *
 * Każde pole zapisuje się jako ustawienie motywu 'motyw_<pole>'. Pola są wypełnione wartościami
 * domyślnymi z inc/dane-osrodka.php, a wyczyszczone pole przywraca wartość domyślną.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Opis pól panelu: etykieta, typ pola i sposób sprawdzania wartości.
 *
 * @return array
 */
function motyw_pola_danych() {
	return array(
		'nazwa'           => array( 'etykieta' => __( 'Nazwa ośrodka', 'motyw' ) ),
		'firma'           => array( 'etykieta' => __( 'Nazwa firmy', 'motyw' ) ),
		'adres'           => array( 'etykieta' => __( 'Adres', 'motyw' ) ),
		'kod_miasto'      => array( 'etykieta' => __( 'Kod pocztowy i miejscowość', 'motyw' ) ),
		'wojewodztwo'     => array( 'etykieta' => __( 'Województwo', 'motyw' ) ),
		'telefon_1_opis'  => array( 'etykieta' => __( 'Telefon 1: opis', 'motyw' ) ),
		'telefon_1_numer' => array(
			'etykieta' => __( 'Telefon 1: numer', 'motyw' ),
			'typ'      => 'tel',
		),
		'telefon_2_opis'  => array( 'etykieta' => __( 'Telefon 2: opis', 'motyw' ) ),
		'telefon_2_numer' => array(
			'etykieta' => __( 'Telefon 2: numer', 'motyw' ),
			'typ'      => 'tel',
		),
		'email'           => array(
			'etykieta' => __( 'E-mail', 'motyw' ),
			'typ'      => 'email',
		),
		'konto'           => array( 'etykieta' => __( 'Numer konta', 'motyw' ) ),
		'facebook'        => array(
			'etykieta' => __( 'Profil na Facebooku (adres)', 'motyw' ),
			'typ'      => 'url',
		),
	);
}

add_action( 'customize_register', function( $wp_customize ) {
	$domyslne = motyw_dane_domyslne();

	$wp_customize->add_section( 'motyw_dane_osrodka', array(
		'title'       => __( 'Dane ośrodka', 'motyw' ),
		'description' => __( 'Dane wyświetlane w nagłówku, stopce i na stronie Kontakt. Wyczyszczenie pola przywraca wartość domyślną.', 'motyw' ),
		'priority'    => 30,
	) );

	foreach ( motyw_pola_danych() as $pole => $opis ) {
		$typ = isset( $opis['typ'] ) ? $opis['typ'] : 'text';

		// Wartość domyślna jest od razu wpisana w pole, więc można poprawić np. jedną cyfrę numeru.
		$wp_customize->add_setting( 'motyw_' . $pole, array(
			'type'              => 'theme_mod',
			'default'           => $domyslne[ $pole ],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'url' === $typ ? 'esc_url_raw' : ( 'email' === $typ ? 'sanitize_email' : 'sanitize_text_field' ),
			'validate_callback' => function( $wynik, $wartosc ) use ( $typ ) {
				return motyw_sprawdz_pole( $wynik, $wartosc, $typ );
			},
		) );

		$wp_customize->add_control( 'motyw_' . $pole, array(
			'label'       => $opis['etykieta'],
			'section'     => 'motyw_dane_osrodka',
			'type'        => $typ,
			'input_attrs' => array( 'placeholder' => $domyslne[ $pole ] ),
		) );
	}
} );

/**
 * Sprawdza wartość pola przed zapisem. Przy błędzie panel pokazuje komunikat i nie zapisuje zmian.
 *
 * @param WP_Error $wynik   Obiekt błędów przekazany przez WordPressa.
 * @param string   $wartosc Wpisana wartość.
 * @param string   $typ     Typ pola: text, tel, email albo url.
 * @return WP_Error
 */
function motyw_sprawdz_pole( $wynik, $wartosc, $typ ) {
	$wartosc = trim( (string) $wartosc );

	// Puste pole jest poprawne: oznacza powrót do wartości domyślnej.
	if ( '' === $wartosc ) {
		return $wynik;
	}

	if ( 'email' === $typ && ! is_email( $wartosc ) ) {
		$wynik->add( 'niepoprawny_email', __( 'Wpisz poprawny adres e-mail, np. biuro@example.com.', 'motyw' ) );
	} elseif ( 'tel' === $typ && ! preg_match( '/^\+?[0-9 ()\-]{6,20}$/', $wartosc ) ) {
		$wynik->add( 'niepoprawny_telefon', __( 'Numer telefonu może zawierać tylko cyfry, spacje, myślniki, nawiasy i znak + na początku.', 'motyw' ) );
	} elseif ( 'url' === $typ && ! wp_http_validate_url( $wartosc ) ) {
		$wynik->add( 'niepoprawny_adres', __( 'Wpisz pełny adres strony zaczynający się od https://.', 'motyw' ) );
	}

	return $wynik;
}
