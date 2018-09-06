<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/4
 * Time: 0:03
 */

namespace App\Models;

use Core\Model;
use PDO;

class Post extends Model
{
    /**
     * @return array
     */
    public static function getTop10()
    {
        $sql = "select post.*,count(comment.id) as commentCount from post left join comment on post.id
        = comment.postId group by post.id limit 10";
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(int $id)
    {
        $sql = "select * from post where `id` = {$id}";
        $db = static::getDB();
        $stmt = $db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}