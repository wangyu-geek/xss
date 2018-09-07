<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/5
 * Time: 0:32
 */

namespace App\Controllers;


use Core\Controller;
use Core\View;
use Twig\Error\Error;

class Purifier extends Controller
{
    /**
     * 添加评论
     * @return bool
     */
    public function indexAction()
    {
        $content = $_POST['content'] ?? '';

        $purifier = new \HTMLPurifier();
        $content = $purifier->purify($content);

        View::renderTemplate('Purifier/index.html',[
            'content' => $content,
        ]);
    }

}