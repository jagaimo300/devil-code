<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
    $this->assign('title', 'devil-code(デビルコード) - ホームページ');
    $this->assign('canonical', '<link rel="canonical" href="https://devil-code.com" />');
?>

<?= $this->Html->css(['swiper-bundle.min.css'], ['block' => 'css']) ?>
<?= $this->Html->meta(["name"=>"description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:title","content"=>"【devil code】デビルコード プログラミングと情報技術"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:type","content"=>"article"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:description","content"=>"devil code(デビルコード)ではプログラミングの技術メモや学習記録、ITのキャリアプランや就職などについてブログを投稿しています。"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:url","content"=>"https://devil-code.com"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:image","content"=>"https://devil-code.com/img/prof.webp"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:site_name","content"=>"devil code"],null,["block"=>'meta']); ?>
<?= $this->Html->meta(["property"=>"og:locale","content"=>"ja_JP"],null,["block"=>'meta']); ?>
<section class="p-home__blogs">
    <div class="l-container l-container__common">
        <div class="p-home__sectionTitle">
           <h3 class="c-headingSize__2xl">Blog</h3>
           <span>ブログ</span>
        </div>

        <div class="p-home__articles c-articleListBasic">
                            <article class="c-articleListBasic__article">
                    <a href="/blogs/java/springboot-restful/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/java" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName">Java</div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="2023-07-21T12:32:35+09:00">2023-07-21</time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/java/springboot-restful/">Spring Boot + MySQLで CRUD RESTfulなエンドポイントを実装する方法
</a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
                            <!-- テンプレート内のループ -->
                                                                                                                                                                                                    <li><a href="/blogs/java/">Java</a></li>
                                                                            <li><a href="/blogs/spring-boot/">Spring Boot</a></li>
                                                                                                                                                                                    </ul>
                    </footer>
                </article>
                            <article class="c-articleListBasic__article">
                    <a href="/blogs/mysql/transaction/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/mysql" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName">MySQL</div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="2023-06-24T17:58:08+09:00">2023-06-24</time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/mysql/transaction/">PHPとMySQLでトランザクションを実装する方法</a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
                            <!-- テンプレート内のループ -->
                                                                                                                                        <li><a href="/blogs/java/">Java</a></li>
                                                                            <li><a href="/blogs/spring-boot/">Spring Boot</a></li>
                                                                                                                                                                                                                                                </ul>
                    </footer>
                </article>
                            <article class="c-articleListBasic__article">
                    <a href="/blogs/infra/mysql-backup/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/infra" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName">Infra</div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="2023-06-04T12:24:52+09:00">2023-06-04</time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/infra/mysql-backup/">さくらVPS【CentOS7】MySQLデータをダンプしてInfiniCLOUDにバックアップする方法</a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
                            <!-- テンプレート内のループ -->
                                                                                                                                                                                                                                        </ul>
                    </footer>
                </article>
                            <article class="c-articleListBasic__article">
                    <a href="/blogs/apache/setting-subdomain/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/apache" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName">Apache</div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="2023-05-30T17:13:33+09:00">2023-05-30</time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/apache/setting-subdomain/">VPSでサブドメインを設定する方法 【CentOS7 + Apache】</a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
                            <!-- テンプレート内のループ -->
                                                                                                                                                                                                                                        </ul>
                    </footer>
                </article>
                            <article class="c-articleListBasic__article">
                    <a href="/blogs/study/study-blog/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/study" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName">Study</div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="2023-05-09T16:45:56+09:00">2023-05-09</time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/study/study-blog/">CakePHPでこのブログを作った話</a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
                            <!-- テンプレート内のループ -->
                                                                                                                                                                                                                                        </ul>
                    </footer>
                </article>
                            <article class="c-articleListBasic__article">
                    <a href="/blogs/python/math-python/" tabindex="-1" class="c-articleListBasic__article-link"></a>
                    <header class="c-articleListBasic__article-header">
                        <a class="c-articleListBasic__article-categoryLink" href="/blogs/python" tabidnex="1">
                            <div class="c-articleListBasic__article-categoryName">Python</div>
                        </a>
                        <span class="c-articleListBasic__article-created"><time datetime="2023-01-31T17:39:23+09:00">2023-01-31</time></span>
                    </header>
                    <h4 class="c-articleListBasic__article-title"><a href="/blogs/python/math-python/">Pythonで整数１～１億の総和を求める 【Pythonで数学】</a></h4>
                    <footer class="c-articleListBasic__article-footer">
                        <ul class="c-articleListBasic__article-tags">
                            <!-- テンプレート内のループ -->
                                                                                                                                                                                                                                                                <li><a href="/blogs/computer-science/">Computer Science</a></li>
                                                                                                                        </ul>
                    </footer>
                </article>
                    </div>
    </div>

    <div class="l-container l-container__common c-viewMore">
        <a class=" c-viewMore__link" href="/blogs">ブログをもっと見る</a>
    </div>
</section>
