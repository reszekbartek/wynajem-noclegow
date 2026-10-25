<?php
/**
 * Komentarze. Wyświetlane tylko tam, gdzie komentarze są włączone.
 *
 * @package Motyw
 */

if ( post_password_required() ) {
	return;
}
?>

<section id="komentarze" class="komentarze">
	<?php if ( have_comments() ) : ?>
		<h2 class="komentarze__tytul">
			<?php
			/* translators: %s: liczba komentarzy */
			printf( esc_html( _n( '%s komentarz', '%s komentarzy', get_comments_number(), 'motyw' ) ), esc_html( number_format_i18n( get_comments_number() ) ) );
			?>
		</h2>

		<ol class="komentarze__lista">
			<?php wp_list_comments( array( 'style' => 'ol' ) ); ?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
