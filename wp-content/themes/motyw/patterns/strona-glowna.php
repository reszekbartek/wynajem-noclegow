<?php
/**
 * Title: Strona główna
 * Slug: motyw/strona-glowna
 * Description: Treść startowa strony głównej, przepisana z wiele.com.pl: slider, ośrodek, baza noclegowa, oferta, atrakcje, okolica, partnerzy i zdjęcia.
 * Categories: motyw
 * Keywords: strona główna, ośrodek, oferta, atrakcje, slider
 *
 * Zapis bloków wygenerowano funkcjami edytora WordPressa (wp.blocks.serialize), więc edytor uznaje go za poprawny.
 * Przyciski rezerwacji prowadzą do strony rezerwacji, a gdy jej nie ma, do strony Kontakt.
 *
 * @package Motyw
 */

$motyw_rezerwacja = motyw_url_rezerwacji() ? motyw_url_rezerwacji() : home_url( '/kontakt/' );

?>
<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Slider"},"align":"full","className":"is-style-slider slider-glowny"} -->
<div class="wp-block-group alignfull is-style-slider slider-glowny"><!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/jezioro' ) ); ?>","alt":"Jezioro Wielewskie i lasy otaczające ośrodek z lotu ptaka","dimRatio":40,"overlayColor":"tekst","minHeight":600,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:600px"><img class="wp-block-cover__image-background" alt="Jezioro Wielewskie i lasy otaczające ośrodek z lotu ptaka" src="<?php echo esc_url( motyw_obraz( 'glowna/jezioro' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Naturalnie WIELE dobrego</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Zapraszamy do naszego ośrodka Beaver Tourist na Kaszubach</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"pomaranczowy"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-pomaranczowy-background-color has-background wp-element-button" href="<?php echo esc_url( $motyw_rezerwacja ); ?>">Kliknij tutaj i zarezerwuj pobyt w samym sercu Kaszub</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/kajak-rzeka' ) ); ?>","alt":"Kajakarz na rzece wśród zieleni","dimRatio":40,"overlayColor":"tekst","minHeight":600,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:600px"><img class="wp-block-cover__image-background" alt="Kajakarz na rzece wśród zieleni" src="<?php echo esc_url( motyw_obraz( 'glowna/kajak-rzeka' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Malownicze położenie</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Ośrodek BEAVER położony jest nad jeziorem na rozległym terenie leśnym, który zapewnia dużo przestrzeni</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"pomaranczowy"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-pomaranczowy-background-color has-background wp-element-button" href="<?php echo esc_url( $motyw_rezerwacja ); ?>">Kliknij tutaj i zarezerwuj pobyt w samym sercu Kaszub</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/rower-wodny' ) ); ?>","alt":"Dzieci na rowerze wodnym na jeziorze","dimRatio":40,"overlayColor":"tekst","minHeight":600,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:600px"><img class="wp-block-cover__image-background" alt="Dzieci na rowerze wodnym na jeziorze" src="<?php echo esc_url( motyw_obraz( 'glowna/rower-wodny' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Obozy i kolonie</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Zapraszamy na obozy sportowe i kolonie realizowane na terenie naszego ośrodka</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"pomaranczowy"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-pomaranczowy-background-color has-background wp-element-button" href="<?php echo esc_url( $motyw_rezerwacja ); ?>">Kliknij tutaj i zarezerwuj pobyt w samym sercu Kaszub</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Ośrodek"},"anchor":"osrodek"} -->
<div id="osrodek" class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"textAlign":"center"}}} -->
<h1 class="wp-block-heading has-text-align-center">Ośrodek turystyczny - Beaver</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ośrodek Beaver położony na terenie Wdzydzkiego Parku Krajobrazowego to doskonałe miejsce na relaks i aktywny wypoczynek. Bogata infrastruktura, przepiękne leśne tereny oraz ponad 800m linii brzegowej nad jeziorem Wielewskim z I klasą czystości, zapewnią Państwu udany wypoczynek. Zapraszamy na Kaszuby!</p>
<!-- /wp:paragraph -->

<!-- wp:gallery {"columns":5,"linkTo":"none","sizeSlug":"full"} -->
<figure class="wp-block-gallery has-nested-images columns-5 is-cropped"><!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domek-drewniany-1' ) ); ?>" alt="Drewniany domek wśród drzew"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domek-drewniany-2' ) ); ?>" alt="Drewniany domek w sosnowym lesie"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domki-wiezyca-murowany' ) ); ?>" alt="Domek typu Wieżyca i domek murowany"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domek-murowany' ) ); ?>" alt="Domek murowany"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domki-wiezyca' ) ); ?>" alt="Domki typu Wieżyca"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domek-wiezyca' ) ); ?>" alt="Domek typu Wieżyca obok domku murowanego"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/wnetrze-wiezyca' ) ); ?>" alt="Wnętrze domku typu Wieżyca"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/wnetrze-domku-1' ) ); ?>" alt="Pokój w drewnianym domku"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/wnetrze-domku-2' ) ); ?>" alt="Pokój w drewnianym domku"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/kajaki' ) ); ?>" alt="Kajakarze na jeziorze o zachodzie słońca"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/las' ) ); ?>","dimRatio":50,"overlayColor":"tekst","minHeight":360,"minHeightUnit":"px","lock":{"move":true,"remove":true},"metadata":{"name":"Rezerwacja"},"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:360px"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( motyw_obraz( 'glowna/las' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center">Sprawdź termin i zarezerwuj pobyt!</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"pomaranczowy"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-pomaranczowy-background-color has-background wp-element-button" href="<?php echo esc_url( $motyw_rezerwacja ); ?>">Przejdź do formularza rezerwacyjnego</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Baza noclegowa"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center">Baza noclegowa (ponad 300 miejsc noclegowych)</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/pawilon' ) ); ?>" alt="Pawilon murowany z balkonami"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Pawilony murowane</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pawilony murowane z ogrzewaniem i węzłem sanitarnym w pokojach</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domki' ) ); ?>" alt="Domki wśród sosen na terenie ośrodka"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Domki</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Domki drewniane oraz murowane z węzłem sanitarnym</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/domki-wiezyca' ) ); ?>" alt="Domki typu Wieżyca"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Domki typu wieżyca</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Domki typu Wieżyca z węzłem sanitarnym</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Oferta"},"className":"oferta","backgroundColor":"jasne-tlo"} -->
<div class="wp-block-group oferta has-jasne-tlo-background-color has-background"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Obozy i kolonie</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Zapraszamy do współpracy Organizatorów Wypoczynku dzieci i młodzieży. Oferujemy ponad 300 miejsc noclegowych na letnie obozy i kolonie. Do dyspozycji uczestników baza sportowa i wypoczynkowa, opieka instruktorska oraz medyczna.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Zielone szkoły</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Umożliwiamy organizację Zielonych Szkół w sezonie wiosennym i jesiennym.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Rodzinne wczasy</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Wypoczynek na łonie kaszubskiej natury, czyste jezioro i mnóstwo atrakcji dla całej rodziny. Oferujemy zakwaterowanie z wyżywieniem lub bez w domkach murowanych, drewnianych oraz domkach typu Wieżyca.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Imprezy okolicznościowe</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Organizujemy wszelkie imprezy okolicznościowe w salach bankietowych oraz na świeżym powietrzu.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Imprezy integracyjne</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Nasz ośrodek to doskonałe miejsce na organizację imprez firmowych oraz integracyjnych. Proponujemy sportowe atrakcje pod okiem instruktora, wieczornego grilla lub ognisko i dobrą zabawę na świeżym powietrzu.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Kursy WOPR i karty wędkarskie</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>W naszym ośrodku można zdobyć uprawnienie Ratownika WOPR na specjalistycznym szkoleniu oraz wykupić Kartę Wędkarską.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Atrakcje"},"align":"full","className":"is-style-slider slider-atrakcje"} -->
<div class="wp-block-group alignfull is-style-slider slider-atrakcje"><!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/pomost' ) ); ?>","alt":"Pomost i kąpielisko nad Jeziorem Wielewskim","dimRatio":40,"overlayColor":"tekst","minHeight":440,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:440px"><img class="wp-block-cover__image-background" alt="Pomost i kąpielisko nad Jeziorem Wielewskim" src="<?php echo esc_url( motyw_obraz( 'glowna/pomost' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Plaża, pomost i najczystsza woda w okolicy.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Miejsce do kąpieli zatwierdzone jest przez Sanepid oraz objęte opieką Ratownika WOPR. Jezioro Wielewskie posiada I klasę czystości - u nas można spotkać raki, a także nurkować.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/jezioro' ) ); ?>","alt":"Jezioro Wielewskie i lasy otaczające ośrodek z lotu ptaka","dimRatio":40,"overlayColor":"tekst","minHeight":440,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:440px"><img class="wp-block-cover__image-background" alt="Jezioro Wielewskie i lasy otaczające ośrodek z lotu ptaka" src="<?php echo esc_url( motyw_obraz( 'glowna/jezioro' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Boiska wielofunkcyjne</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Boisko trawiaste do piłki nożnej i zabaw integracyjnych, boisko typu ORLIK do piłki nożnej oraz gry w koszykówkę, boisko do siatkówki plażowej</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/park-linowy' ) ); ?>","alt":"Zjazd na tyrolce w parku linowym","dimRatio":40,"overlayColor":"tekst","minHeight":440,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:440px"><img class="wp-block-cover__image-background" alt="Zjazd na tyrolce w parku linowym" src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Paintball, Quady, Park Linowy i Survival</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Nasz ośrodek oferuje grę w Paintball, jazdę po torach oraz w lesie na quadach, zajęcia survivalowe w namiotach, sprawnościowy tor przeszkód, Park Linowy z dwoma trasami oraz zjazdem na tyrolce, ściankę wspinaczkową</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/kajaki-jezioro' ) ); ?>","alt":"Kajaki na jeziorze","dimRatio":40,"overlayColor":"tekst","minHeight":440,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:440px"><img class="wp-block-cover__image-background" alt="Kajaki na jeziorze" src="<?php echo esc_url( motyw_obraz( 'glowna/kajaki-jezioro' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Przystań wodna</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Do dyspozycji naszych gości jest przystań żeglarska, rowery wodne oraz kajaki, narty wodne i banan wodny</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/jezioro-niebo' ) ); ?>","alt":"Jezioro Wielewskie w słoneczny dzień","dimRatio":40,"overlayColor":"tekst","minHeight":440,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:440px"><img class="wp-block-cover__image-background" alt="Jezioro Wielewskie w słoneczny dzień" src="<?php echo esc_url( motyw_obraz( 'glowna/jezioro-niebo' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Stadnina koni</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">Rekreacyjna stadnina koni zapewnia lekcję nauki jazdy konnej, wyprawy terenowe oraz przejażdżki konne</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"<?php echo esc_url( motyw_obraz( 'glowna/ognisko' ) ); ?>","alt":"Uczestnicy obozu przy ognisku","dimRatio":40,"overlayColor":"tekst","minHeight":440,"minHeightUnit":"px","className":"slajd"} -->
<div class="wp-block-cover slajd" style="min-height:440px"><img class="wp-block-cover__image-background" alt="Uczestnicy obozu przy ognisku" src="<?php echo esc_url( motyw_obraz( 'glowna/ognisko' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-tekst-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"slajd__tytul","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center slajd__tytul">Rekreacja</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"slajd__tekst","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center slajd__tekst">stoły do tenisa stołowego, plac zabaw dla dzieci, minigolf, świetlica, sala telewizyjna, miejsce na ognisko i grilla</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Okolica"}} -->
<div class="wp-block-group"><!-- wp:media-text {"mediaType":"image","imageFill":true} -->
<div class="wp-block-media-text is-stacked-on-mobile is-image-fill-element"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( motyw_obraz( 'glowna/las' ) ); ?>" alt="Ścieżka przez sosnowy las" style="object-position:50% 50%"/></figure><div class="wp-block-media-text__content"><!-- wp:heading -->
<h2 class="wp-block-heading">Liczne szlaki turystyczne</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Okoliczne tereny pozwalają na uprawianie turystyki i aktywności sportowej. Do dyspozycji turystów i mieszkańców są szlaki piesze i rowerowe, a także Nordic Walking i ścieżki przyrodniczo-edukacyjne. Mnogość jezior i rzek pozwala na uprawianie żeglarstwa, kajakarstwa oraz wędkarstwa.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->

<!-- wp:media-text {"mediaPosition":"right","mediaType":"image","imageFill":true} -->
<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-image-fill-element"><div class="wp-block-media-text__content"><!-- wp:heading -->
<h2 class="wp-block-heading">W zgodzie z naturą</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Niezwykle czyste i piękne jeziora, połacie lasów i jedne z najpiękniejszych widoków w północnej Polsce. To właśnie okolice naszego ośrodka. Wdzydzki Park Krajobrazowy to polodowcowe jeziora, różnorodność przyrody i malownicze Kaszubskie wsie i miasta.</p>
<!-- /wp:paragraph --></div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( motyw_obraz( 'glowna/ognisko' ) ); ?>" alt="Uczestnicy obozu przy ognisku" style="object-position:50% 50%"/></figure></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Partnerzy"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center">Nasi Partnerzy</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"partnerzy"} -->
<div class="wp-block-columns partnerzy"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/partner-radsas' ) ); ?>" alt="Radsas-Fun"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/partner-wsb' ) ); ?>" alt="Wyższa Szkoła Bezpieczeństwa w Poznaniu"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/partner-but' ) ); ?>" alt="BUT"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Zdjęcia"},"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:gallery {"columns":5,"linkTo":"none","sizeSlug":"full","className":"is-style-pasek"} -->
<figure class="wp-block-gallery has-nested-images columns-5 is-cropped is-style-pasek"><!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/rowery-wodne' ) ); ?>" alt="Rowery wodne i kajaki na jeziorze"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/banan' ) ); ?>" alt="Przejażdżka na bananie za motorówką"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/rower-wodny' ) ); ?>" alt="Dzieci na rowerze wodnym na jeziorze"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/tyrolka' ) ); ?>" alt="Zjazd w parku linowym"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/quady' ) ); ?>" alt="Jazda na quadach"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/kapielisko' ) ); ?>" alt="Kąpielisko i pomost"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy-2' ) ); ?>" alt="Park linowy"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/pomost' ) ); ?>" alt="Pomost i kąpielisko nad Jeziorem Wielewskim"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy' ) ); ?>" alt="Zjazd na tyrolce w parku linowym"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/zaglowki' ) ); ?>" alt="Żaglówki na Jeziorze Wielewskim"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/jezioro-wieczor' ) ); ?>" alt="Jezioro o zmierzchu"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy-3' ) ); ?>" alt="Park linowy"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy-4' ) ); ?>" alt="Park linowy"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/jezioro-las' ) ); ?>" alt="Jezioro i las"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy-5' ) ); ?>" alt="Park linowy"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/scianka' ) ); ?>" alt="Ścianka wspinaczkowa"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/park-linowy-6' ) ); ?>" alt="Park linowy"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/kajaki-rodzina' ) ); ?>" alt="Rodzina w kajakach"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/kajaki-2' ) ); ?>" alt="Spływ kajakowy"/></figure>
<!-- /wp:image -->

<!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( motyw_obraz( 'glowna/kajak-rzeka' ) ); ?>" alt="Kajakarz na rzece wśród zieleni"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->
