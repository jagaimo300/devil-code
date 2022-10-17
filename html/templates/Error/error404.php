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

<body>
  <header class="position-fixed w-100 top-0">
    <div class="px-4 py-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <?= $this->Html->image('brand-logo_white.png', ['alt' => 'Brand logo', 'width' => '130px', 'height' => '32px']) ?>
          </a>
			<nav class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
	          <ul class="d-flex list-inline">
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
  <main class="main mt-5 h-100">
  	<div class="container text-center">
		<div class="errorMesArea  p-5">
				<h1 class="error-title p-5"><?= h($message) ?></h1>
				<?php if ($message === "404 Not Found") : ?>
				        <strong>お探しのページが見つかりません。</strong>
				<?php endif; ?>
		</div>
		<div class="recLinkArea p-5">
			<ul>
				<li><a>foooo</a></li>
				<li><a>foooo</a></li>
				<li><a>foooo</a></li>
				<li><a>foooo</a></li>
			</ul>
		</div>

		<div class="errorImageArea">
			<div class="errorImageWrapper">
				<img src="//devil-code.com/img/851x315.png" widht="100%" style="max-width:100vw;">
			</div>
		</div>

  	</div>
  </main>
  <footer class="py-3 mt-4 bg-dark text-white">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/blog" class="nav-link px-2 text-muted">Blog</a></li>
      <li class="nav-item"><a href="<?= URL_GITHUB ?>" class="nav-link px-2 text-muted">GitHub</a></li>
      <li class="nav-item"><a href="/contact" class="nav-link px-2 text-muted">Contact</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2022 devil code</p>
  </footer>
</body>
</html>


