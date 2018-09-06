<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/4
 * Time: 23:27
 */
namespace App\Lib\Exception;

class NotFoundException extends \Exception
{
    protected $message = '你所访问的是未知宇宙';
    protected $code = 404;
}