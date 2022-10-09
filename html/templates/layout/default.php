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

$cakeDescription = 'Takahiro Ueda';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PN98ZV8');
  </script>
  <!-- End Google Tag Manager -->
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css(['bootstrap.min', 'style', 'sunburst']) ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('scriptTop') ?>
</head>

<body>
  <header class="position-fixed w-100 top-0 position-relative">
    <div class="px-4 py-md-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-md-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-0 my-md-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <?= $this->Html->image('brand-icon.png', ['alt' => 'Brand logo', 'width' => '24px', 'height' => '24px']) ?>
            <?= $this->Html->image('brand-logo_white.png', ['alt' => 'Brand logo', 'width' => '130px', 'height' => '32px']) ?>
          </a>
          <!-- nav menu for display sm -->
          <button id="toggleNavBtn" type="button" class="bg-dark border-0 d-md-none justify-content-center" aria-label="toggle button" style="width: 48px; height: 48px;" aria-expanded="false" aria-controls="toggleNavMenu">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </button>

          <nav id="toggleNavMenu" class="nav col-12 col-lg-auto ms-auto text-small d-md-none position-absolute bg-dark top-100 end-0 w-50">
            <ul class="m-0 p-0 mx-auto text-center">
              <li class="mb-3">
                <a href="/blog" class="nav-link text-white">
                  Blog
                </a>
              </li>
              <li class="mb-3">
                <a href="<?= URL_GITHUB ?>" class="nav-link text-white">
                  GitHub
                </a>
              </li>
              <li class="mb-3">
                <a href="/contact" class="nav-link text-white">
                  Contact
                </a>
              </li>
            </ul>
          </nav>
          <!-- nav bar for display md and up -->
          <nav class="nav col-12 col-lg-auto my-md-0 text-small d-none d-md-inline-block">
            <ul class="d-flex justify-content-center m-0 p-0">
              <li>
                <a href="/blog" class="nav-link text-white">
                  Blog
                </a>
              </li>
              <li>
                <a href="<?= URL_GITHUB ?>" class="nav-link text-white">
                  GitHub
                </a>
              </li>
              <li>
                <a href="/contact" class="nav-link text-white">
                  Contact
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <main class="main mt-5">
    <?= $this->fetch('content') ?>
  </main>
  <footer class="py-3 mt-4 bg-dark text-white">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/blog" class="nav-link px-2 text-muted">Blog</a></li>
      <li class="nav-item"><a href="<?= URL_GITHUB ?>" class="nav-link px-2 text-muted">GitHub</a></li>
      <li class="nav-item"><a href="/contact" class="nav-link px-2 text-muted">Contact</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 devil code</p>
  </footer>
  <?= $this->fetch('scriptBottom') ?>
  <?= $this->Html->script(['index']) ?>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PN98ZV8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
</body>

</html>