<?php
    $this->assign('title', ' - Homepage');
?>

<section>
    <div class="container">

		<?= $this->Form->create($contact) ?>
		<?= $this->Form->control('name') ?>
		<?= $this->Form->control('email') ?>
		<?= $this->Form->control('body') ?>
		<?= $this->Form->button('Submit') ?>
		<?= $this->Form->end() ?>

        <div class="row my-5">
            <h2>Latest posts</h2>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                            lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="contact">
    <div class="contact-bg container-fluid my-5">
        <div class="contact-inner row justify-content-center align-items-center text-center">
            <div class="ls-1 col-6 h-50 d-flex flex-column text-white">
                <h3 class="py-5 border-top border-bottom border-white fw-bold">Connect With devil code</h3>
                <div class="contact-btn-wrapper mt-5">
                    <a href="#" class="contact-btn px-4 px-md-5 py-3 border border-3 border-white text-white text-nowrap">
                        Send Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->Html->script('https://unpkg.com/swiper@8/swiper-bundle.min.js', ['block' => 'scriptBottom']) ?>