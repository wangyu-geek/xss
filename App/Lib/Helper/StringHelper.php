<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/7
 * Time: 0:53
 */
namespace App\Lib\Helper;

class StringHelper
{
    const STR_POOL = 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm';
    public static function getUUid()
    {
        str_shuffle(self::STR_POOL);
        return substr(str_shuffle(self::STR_POOL),26,10);
    }
}