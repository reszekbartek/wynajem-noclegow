<?php
/**
 * Style bloków motywu do wyboru w edytorze (panel bloku → Style).
 *
 * - Grupa „Slider”: bloki „Okładka” w grupie wyświetlają się jako przewijane slajdy (assets/js/slider.js).
 * - Galeria „Pasek przewijany”: zdjęcia w jednym rzędzie przewijanym w poziomie.
 *
 * Wygląd obu stylów jest w assets/css/strona.css, ładowanym tylko na stronie, nie w edytorze,
 * żeby w edytorze slajdy i zdjęcia były ułożone jeden pod drugim i łatwe do poprawiania.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', function() {
	register_block_style( 'core/group', array(
		'name'  => 'slider',
		'label' => __( 'Slider', 'motyw' ),
	) );

	register_block_style( 'core/gallery', array(
		'name'  => 'pasek',
		'label' => __( 'Pasek przewijany', 'motyw' ),
	) );
} );
