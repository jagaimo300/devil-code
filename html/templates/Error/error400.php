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

$status_code = 0;
switch( $message ) {
  case 'Not Found':
    $status_code = 404;
    break;
  case '404':
    $status_code = 404;
    break;  
  default:
    $status_code = 0;
}

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
<?php $this->end(); endif;?>

<?php if ($status_code === 404) : ?>
  <div class="container px-0 mx-auto text-center">
    <div class="row d-flex">
      <div class="col-lg-6 errorImageArea">
        <div class="errorImage mx-auto"></div>
        <h1 class="error-statusCode mt-5 mb-3 fw-bold">404 Not Found</h1>
        <p>お探しのページが見つかりません。</p>
      </div>
      <div class="col-lg-5 errorMesArea">
        <div class="inkArea mb-5">
          <ul class="text-center my-5">
            <?php foreach ($categories as $index => $category) : ?>
              <li class="categoryLink d-inline-block">
                <a class="d-inline-block me-3 mb-3" href="/blogs/<?= h($category->cat_label) ?>/"><span class="catTag" style="background-color: <?= h($category->cat_color) ?>;"><?= h($category->cat_label) ?></span></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div>
        </div>
      </div>
      <div class="btn-wrapper ls-1 pt-5">
          <a href="/blogs/" class="btn-long d-block position-relative border border-white text-white text-nowrap w-75 py-2 px-0 my-0 mx-auto">ブログ一覧を見る</a>
      </div>
    </div>
  </div>
<?php endif; ?>
