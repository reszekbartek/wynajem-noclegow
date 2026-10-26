/**
 * Slider: grupa bloków ze stylem „Slider” (klasa is-style-slider), której slajdami są bloki „Okładka”.
 *
 * Dodaje strzałki, kropki i automatyczne przewijanie co 6 sekund. Przewijanie zatrzymuje się,
 * gdy kursor lub fokus jest na sliderze, i jest wyłączone przy ustawieniu „ogranicz ruch”.
 * Bez JavaScriptu slajdy wyświetlają się jeden pod drugim.
 */
( function () {
	'use strict';

	var ograniczRuch = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	document.querySelectorAll( '.wp-block-group.is-style-slider' ).forEach( function ( slider ) {
		// Motywy bez theme.json mają dodatkowy kontener wewnątrz grupy.
		var tor = slider.querySelector( ':scope > .wp-block-group__inner-container' ) || slider;
		var slajdy = Array.prototype.filter.call( tor.children, function ( el ) {
			return el.classList.contains( 'wp-block-cover' );
		} );

		if ( slajdy.length < 2 ) {
			return;
		}

		var biezacy = 0;
		var licznik = null;

		slider.classList.add( 'slider--aktywny' );
		tor.classList.add( 'slider__tor' );
		slider.setAttribute( 'role', 'region' );
		slider.setAttribute( 'aria-roledescription', 'karuzela' );
		slider.setAttribute( 'aria-label', slajdy[ 0 ].querySelector( 'h2, h3' ) ? 'Slajdy: ' + slajdy[ 0 ].querySelector( 'h2, h3' ).textContent : 'Slajdy' );

		slajdy.forEach( function ( slajd, i ) {
			slajd.setAttribute( 'role', 'group' );
			slajd.setAttribute( 'aria-roledescription', 'slajd' );
			slajd.setAttribute( 'aria-label', ( i + 1 ) + ' z ' + slajdy.length );
		} );

		function przycisk( klasa, etykieta, tekst ) {
			var b = document.createElement( 'button' );
			b.type = 'button';
			b.className = klasa;
			b.setAttribute( 'aria-label', etykieta );
			b.innerHTML = tekst;
			return b;
		}

		var poprzedni = przycisk( 'slider__strzalka slider__strzalka--poprzedni', 'Poprzedni slajd', '&#8249;' );
		var nastepny = przycisk( 'slider__strzalka slider__strzalka--nastepny', 'Następny slajd', '&#8250;' );
		var kropki = document.createElement( 'div' );
		kropki.className = 'slider__kropki';

		var przyciskiKropek = slajdy.map( function ( slajd, i ) {
			var k = przycisk( 'slider__kropka', 'Slajd ' + ( i + 1 ), '' );
			k.addEventListener( 'click', function () {
				idz( i );
			} );
			kropki.appendChild( k );
			return k;
		} );

		slider.appendChild( poprzedni );
		slider.appendChild( nastepny );
		slider.appendChild( kropki );

		function idz( i ) {
			biezacy = ( i + slajdy.length ) % slajdy.length;
			var przesuniecie = slajdy[ biezacy ].getBoundingClientRect().left - tor.getBoundingClientRect().left;
			tor.scrollTo( { left: tor.scrollLeft + przesuniecie, behavior: ograniczRuch ? 'auto' : 'smooth' } );
			oznacz();
		}

		function oznacz() {
			przyciskiKropek.forEach( function ( k, i ) {
				k.setAttribute( 'aria-current', i === biezacy ? 'true' : 'false' );
			} );
		}

		poprzedni.addEventListener( 'click', function () {
			idz( biezacy - 1 );
		} );
		nastepny.addEventListener( 'click', function () {
			idz( biezacy + 1 );
		} );

		// Przewijanie palcem lub kółkiem: ustalamy bieżący slajd po zakończeniu przewijania.
		var czekaj = null;
		tor.addEventListener( 'scroll', function () {
			clearTimeout( czekaj );
			czekaj = setTimeout( function () {
				biezacy = Math.round( tor.scrollLeft / tor.clientWidth );
				oznacz();
			}, 120 );
		} );

		function start() {
			if ( ! ograniczRuch && ! licznik ) {
				licznik = setInterval( function () {
					idz( biezacy + 1 );
				}, 6000 );
			}
		}

		function stop() {
			clearInterval( licznik );
			licznik = null;
		}

		slider.addEventListener( 'mouseenter', stop );
		slider.addEventListener( 'mouseleave', start );
		slider.addEventListener( 'focusin', stop );
		slider.addEventListener( 'focusout', start );
		document.addEventListener( 'visibilitychange', function () {
			if ( document.hidden ) {
				stop();
			} else {
				start();
			}
		} );

		oznacz();
		start();
	} );
}() );
