<?php
/**
 * Szablon zwykłej podstrony, w tym stron wtyczki MotoPress
 * (wyniki wyszukiwania, rezerwacja, potwierdzenie).
 *
 * @package Motyw
 */

get_header();
?>

<div class="kontener">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/tresc' );
	endwhile;
	?>
</div>

<?php
get_footer();
