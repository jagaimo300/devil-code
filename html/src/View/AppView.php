<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use Cake\Core\Configure;
/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
    }
    // public function render(?string $template = null, $layout = null): string
    // {
    //     $html = parent::render($template, $layout);

    //     // デバッグモード or 管理画面は通常出力
    //     if (Configure::read('debug') || ($this->getRequest()->getParam('prefix') == 'Admin')) {
    //         return $html;
    //     }
        
    //     // Minify化する
    //     return $this->sanitizeOutput($html);
    // }
    // function sanitizeOutput($buffer)
    // {

    //     // 改行が必要なタグは抽出
    //     preg_match_all('#\<textarea.*\>.*\<\/textarea\>#Uis', $buffer, $foundTxt);
    //     preg_match_all('#\<pre.*\>.*\<\/pre\>#Uis', $buffer, $foundPre);
    //     preg_match_all('#\<code.*\>.*\<\/code\>#Uis', $buffer, $foundPre);
    //     preg_match_all('#\<span.*\>.*\<\/span\>#Uis', $buffer, $foundPre);
    //     preg_match_all('#\<script.*\>.*\<\/script\>#Uis', $buffer, $foundPre);

    //     // 改行が必要なタグを先に置換しておく
    //     $buffer = str_replace($foundTxt[0], array_map(function ($el) {
    //         return '<textarea>' . $el . '</textarea>';
    //     }, array_keys($foundTxt[0])), $buffer);
        
    //     $buffer = str_replace($foundPre[0], array_map(function ($el) {
    //         return '<pre>' . $el . '</pre>';
    //     }, array_keys($foundPre[0])), $buffer);

    //     $buffer = str_replace($foundPre[0], array_map(function ($el) {
    //         return '<code>' . $el . '</code>';
    //     }, array_keys($foundPre[0])), $buffer);
    //     $buffer = str_replace($foundPre[0], array_map(function ($el) {
    //         return '<span>' . $el . '</span>';
    //     }, array_keys($foundPre[0])), $buffer);

    //     $buffer = str_replace($foundPre[0], array_map(function ($el) {
    //         return '<script>' . $el . '</script>';
    //     }, array_keys($foundPre[0])), $buffer);


    //     $search = [
    //         '/\>[^\S ]+/s',
    //         '/[^\S ]+\</s',
    //         '/(\s)+/s'
    //     ];

    //     $replace = [
    //         '>',
    //         '<',
    //         '\\1'
    //     ];

    //     // 改行を削除する
    //     $buffer = preg_replace($search, $replace, $buffer);

    //     // 改行が必要なタグを元に戻す
    //     $buffer = str_replace(array_map(function ($el) {
    //         return '<textarea>' . $el . '</textarea>';
    //     }, array_keys($foundTxt[0])), $foundTxt[0], $buffer);
        
    //     $buffer = str_replace(array_map(function ($el) {
    //         return '<pre>' . $el . '</pre>';
    //     }, array_keys($foundPre[0])), $foundPre[0], $buffer);

    //     return $buffer;
    // }
}
