<?php
/**
 * Lista stron motywu i ich treść startowa.
 *
 * Treść startowa strony to plik patterns/<adres-strony>.php z blokami edytora. Motyw wstawia ją
 * do strony tylko raz, gdy strona jest pusta (inc/konfiguracja.php). Potem treść edytuje się
 * normalnie w edytorze WordPressa. Plik jest też dostępny jako wzorzec bloków w kategorii
 * „Ośrodek BEAVER”, więc w razie potrzeby można wstawić treść startową ponownie.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Zwraca listę stron motywu: adres strony => tytuł.
 * Nowa podstrona to nowy wpis tutaj i plik patterns/<adres-strony>.php.
 *
 * @return array
 */
function motyw_lista_stron() {
	$strony = array(
		'strona-glowna' => __( 'Strona główna', 'motyw' ),
		'cennik'        => __( 'Cennik', 'motyw' ),
		'kontakt'       => __( 'Kontakt', 'motyw' ),
	);

	return apply_filters( 'motyw_lista_stron', $strony );
}

/**
 * Zwraca treść startową strony z pliku patterns/<adres-strony>.php albo pusty tekst, gdy pliku nie ma.
 *
 * @param string $slug Adres strony, np. 'cennik'.
 * @return string
 */
function motyw_tresc_startowa( $slug ) {
	$plik = get_theme_file_path( 'patterns/' . sanitize_file_name( $slug ) . '.php' );

	if ( ! file_exists( $plik ) ) {
		return '';
	}

	ob_start();
	include $plik;

	return trim( ob_get_clean() );
}

/**
 * Adres zdjęcia motywu w formacie WebP, np. motyw_obraz( 'glowna/jezioro' ) dla assets/img/glowna/jezioro.webp.
 * Używane w plikach treści startowej (patterns/).
 *
 * @param string $nazwa Ścieżka w assets/img/ bez rozszerzenia.
 * @return string
 */
function motyw_obraz( $nazwa ) {
	return get_theme_file_uri( 'assets/img/' . $nazwa . '.webp' );
}

add_action( 'init', function() {
	register_block_pattern_category( 'motyw', array(
		'label' => __( 'Ośrodek BEAVER', 'motyw' ),
	) );
} );
