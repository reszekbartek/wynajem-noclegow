<?php
/**
 * Strona „nie znaleziono” (błąd 404).
 *
 * @package Motyw
 */

get_header();
?>

<div class="kontener">
	<h1 class="tytul-strony"><?php esc_html_e( 'Nie znaleziono strony', 'motyw' ); ?></h1>
	<p><?php esc_html_e( 'Strona, której szukasz, nie istnieje lub została przeniesiona.', 'motyw' ); ?></p>
	<p><a class="przycisk" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Wróć na stronę główną', 'motyw' ); ?></a></p>
</div>

<?php
get_footer();
