<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html lang="ja">
<head>

  <?= $this->fetch('canonical') ?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->fetch('title') ?></title>
  <?= $this->fetch('meta') ?>


  <!-- <?= $this->Html->meta('icon') ?> -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <?= $this->Html->css(['style']) ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('jsonLd') ?>

  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "devil code",
    "url": "https://devil-code.com/",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://devil-code.com/blogs/search/?q={search_term_string}",
      "query-input": "required name=search_term_string"
    },
    "author": {
      "@type": "Person",
      "name": "Takahiro Ueda"
    }
  }
  </script>
</head>
<body>
<header id="header" class="l-header">
    <div class="l-header__inner l-container__wide l-container__common">
        <div class="l-header__inner-upper">
            <a class="logo" href="/">
                <svg class="logo-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

              <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="#8071ff" stroke="none">
              <path d="M1069 2534 c-526 -95 -932 -502 -1033 -1033 -23 -121 -21 -337 4
              -461 22 -110 68 -247 110 -331 89 -176 253 -364 410 -472 95 -65 98 -64 99 28
              1 86 31 296 52 373 11 40 38 120 60 178 22 59 38 108 36 110 -2 2 -27 -15 -57
              -37 -36 -27 -61 -39 -79 -37 -23 3 -26 7 -25 40 1 35 0 36 -23 27 -43 -16 -63
              -11 -63 16 0 22 -3 24 -30 19 -56 -12 -84 48 -37 80 12 9 51 60 87 114 36 53
              72 98 81 100 11 2 23 -9 32 -27 22 -44 152 -200 159 -191 3 3 25 40 50 82 l46
              77 -44 26 c-129 76 -233 195 -282 323 -58 150 -51 267 22 417 53 106 121 183
              221 250 51 33 77 59 96 93 14 26 34 48 43 50 22 5 46 -16 46 -39 0 -17 3 -17
              39 -4 76 26 221 38 317 25 l88 -11 19 25 c11 15 28 26 42 26 20 0 25 -7 31
              -35 6 -32 14 -40 68 -67 173 -87 271 -182 343 -334 38 -79 38 -79 38 -209 0
              -119 -2 -135 -28 -195 -55 -130 -162 -246 -300 -325 l-53 -30 52 -93 51 -93
              71 75 c39 42 83 94 97 116 14 22 29 40 33 40 13 0 57 -51 87 -100 15 -25 50
              -68 78 -97 47 -48 50 -54 39 -78 -10 -21 -18 -25 -52 -25 -34 0 -40 -3 -40
              -20 0 -31 -23 -34 -72 -9 -42 21 -43 21 -24 1 23 -26 15 -68 -14 -77 -22 -7
              -51 8 -114 59 -20 16 -39 26 -42 23 -3 -3 8 -50 25 -104 17 -54 36 -117 41
              -140 l10 -42 37 15 c51 22 75 12 146 -61 35 -36 72 -65 82 -65 27 0 88 69 143
              163 34 57 54 82 68 82 32 0 28 -40 -10 -108 -53 -95 -91 -143 -139 -178 -62
              -45 -94 -37 -173 46 -53 56 -67 65 -86 60 -46 -14 -50 -26 -37 -96 6 -35 12
              -116 13 -180 l1 -116 45 28 c295 183 515 513 576 864 24 137 14 398 -19 525
              -67 249 -211 485 -392 643 -177 154 -373 250 -605 297 -117 24 -342 26 -461 4z"></path>
              </g>
              </svg><span class="logo-name">devil code</span></a>

               <!-- Form Desktop -->
               <form method="get" accept-charset="utf-8" class="c-searchFormDesktop" role="search" aria-label="Search Articles" action="/blogs/search">                    <button id="toggleSmartSearchButton" type="button" aria-expanded="false" aria-controls="false" class="c-searchFormDesktop__toggleButton" aria-label="Search Articles"><svg viewBox="0 0 27 27" height="23" width="23"><path d="M11.56,3.43a8.26,8.26,0,0,0,0,16.52,8.18,8.18,0,0,0,5-1.72l4.7,4.7a1.1,1.1,0,0,0,1.56,0,1.09,1.09,0,0,0,0-1.55l0,0-4.7-4.7a8.18,8.18,0,0,0,1.72-5A8.28,8.28,0,0,0,11.56,3.43Zm0,2.2A6.06,6.06,0,1,1,5.5,11.69,6,6,0,0,1,11.56,5.63Z" fill="currentColor"></path></svg></button>
                    <label class="c-searchFormDesktop__searchBox-label" for="input-search-form-desktop">
                        <svg class="c-searchFormDesktop__searchBox-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><path fill="#8f9faa" stroke-miterlimit="10" d="M27 9C17.075 9 9 17.075 9 27s8.075 18 18 18c4.13 0 7.926-1.413 10.967-3.76l13.082 13.082a2.315 2.315 0 1 0 3.273-3.273L41.24 37.967C43.587 34.927 45 31.129 45 27c0-9.925-8.075-18-18-18zm0 4c7.719 0 14 6.281 14 14s-6.281 14-14 14-14-6.281-14-14 6.281-14 14-14z" font-family="none" font-size="none" font-weight="none" style="mix-blend-mode:normal" text-anchor="none" transform="scale(4)"></path></svg>
                    </label>
                    <input type="search" name="q" placeholder="Search" id="input-search-form-desktop" class="c-searchFormDesktop__searchBox">                    <input type="submit" style="display: none">
               </form>        </div>
        <div class="l-header__inner-downer">
            <!-- Form Smart -->
            <form method="get" accept-charset="utf-8" id="searchFormSmart" class="c-searchFormSmart" role="search" aria-label="Search Articles" action="/blogs/search">
                    <label class="c-searchFormSmart__searchBox-label" for="input-search-form-desktop">
                        <svg class="c-searchFormSmart__searchBox-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><path fill="#8f9faa" stroke-miterlimit="10" d="M27 9C17.075 9 9 17.075 9 27s8.075 18 18 18c4.13 0 7.926-1.413 10.967-3.76l13.082 13.082a2.315 2.315 0 1 0 3.273-3.273L41.24 37.967C43.587 34.927 45 31.129 45 27c0-9.925-8.075-18-18-18zm0 4c7.719 0 14 6.281 14 14s-6.281 14-14 14-14-6.281-14-14 6.281-14 14-14z" font-family="none" font-size="none" font-weight="none" style="mix-blend-mode:normal" text-anchor="none" transform="scale(4)"></path></svg>
                    </label>
                <input type="search" name="q" placeholder="Search" id="toggleSmartSearch" class="c-searchFormSmart__searchBox">            </form>            <nav class="c-headerNav" role="navigation" aria-label="main">
                <?= $this->Html->link('Home', '/', ['class' => $this->getRequest()->getParam('controller') === 'Pages' && $this->getRequest()->getParam('action') === 'display' ? 'c-headerNav__item active' : 'c-headerNav__item']); ?>
                <?= $this->Html->link('Blog', '/blogs/', ['class' => $this->getRequest()->getParam('controller') === 'Blogs' ? 'c-headerNav__item active' : 'c-headerNav__item']); ?>
      </nav>
        </div>
    </div>
  </header>
  <main class="l-main">
    <?= $this->fetch('content') ?>
  </main>
<footer class="l-footer">
    <div class="l-container__wide l-container__common">
        <div class="l-footer__inner">
            <div class="l-footer__brandingColumns">
                <a class="logo" href="/">
                    <svg class="logo-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                          <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="#8071ff" stroke="none">
                          <path d="M1069 2534 c-526 -95 -932 -502 -1033 -1033 -23 -121 -21 -337 4
                          -461 22 -110 68 -247 110 -331 89 -176 253 -364 410 -472 95 -65 98 -64 99 28
                          1 86 31 296 52 373 11 40 38 120 60 178 22 59 38 108 36 110 -2 2 -27 -15 -57
                          -37 -36 -27 -61 -39 -79 -37 -23 3 -26 7 -25 40 1 35 0 36 -23 27 -43 -16 -63
                          -11 -63 16 0 22 -3 24 -30 19 -56 -12 -84 48 -37 80 12 9 51 60 87 114 36 53
                          72 98 81 100 11 2 23 -9 32 -27 22 -44 152 -200 159 -191 3 3 25 40 50 82 l46
                          77 -44 26 c-129 76 -233 195 -282 323 -58 150 -51 267 22 417 53 106 121 183
                          221 250 51 33 77 59 96 93 14 26 34 48 43 50 22 5 46 -16 46 -39 0 -17 3 -17
                          39 -4 76 26 221 38 317 25 l88 -11 19 25 c11 15 28 26 42 26 20 0 25 -7 31
                          -35 6 -32 14 -40 68 -67 173 -87 271 -182 343 -334 38 -79 38 -79 38 -209 0
                          -119 -2 -135 -28 -195 -55 -130 -162 -246 -300 -325 l-53 -30 52 -93 51 -93
                          71 75 c39 42 83 94 97 116 14 22 29 40 33 40 13 0 57 -51 87 -100 15 -25 50
                          -68 78 -97 47 -48 50 -54 39 -78 -10 -21 -18 -25 -52 -25 -34 0 -40 -3 -40
                          -20 0 -31 -23 -34 -72 -9 -42 21 -43 21 -24 1 23 -26 15 -68 -14 -77 -22 -7
                          -51 8 -114 59 -20 16 -39 26 -42 23 -3 -3 8 -50 25 -104 17 -54 36 -117 41
                          -140 l10 -42 37 15 c51 22 75 12 146 -61 35 -36 72 -65 82 -65 27 0 88 69 143
                          163 34 57 54 82 68 82 32 0 28 -40 -10 -108 -53 -95 -91 -143 -139 -178 -62
                          -45 -94 -37 -173 46 -53 56 -67 65 -86 60 -46 -14 -50 -26 -37 -96 6 -35 12
                          -116 13 -180 l1 -116 45 28 c295 183 515 513 576 864 24 137 14 398 -19 525
                          -67 249 -211 485 -392 643 -177 154 -373 250 -605 297 -117 24 -342 26 -461 4z"></path>
                          </g>
                    </svg><span class="logo-name">devil code</span>
                </a>
                <p class="l-footer__siteDescription">プログラミング・コンピューターサイエンス学習記録</p>
            </div>
            <div class="l-footer__navColumns">
               <nav class="l-footer__navColumn">
                    <ul>
                        <h4 class="l-footer__navColumn-title">LINKS</h4>
                        <li><a href="//twitter.com/devil_code_com" target="_blank" rel="noopener">Twitter</a></li>
                        <li><a href="//github.com/devil-works/devil-code" target="_blank" rel="noopener">Github</a></li>
                    </ul>
               </nav>
               <nav class="l-footer__navColumn">
                    <ul>
                        <h4 class="l-footer__navColumn-title">Pages</h4>
                        <li><a href="/sitemaps/">Sitemap</a></li>
                        <li><a href="/site-policy/">Site policy</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
               </nav>
            </div>
        </div>
        <div class="l-footer__copyright"><small>©</small><a href="/">2022-2024 devil code</a></div>
    </div>
  </footer>
  <?= $this->fetch('scriptBottom') ?>
  <?= $this->Html->script(['index']) ?>
</body>

</html>
