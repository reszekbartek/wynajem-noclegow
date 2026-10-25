<?php
/**
 * Title: Kontakt
 * Slug: motyw/kontakt
 * Description: Treść startowa strony Kontakt, przepisana z wiele.com.pl/kontakt. Dane kontaktowe i mapa pochodzą z szablonu (Wygląd → Dostosuj → Dane ośrodka).
 * Categories: motyw
 * Keywords: kontakt, rezerwacja, plan ośrodka
 *
 * Formularz rezerwacyjny ze strony klienta zastępuje system rezerwacji, do którego prowadzi przycisk.
 *
 * @package Motyw
 */

$motyw_rezerwacja = motyw_url_rezerwacji();
?>
<!-- wp:group {"lock":{"move":true,"remove":true}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>Chcesz zarezerwować pobyt? Masz pytanie lub wątpliwości dotyczące pobytu? Skorzystaj z formularza rezerwacyjnego.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>UWAGA! Formularz rezerwacyjny nie gwarantuje pobytu, po wypełnieniu formularza prosimy czekać na kontakt recepcji naszego ośrodka.</p>
<!-- /wp:paragraph -->
<?php if ( $motyw_rezerwacja ) : ?>

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"pomaranczowy"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-pomaranczowy-background-color has-background wp-element-button" href="<?php echo esc_url( $motyw_rezerwacja ); ?>">Przejdź do formularza rezerwacyjnego</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<?php endif; ?>

<!-- wp:paragraph -->
<p>Preferujemy kontakt poprzez email</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","lightbox":{"enabled":true}} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/plan-osrodka.webp' ) ); ?>" alt="Plan ośrodka BEAVER: domki, pawilony, boiska, przystań i kąpielisko nad Jeziorem Wielewskim"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->
