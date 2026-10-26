<?php
/**
 * Nagłówek strony: sekcja <head>, logo, menu główne, telefon i przycisk rezerwacji.
 *
 * @package Motyw
 */

$motyw_telefon    = motyw_dane( 'telefony' )[0]['numer'];
$motyw_rezerwacja = motyw_url_rezerwacji();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#tresc"><?php esc_html_e( 'Przejdź do treści', 'motyw' ); ?></a>

<header class="naglowek">
	<div class="kontener naglowek__wnetrze">
		<div class="naglowek__logo">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="custom-logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo-beaver.png' ) ); ?>" width="384" height="163" alt="<?php echo esc_attr( motyw_dane( 'nazwa' ) ); ?>">
				</a>
			<?php endif; ?>
		</div>

		<button class="naglowek__przycisk-menu" type="button" aria-controls="nawigacja" aria-expanded="false">
			<span class="naglowek__ikona-menu" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'motyw' ); ?></span>
		</button>

		<nav id="nawigacja" class="nawigacja" aria-label="<?php esc_attr_e( 'Menu główne', 'motyw' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_id'        => 'menu-glowne',
				'menu_class'     => 'nawigacja__lista',
				'depth'          => 1,
				'fallback_cb'    => 'motyw_menu_domyslne',
			) );
			?>

			<div class="nawigacja__dodatki">
				<a class="nawigacja__telefon" href="<?php echo esc_url( motyw_link_tel( $motyw_telefon ), array( 'tel' ) ); ?>">
					<?php echo esc_html( $motyw_telefon ); ?>
				</a>

				<?php if ( $motyw_rezerwacja ) : ?>
					<a class="przycisk przycisk--rezerwacja" href="<?php echo esc_url( $motyw_rezerwacja ); ?>"><?php esc_html_e( 'Rezerwacja', 'motyw' ); ?></a>
				<?php endif; ?>
			</div>
		</nav>
	</div>
</header>

<main id="tresc" class="tresc">
