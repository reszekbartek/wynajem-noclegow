<?php
/**
 * Szablon awaryjny: WordPress używa go, gdy nie ma bardziej szczegółowego,
 * np. dla listy wpisów, archiwów i wyników wyszukiwania.
 *
 * @package Motyw
 */

get_header();
?>

<div class="kontener">
	<?php if ( have_posts() ) : ?>

		<?php if ( ! is_front_page() ) : ?>
			<h1 class="tytul-strony">
				<?php
				if ( is_home() ) {
					single_post_title();
				} elseif ( is_search() ) {
					/* translators: %s: szukana fraza */
					printf( esc_html__( 'Wyniki wyszukiwania: %s', 'motyw' ), esc_html( get_search_query( false ) ) );
				} else {
					the_archive_title();
				}
				?>
			</h1>
		<?php endif; ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'wpis' ); ?>>
				<h2 class="wpis__tytul"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>

		<?php the_posts_pagination(); ?>

	<?php else : ?>

		<h1 class="tytul-strony"><?php esc_html_e( 'Nic nie znaleziono', 'motyw' ); ?></h1>
		<p><?php esc_html_e( 'Brak treści do wyświetlenia.', 'motyw' ); ?></p>

	<?php endif; ?>
</div>

<?php
get_footer();
