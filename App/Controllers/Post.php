<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/4
 * Time: 23:05
 */

namespace App\Controllers;


use App\Lib\Exception\NotFoundException;
use App\Models\Comment as CommentModel;
use App\Models\Post as PostModel;
use Core\Controller;
use Core\View;

class Post extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function detailAction()
    {
        $id = $_GET['id'];
        $post = $this->findModel($id);
        $comments = CommentModel::getByPostId($id);
        View::renderTemplate('Post/detail.html',[
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    /**
     * 获取一篇文章
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    private function findModel($id)
    {
        $posts = PostModel::getById($id);
        if(empty($posts)) {
            throw new NotFoundException();
        }
        return $posts;
    }
}