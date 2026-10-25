<?php
/**
 * Stopka strony: dane ośrodka, kontakt, menu i prawa autorskie.
 *
 * @package Motyw
 */

$motyw_email = motyw_dane( 'email' );
?>
</main>

<footer class="stopka">
	<div class="kontener stopka__kolumny">
		<div class="stopka__kolumna">
			<h2 class="stopka__tytul"><?php echo esc_html( motyw_dane( 'nazwa' ) ); ?></h2>
			<address class="stopka__adres">
				<?php echo esc_html( motyw_dane( 'adres' ) ); ?><br>
				<?php echo esc_html( motyw_dane( 'kod_miasto' ) ); ?><br>
				<?php echo esc_html( motyw_dane( 'wojewodztwo' ) ); ?>
			</address>
		</div>

		<div class="stopka__kolumna">
			<h2 class="stopka__tytul"><?php esc_html_e( 'Kontakt', 'motyw' ); ?></h2>
			<ul class="stopka__lista">
				<?php foreach ( motyw_dane( 'telefony' ) as $motyw_telefon ) : ?>
					<li>
						<?php echo esc_html( $motyw_telefon['opis'] ); ?>:
						<a href="<?php echo esc_url( motyw_link_tel( $motyw_telefon['numer'] ), array( 'tel' ) ); ?>"><?php echo esc_html( $motyw_telefon['numer'] ); ?></a>
					</li>
				<?php endforeach; ?>
				<li>
					<?php esc_html_e( 'E-mail', 'motyw' ); ?>:
					<a href="<?php echo esc_url( 'mailto:' . $motyw_email, array( 'mailto' ) ); ?>"><?php echo esc_html( $motyw_email ); ?></a>
				</li>
			</ul>
		</div>

		<nav class="stopka__kolumna" aria-label="<?php esc_attr_e( 'Menu w stopce', 'motyw' ); ?>">
			<h2 class="stopka__tytul"><?php esc_html_e( 'Na skróty', 'motyw' ); ?></h2>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_id'        => 'menu-stopka',
				'menu_class'     => 'stopka__lista',
				'depth'          => 1,
				'fallback_cb'    => 'motyw_menu_domyslne',
			) );
			?>
		</nav>
	</div>

	<div class="stopka__dol">
		<div class="kontener">
			<p class="stopka__prawa">&copy; <?php echo esc_html( wp_date( 'Y' ) . ' ' . motyw_dane( 'nazwa' ) ); ?></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
