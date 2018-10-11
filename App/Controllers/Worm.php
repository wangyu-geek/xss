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

class Worm extends Controller
{
    /**
     * @throws \Exception
     */
    public function indexAction()
    {
        $worm = $_GET['worm'] ?? '';
        View::renderTemplate('Worm/index.html',[
            'worm' => $worm
        ]);
    }
}