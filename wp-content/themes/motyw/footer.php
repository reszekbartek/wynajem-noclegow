<?php
/**
 * Stopka strony.
 *
 * @package Motyw
 */

?>
</main>

<footer class="stopka">
	<div class="kontener">
		<p class="stopka__prawa">&copy; <?php echo esc_html( wp_date( 'Y' ) . ' ' . motyw_dane( 'nazwa' ) ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
