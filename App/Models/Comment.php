<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/4
 * Time: 0:07
 */

namespace App\Models;

use Core\Model;
use Pdo;

class Comment extends Model
{
    private $userId;
    private $postId;

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    private $content;
    private $createdAt;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public static function getTop10()
    {
        $sql = "select `comment`.*,post.id as postId,post.title as postTitle,user.username as username from comment 
            left join post on comment.postId = post.id 
            left join user on comment.userId = user.id order by comment.id desc limit 10";
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByPostId($id)
    {
        $sql = "select `comment`.*,post.id as postId,post.title as postTitle,user.username as username from `comment`
            left join post on comment.postId = post.id 
            left join user on comment.userId = user.id order by comment.id desc limit 10";
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $sql = "insert into `comment` (userId,postId,content) 
            values(:userId, :postId, :content)";
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':postId', $this->userId);
        $stmt->bindParam(':content', $this->content);
        return $stmt->execute();
    }
}