<?php
/**
 * Nagłówek strony: sekcja <head>, logo i menu główne.
 *
 * @package Motyw
 */

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
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
			<a class="naglowek__nazwa" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav class="nawigacja" aria-label="<?php esc_attr_e( 'Menu główne', 'motyw' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'nawigacja__lista',
					'depth'          => 1,
				) );
				?>
			</nav>
		<?php endif; ?>
	</div>
</header>

<main id="tresc" class="tresc">
