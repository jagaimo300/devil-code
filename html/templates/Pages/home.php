<?= $this->Html->css('https://unpkg.com/swiper@8/swiper-bundle.min.css', ['block' => 'css']) ?>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg')">
            <div class="text-wrapper ls-1">
                <h2 class="blog-ttl my-4">CakePHPでブログサイトの構築1</h2>
                <p class="blog-subTtl small">サブタイトルサブタイトルサブタイトルサブタイトル</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg')">
            <div class="text-wrapper ls-1">
                <h2 class="blog-ttl my-4">CakePHPでブログサイトの構築2</h2>
                <p class="blog-subTtl small">サブタイトルサブタイトルサブタイトルサブタイトル</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg')">
            <div class="text-wrapper ls-1">
                <h2 class="blog-ttl my-4">CakePHPでブログサイトの構築3</h2>
                <p class="blog-subTtl small">サブタイトルサブタイトルサブタイトルサブタイトル</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg')">
            <div class="text-wrapper ls-1">
                <h2 class="blog-ttl my-4">CakePHPでブログサイトの構築4</h2>
                <p class="blog-subTtl small">サブタイトルサブタイトルサブタイトルサブタイトルサブタイトル</p>
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row my-5">
            <h2>Latest code</h2>
        </div>
        <div class="row">
            <a href="foo" class="col-md-4">
                <div class="code-box card mb-4 shadow-sm">
                    <h6 class="code-ttl text-center w-100">fooooo</h6>
                    <small class="lang-type">PHP</small>
                    <div class="code-body">
                        <pre class="code-text prettyprint lang-php">console.log('Hello World')</pre>
                    </div>
                </div>
            </a>
            <a href="foo" class="col-md-4">
                <div class="code-box card mb-4 shadow-sm">
                    <h6 class="code-ttl text-center w-100">fooooo</h6>
                    <small class="lang-type">PHP</small>
                    <div class="code-body">
                        <pre class="code-text prettyprint lang-php">console.log('Hello World')</pre>
                    </div>
                </div>
            </a>
            <a href="foo" class="col-md-4">
                <div class="code-box card mb-4 shadow-sm">
                    <h6 class="code-ttl text-center w-100">fooooo</h6>
                    <small class="lang-type">PHP</small>
                    <div class="code-body">
                        <pre class="code-text prettyprint lang-php">console.log('Hello World')</pre>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?= $this->Html->script('https://unpkg.com/swiper@8/swiper-bundle.min.js', ['block' => 'scriptBottom']) ?>
