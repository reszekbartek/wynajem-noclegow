<?php
/**
 * Szablon strony Kontakt (adres /kontakt/).
 *
 * Treść z edytora (wstęp, plan ośrodka) jest obok danych kontaktowych, a pod spodem mapa.
 * Dane kontaktowe i adres mapy pochodzą z Wygląd → Dostosuj → Dane ośrodka.
 *
 * @package Motyw
 */

$motyw_email    = motyw_dane( 'email' );
$motyw_facebook = motyw_dane( 'facebook' );
$motyw_adres    = motyw_dane( 'nazwa' ) . ', ' . motyw_dane( 'adres' ) . ', ' . motyw_dane( 'kod_miasto' );

get_header();
?>

<div class="kontener">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'wpis kontakt' ); ?>>
			<h1 class="tytul-strony"><?php the_title(); ?></h1>

			<div class="kontakt__kolumny">
				<div class="wpis__tresc kontakt__tresc">
					<?php the_content(); ?>
				</div>

				<aside class="kontakt__dane" aria-label="<?php esc_attr_e( 'Dane kontaktowe', 'motyw' ); ?>">
					<h2 class="kontakt__tytul"><?php esc_html_e( 'Dane kontaktowe', 'motyw' ); ?></h2>
					<address class="kontakt__adres">
						<strong><?php echo esc_html( motyw_dane( 'nazwa' ) ); ?></strong><br>
						<?php echo esc_html( motyw_dane( 'adres' ) ); ?><br>
						<?php echo esc_html( motyw_dane( 'kod_miasto' ) ); ?><br>
						<?php echo esc_html( motyw_dane( 'wojewodztwo' ) ); ?>
					</address>

					<ul class="kontakt__lista">
						<?php foreach ( motyw_dane( 'telefony' ) as $motyw_telefon ) : ?>
							<li>
								<span class="kontakt__opis"><?php echo esc_html( $motyw_telefon['opis'] ); ?></span>
								<a href="<?php echo esc_url( motyw_link_tel( $motyw_telefon['numer'] ), array( 'tel' ) ); ?>"><?php echo esc_html( $motyw_telefon['numer'] ); ?></a>
							</li>
						<?php endforeach; ?>
						<li>
							<span class="kontakt__opis"><?php esc_html_e( 'E-mail', 'motyw' ); ?></span>
							<a href="<?php echo esc_url( 'mailto:' . $motyw_email, array( 'mailto' ) ); ?>"><?php echo esc_html( $motyw_email ); ?></a>
						</li>
						<?php if ( $motyw_facebook ) : ?>
							<li>
								<span class="kontakt__opis"><?php esc_html_e( 'Facebook', 'motyw' ); ?></span>
								<a href="<?php echo esc_url( $motyw_facebook ); ?>" rel="noopener" target="_blank"><?php esc_html_e( 'Profil ośrodka na Facebooku', 'motyw' ); ?></a>
							</li>
						<?php endif; ?>
					</ul>

					<h2 class="kontakt__tytul"><?php esc_html_e( 'Dane do przelewów', 'motyw' ); ?></h2>
					<p class="kontakt__przelew">
						<?php echo esc_html( motyw_dane( 'firma' ) ); ?><br>
						<?php echo esc_html( motyw_dane( 'konto' ) ); ?>
					</p>
				</aside>
			</div>

			<section class="kontakt__mapa" aria-label="<?php esc_attr_e( 'Mapa dojazdu', 'motyw' ); ?>">
				<iframe
					src="<?php echo esc_url( 'https://maps.google.com/maps?q=' . rawurlencode( $motyw_adres ) . '&hl=pl&z=14&output=embed' ); ?>"
					title="<?php esc_attr_e( 'Mapa dojazdu do ośrodka', 'motyw' ); ?>"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
				<p>
					<a href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $motyw_adres ) ); ?>" rel="noopener" target="_blank"><?php esc_html_e( 'Otwórz w Mapach Google', 'motyw' ); ?></a>
				</p>
			</section>
		</article>
		<?php
	endwhile;
	?>
</div>

<?php
get_footer();
