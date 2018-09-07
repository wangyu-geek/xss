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
//        header("Content-Security-Policy: default-src 'self'"); //默认只信任同域下的，误伤资源
//        header("Content-Security-Policy: script-src 'self'"); //默认只信任同域下的，导致内嵌的script不可用
//        header("Content-Security-Policy: script-src 'self' 'nonce-123456'"); //指定随机字符串，和前端匹配则执行

        $from = $_GET['from'] ?? '';
        $jump = $_GET['jump'] ?? '';
        $posts = Post::getTop10();
        $comments = Comment::getTop10();
//        $from = htmlspecialchars($from);

        View::renderTemplate('Home/index.html',[
            'posts' => $posts,
            'comments' => $comments,
            'from' => $from,
            'jump' => $jump
        ]);
    }
}
