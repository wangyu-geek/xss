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
     * 文章详情
     * @throws NotFoundException
     */
    public function detailAction()
    {
        $id = $_GET['id'];
        $post = $this->findModel($id);
        $worm = $_GET['worm'] ?? '';
        $comments = CommentModel::getByPostId($id);
        View::renderTemplate('Post/detail.html',[
            'post' => $post,
            'worm' => $worm,
            'comments' => $comments,
        ]);
    }

    /**
     * 添加文章
     */
    public function addAction()
    {
        if($this->isGet()) {
            View::renderTemplate('Post/add.html');
        }
        else{
            $post = $this->beforeAdd();
            if($post === false) {
                $this->renderAjax([
                    'msg' => '参数错误'
                ]);
            }
            if($post->create()) {
                $this->renderAjax([
                    'msg' => '添加成功'
                ]);
            } else {
                $this->renderAjax([
                    'msg' => '添加失败'
                ]);
            }
        }
    }

    /**
     * 数据校验
     * @return PostModel|bool
     */
    private function beforeAdd()
    {
        $title = $_POST['title'] ?? '';
        $imgUrl = $_POST['imgUrl'] ?? '';
        $content = $_POST['content'] ?? '';
        if(empty($title) || empty($imgUrl) || empty($content)) {
            return false;
        }
        $post = new PostModel();
        $post->setContent($content);
        $post->setImgUrl($imgUrl);
        $post->setTitle($title);
        return $post;
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