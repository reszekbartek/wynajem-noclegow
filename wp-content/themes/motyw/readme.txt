=== Motyw ===
Contributors: User52525252
Requires at least: 6.3
Tested up to: 7.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Motyw strony Ośrodka Kolonijno-Wczasowego BEAVER, współpracujący z wtyczką MotoPress Hotel Booking.

== Opis ==

Klasyczny motyw WordPress. Treści i zdjęcia podstron są w plikach motywu, ponieważ
deploy przez FTP przenosi na serwer tylko pliki.

Struktura:

* style.css - nagłówek motywu (nazwa, wersja, wymagania)
* functions.php - obsługiwane funkcje WordPressa, menu, dołączanie stylów i skryptów
* inc/dane-osrodka.php - dane ośrodka (adres, telefony, e-mail) w jednym miejscu
* inc/konfiguracja.php - konfiguracja przy włączeniu motywu
* inc/nawigacja.php - link do strony rezerwacji i menu domyślne
* header.php, footer.php - nagłówek i stopka wspólne dla wszystkich stron
* index.php - szablon awaryjny (lista wpisów, archiwa, wyszukiwanie)
* singular.php - pojedyncza treść dowolnego typu, np. strona domku MotoPress
* page.php - zwykła podstrona, w tym strony MotoPress
* template-parts/tresc.php - treść strony używana przez page.php i singular.php
* 404.php - strona "nie znaleziono"
* comments.php - komentarze
* assets/ - style, skrypty i zdjęcia

== Konfiguracja przy włączeniu ==

Po włączeniu motyw:

* zakłada opublikowane strony "Cennik" (/cennik/) i "Kontakt" (/kontakt/), jeśli ich nie ma,
* ustawia statyczną stronę główną, jeśli w Ustawienia > Czytanie żadna nie jest wybrana,
* tworzy "Menu główne" i przypisuje je do lokalizacji menu, jeśli żadne nie jest przypisane.

Istniejące strony i menu pozostają bez zmian, więc motyw można bezpiecznie włączać ponownie.

== Nagłówek ==

* Menu główne pochodzi z Wygląd > Menu (lokalizacja "Menu główne"). Gdy żadne menu nie jest
  przypisane, wyświetla się menu domyślne: Strona główna, Cennik, Kontakt.
* Przycisk "Rezerwacja" prowadzi do pierwszej istniejącej z tych stron:
  1. strona o adresie /rezerwacja/,
  2. strona z wyszukiwarką terminów MotoPress [mphb_availability_search],
  3. strona z listą domków MotoPress [mphb_rooms].
  Gdy żadna z nich nie istnieje, przycisk jest ukryty. Aby wskazać inną stronę, wystarczy
  utworzyć stronę o adresie /rezerwacja/.
* Poniżej 768 px menu rozwija się przyciskiem. Bez JavaScriptu menu jest zawsze rozwinięte.

== Copyright ==

Motyw, (C) 2026 Przemysław Tomaszewski
Motyw is distributed under the terms of the GNU GPL v2 or later.

Dane kontaktowe, treści i logo ośrodka (assets/img/logo-beaver.png) pochodzą ze strony
https://wiele.com.pl i należą do Ośrodka Kolonijno-Wczasowego BEAVER.

== Changelog ==

= 0.1.0 =
* Podstawowa struktura motywu.
