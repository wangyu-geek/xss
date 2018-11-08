<?php
/**
 * Created by PhpStorm.
 * User: 王宇
 * Date: 2018/10/11
 * Time: 14:04
 */

namespace App\Controllers;


use Core\Controller;
use Core\View;

/**
 * Class MingRenTang 名人堂页面
 * @package App\Controllers
 */
class MingRenTang extends Controller
{
    /**
     * worm 参数包含 xss 漏洞
     * @throws \Exception
     */
    public function indexAction()
    {
        $worm = $_GET['worm'] ?? '北京';

        View::renderTemplate('MingRenTang/index.html',[
            'worm' => $worm
        ]);
    }
}


//$purifier = new \HTMLPurifier();
// $from = $purifier->purify($from);
//header("Content-Security-Policy: script-src 'self'; report-uri /report/index");
// header("Content-Security-Policy: default-src 'self'"); //默认只信任同域下的，误伤资源
// header("Content-Security-Policy: script-src 'self'");
// header("Content-Security-Policy: script-src 'self' 'nonce-123456'");