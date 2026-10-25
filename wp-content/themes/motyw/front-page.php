<?php
/**
 * Szablon strony głównej: wyświetla treść strony wybranej w Ustawienia → Czytanie.
 *
 * Treść (slider, sekcje, zdjęcia) jest edytowana w edytorze bloków, a jej pierwsza wersja
 * pochodzi z patterns/strona-glowna.php. Tytuł strony nie jest wyświetlany, bo nagłówek
 * pierwszej sekcji pełni jego rolę.
 *
 * @package Motyw
 */

// Gdy stroną główną jest lista wpisów, używamy zwykłego szablonu listy.
if ( ! is_page() ) {
	require get_index_template();
	return;
}

get_header();
?>

<div class="kontener">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'wpis__tresc strona-glowna' ); ?>>
			<?php the_content(); ?>
		</div>
		<?php
	endwhile;
	?>
</div>

<?php
get_footer();
