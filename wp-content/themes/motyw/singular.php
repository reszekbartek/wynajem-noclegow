<?php
/**
 * Szablon pojedynczej treści dowolnego typu, gdy nie ma bardziej szczegółowego,
 * np. wpisu albo strony domku z MotoPress (typ mphb_room_type).
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

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>
</div>

<?php
get_footer();
