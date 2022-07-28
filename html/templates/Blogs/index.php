<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>
<?= $this->Html->css('https://unpkg.com/swiper@8/swiper-bundle.min.css', ['block' => 'css']) ?>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('../img/sample_1.jpg')">
            <div class="text-wrapper ls-1">
                <h2 class="blog-ttl my-4">Blog</h2>
                <p class="blog-subTtl small">foooooooooooooooo</p>
            </div>
        </div>
    </div>
</div>
<section class="blog">
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row my-5">
                <h2>NEWS</h2>
            </div>
            <div class="row mb-2">
                <div class="col-md-8 card-item pt-3">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($news as $index => $new): ?>
                            <li class="list-group-item mb-3"><span class="me-3 catTag"><?= h($new->blogs_category->category_label) ?></span><?= h($new->created) ?><?= h($new->title) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- <div class="col-md-4 card-item">
                    <ul class="row">
                        <li class="mb-3"><a href="https://blog.naver.com/devil_code">힌국어 브로그</a></li>
                        <li class="mb-3"><a href="https://medium.com/@devil-code">English blog</a></li>
                        <li class="mb-3"><a href="https://twitter.com/devil_code_com">@devil_code_com</a></li>
                        <li class="mb-3"><a href="https://www.instagram.com/devil_code_com/">@devil_code_com</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <h2>Featured</h2>
        </div>
	    <div class="row mb-2 d-flex justify-content-between">
            <?php foreach ($blogs as $index => $blog): ?>
                <?php if ($index <= 3): ?>
                    <div class="col-md-12 col-lg-4 pe-5">
                        <div class="row mb-4 card-item overflow-hidden">
                            <div class="col-auto blog_img w-100" style="background-image:url('https://devil-code.com/files/blogs/1.jpg'); background-position: center; background-size: cover; background-repeat: norepeat; height: 240px;"></div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary"><?= h($blog->blogs_category->category_label) ?></strong>
                                <h3 class="mb-0"><?= h($blog->title) ?></h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto"><?= h($blog->body) ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-4 blog-featured overflow-hidden">
                        <div class="row mb-4">
                            <div class="col-auto blog_img w-100" style="background-image:url('https://devil-code.com/files/blogs/1.jpg'); background-size: cover; background-repeat: norepeat; height: 360px;"></div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary"><?= h($blog->blogs_category->category_label) ?></strong>
                                <h3 class="mb-0"><?= h($blog->title) ?></h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto"><?= h($blog->body) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
	    </div>
    </div>
</section>
<div class="blogs index content">
	<!--
    <?= $this->Html->link(__('New Blog'), ['action' => 'add'], ['class' => 'button float-right']) ?>
	-->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog): ?>
                <tr>
                    <td><?= $this->Number->format($blog->id) ?></td>
                    <td><?= h($blog->title) ?></td>
                    <td><?= h($blog->blogs_category->category_label) ?></td>
                    <td><?= h($blog->created) ?></td>
                    <td><?= h($blog->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $blog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
