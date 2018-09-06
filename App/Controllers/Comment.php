<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/5
 * Time: 0:32
 */

namespace App\Controllers;


use Core\Controller;
use Twig\Error\Error;

class Comment extends Controller
{
    /**
     * 添加评论
     * @return bool
     */
    public function addAction()
    {
        $result = $this->beforeAdd();
        if($result === false) {
            return false;
        }
        if($r = $result->create()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \App\Models\Comment|bool
     */
    private function beforeAdd()
    {
        $postId  = $_POST['postId'] ?? 0;
        $content = $_POST['content'] ?? '';
        $userId = $_POST['userId'] ?? 1;
        if( empty($postId) || empty($content) || empty($userId) ) {
            return false;
        }
        $comment = new \App\Models\Comment();
        $comment->setUserId($userId);
        $comment->setContent($content);
        $comment->setPostId($postId);
        return $comment;
    }
}