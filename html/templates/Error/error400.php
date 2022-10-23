<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\StatementInterface $error
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.php');

    $this->start('file');
    
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
$this->end();
endif;
?>


<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <?= $this->Html->meta('icon') ?>
  <?= $this->Html->css(['bootstrap.min', 'style', 'sunburst']) ?>
  <style>
  	footer + a {
		display: none;
	}
  </style>
</head>

<body class="text-white position-relative" style="background-color: #7F6197; min-height: 100vh;">
<header id="header" class="position-fixed w-100 top-0 position-relative" style="z-index: 1000;">
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
                <a href="/contact" class="nav-link text-white">
                  Contact
                </a>
              </li>
              <li class="mb-3">
                <a href="<?= URL_GITHUB ?>" class="nav-link text-white">
                  GitHub
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
                <a href="/contact" class="nav-link text-white">
                  Contact
                </a>
              </li>
              <li>
              <form action="/blog" method="post" >
                <!--postするデータ -->
                <input name="text" placeholder="検索">
                <!--csrfトークン -->
                <input id="csrf" type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
              </form>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <main class="main position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
  	<div class="container text-center">
		<div class="row">
			<div class="col-md-6 errorImageArea">
				<div class="errorImageWrapper">
					<?= $this->Html->image('404.png', ['alt' => '', 'width' => '280px']) ?>
					<?= $this->Html->image('brand-icon.png', ['alt' => '', 'width' => '280px']) ?>
				</div>
			</div>
			
			<div class="col-md-6 errorMesArea  p-5">
				<h1 class="error-title p-5"><?= h($message) ?></h1>
				<?php if ($message === "404 Not Found") : ?>
				        <strong>お探しのページが見つかりません。</strong>
				<?php endif; ?>
				<div class="recLinkArea p-5">
					<ul>
						<li><a>foooo</a></li>
						<li><a>foooo</a></li>
						<li><a>foooo</a></li>
						<li><a>foooo</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
  </main>
  <footer class="py-3 mt-4 bg-dark text-white position-fixed w-100" style="bottom: 0;">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/blog" class="nav-link px-2 text-muted">Blog</a></li>
      <li class="nav-item"><a href="<?= URL_GITHUB ?>" class="nav-link px-2 text-muted">GitHub</a></li>
      <li class="nav-item"><a href="/contact" class="nav-link px-2 text-muted">Contact</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2022 devil code</p>
  </footer>
  <?= $this->Html->script(['index']) ?>
</body>
</html>


