<?php
/**
 * Funkcje motywu: obsługiwane funkcje WordPressa, menu, style i skrypty.
 *
 * @package Motyw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_theme_file_path( 'inc/dane-osrodka.php' );
require get_theme_file_path( 'inc/customizer.php' );
require get_theme_file_path( 'inc/strony.php' );
require get_theme_file_path( 'inc/konfiguracja.php' );
require get_theme_file_path( 'inc/nawigacja.php' );

// -------------------------------------------------------------
// 1. FUNKCJE MOTYWU I LOKALIZACJE MENU
// -------------------------------------------------------------
add_action( 'after_setup_theme', function() {
	// Maksymalna szerokość treści (np. osadzonych filmów).
	$GLOBALS['content_width'] = 1100;

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
		'navigation-widgets',
	) );

	register_nav_menus( array(
		'primary' => __( 'Menu główne', 'motyw' ),
	) );

	// Edytor bloków: style motywu w edytorze, szerokie bloki i kolory ośrodka do wyboru.
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'assets/css/main.css', 'assets/css/edytor.css' ) );
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Zielony', 'motyw' ),
			'slug'  => 'zielony',
			'color' => '#2f6b3f',
		),
		array(
			'name'  => __( 'Ciemnozielony', 'motyw' ),
			'slug'  => 'ciemnozielony',
			'color' => '#234f2f',
		),
		array(
			'name'  => __( 'Pomarańczowy', 'motyw' ),
			'slug'  => 'pomaranczowy',
			'color' => '#c2540a',
		),
		array(
			'name'  => __( 'Jasne tło', 'motyw' ),
			'slug'  => 'jasne-tlo',
			'color' => '#f3f6f1',
		),
		array(
			'name'  => __( 'Tekst', 'motyw' ),
			'slug'  => 'tekst',
			'color' => '#1f2a24',
		),
		array(
			'name'  => __( 'Biały', 'motyw' ),
			'slug'  => 'bialy',
			'color' => '#ffffff',
		),
	) );
} );

// -------------------------------------------------------------
// 2. STYLE I SKRYPTY
// -------------------------------------------------------------
add_action( 'wp_enqueue_scripts', function() {
	$wersja = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'motyw', get_theme_file_uri( 'assets/css/main.css' ), array(), $wersja );
	wp_enqueue_script( 'motyw', get_theme_file_uri( 'assets/js/main.js' ), array(), $wersja, array(
		'in_footer' => true,
		'strategy'  => 'defer',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );
