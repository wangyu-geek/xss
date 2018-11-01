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

class MingRenTang extends Controller
{
    /**
     * @throws \Exception
     */
    public function indexAction()
    {
        $worm = $_GET['worm'] ?? '';
//        $purifier = new \HTMLPurifier();
//        $worm = $purifier->purify($worm);

        View::renderTemplate('MingRenTang/index.html',[
            'worm' => $worm
        ]);
    }
}


//$purifier = new \HTMLPurifier();
// $from = $purifier->purify($from);
// header("Content-Security-Policy: default-src 'self'"); //默认只信任同域下的，误伤资源
// header("Content-Security-Policy: script-src 'self'");
// header("Content-Security-Policy: script-src 'self' 'nonce-123456'");