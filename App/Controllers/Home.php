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
//        header('X-XSS-Protection', 0);
        $from = $_GET['from'] ?? '';
        $posts = Post::getTop10();
        $comments = Comment::getTop10();
        View::renderTemplate('Home/index.html',[
            'posts' => $posts,
            'comments' => $comments,
            'from' => $from
        ]);
    }
}
