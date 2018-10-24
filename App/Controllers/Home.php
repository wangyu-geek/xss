<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Core\View;
use Core\Controller;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
//        禁止 iframe 加载
    header('X-Frame-Options:sameorigin');

        $from = $_GET['from'] ?? '';
        $jump = $_GET['jump'] ?? '';
        $keyword = $_GET['keyword'] ?? '';
        $posts = Post::getTop10();
        $comments = Comment::getTop10();

        View::renderTemplate('Home/index.html',[
            'posts' => $posts,
            'comments' => $comments,
            'from' => $from,
            'jump' => $jump,
            'keyword' => $keyword,
        ]);
    }



// header("Content-Security-Policy: default-src 'self'"); //默认只信任同域下的，误伤资源
//默认只信任同域下的，导致内嵌的script不可用
// header("Content-Security-Policy: script-src 'self'");
//指定随机字符串，和前端匹配则执行
// header("Content-Security-Policy: script-src 'self' 'nonce-123456'");
// $from = htmlspecialchars($from);

// 过滤<script> 等标签，但不能解决“跳过”
//$purifier = new \HTMLPurifier();
// $from = $purifier->purify($from);
//$jump = $purifier->purify($jump);
//可以处理跳过漏洞
// $jump = htmlspecialchars($jump);
}
