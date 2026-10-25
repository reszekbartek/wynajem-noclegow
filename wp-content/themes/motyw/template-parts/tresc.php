<?php
/**
 * Treść pojedynczej strony lub wpisu: tytuł, obrazek wyróżniający i treść.
 * Używana przez page.php i singular.php.
 *
 * @package Motyw
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'wpis' ); ?>>
	<h1 class="tytul-strony"><?php the_title(); ?></h1>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="wpis__obrazek"><?php the_post_thumbnail( 'large' ); ?></div>
	<?php endif; ?>

	<div class="wpis__tresc">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<nav class="wpis__strony">' . esc_html__( 'Strony:', 'motyw' ),
			'after'  => '</nav>',
		) );
		?>
	</div>
</article>
