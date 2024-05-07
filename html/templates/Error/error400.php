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
$this->assign('templateName', 'error400.php');
?>
<section class="p-errorContent">
    <div class="l-container l-container__common">
        <div class="p-errorContent__status">404</div>
        <p class="p-errorContent__message">このページはすでに削除されているか、URLが変更された可能性があります。</p>
        <div class="p-errorContent__image">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
             width="320.000000pt" height="220.000000pt" viewBox="0 0 320.000000 220.000000"
             preserveAspectRatio="xMidYMid meet">

            <g transform="translate(0.000000,220.000000) scale(0.100000,-0.100000)"
            fill="#8071ff" stroke="none">
            <path d="M0 1100 l0 -1100 1600 0 1600 0 0 1100 0 1100 -1600 0 -1600 0 0
            -1100z m1410 554 c0 -12 6 -15 23 -10 12 4 58 10 102 13 l80 6 -3 -87 c-5
            -135 31 -237 116 -329 59 -63 119 -104 185 -127 28 -10 53 -23 55 -28 4 -14
            -85 -99 -137 -129 -25 -14 -47 -27 -48 -28 -2 -1 11 -28 28 -59 l31 -58 45 44
            c25 23 51 55 59 71 8 15 18 27 23 27 4 0 23 -21 41 -47 18 -27 46 -62 62 -79
            32 -34 30 -64 -4 -64 -12 0 -27 -8 -34 -17 -11 -15 -16 -16 -33 -5 -28 16 -29
            16 -23 -13 4 -21 1 -25 -20 -25 -14 0 -33 9 -44 21 -47 52 -52 42 -25 -55 l26
            -93 36 4 c31 5 40 0 75 -36 25 -27 46 -41 59 -39 12 2 39 31 67 73 47 71 61
            84 72 66 10 -15 -30 -87 -76 -137 -53 -58 -82 -59 -134 -4 -60 63 -96 51 -83
            -28 4 -26 8 -71 8 -99 l1 -53 -147 0 c-82 0 -259 3 -395 7 l-248 6 0 47 c0 67
            37 233 71 319 16 41 27 76 25 79 -3 2 -19 -7 -36 -22 -17 -14 -38 -26 -46 -26
            -21 0 -29 27 -13 46 11 13 9 14 -15 2 -24 -10 -30 -10 -41 5 -7 9 -20 17 -29
            17 -28 0 -30 29 -4 58 14 15 40 48 58 75 18 26 37 47 40 47 4 0 19 -17 33 -37
            14 -21 39 -53 55 -72 l29 -34 32 53 c18 29 31 53 29 55 -2 1 -16 9 -33 18 -72
            37 -145 131 -171 221 -41 144 23 300 158 386 30 19 62 47 71 63 18 30 47 37
            47 11z"/>
            </g>
            </svg>
        </div>
        <div class="l-container c-viewMore">
            <a class=" c-viewMore__link" href="/">トップへ戻る</a>

        </div>
    </div>
</section>
