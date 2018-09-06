<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findOne($username)
    {
        $sql = "select * from `user` where `username` = :username";
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function setUUid($username, $uuid)
    {
        $sql = "update `user` set `uuid`=:uuid WHERE username= :username ";
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':uuid', $uuid);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }
}
