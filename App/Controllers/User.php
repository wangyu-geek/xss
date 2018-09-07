<?php
/**
 * Created by PhpStorm.
 * User: wangyu
 * Date: 2018/9/6
 * Time: 23:28
 */

namespace App\Controllers;


use App\Lib\Exception\NotFoundException;
use App\Lib\Helper\StringHelper;
use Core\Controller;
use Core\View;

class user extends Controller
{
    /**
     * 添加评论
     * @return bool
     */
    public function loginAction()
    {
        View::renderTemplate('User/login.html');
    }

    public function doLoginAction()
    {
        $username = $_POST['username'] ?? '';
        $pwd = $_POST['password'] ?? '';
        $user = $this->findModel($username);

        if($user['password'] == $pwd) {
            $uuid = StringHelper::getUUid();
            setcookie('uuid', $uuid, time()+36000, '/');
            \App\Models\User::setUUid($username, $uuid);
            $this->redirect('/Home/index');
        } else {
            $this->redirect('/User/login');
        }
    }

    private function findModel($username)
    {
        $user = \App\Models\User::findOne($username);
        if(empty($user)) {
            header("Location:{$_SERVER['HTTP_REFERER']}");
            //            throw new NotFoundException("用户不存在");
        }
        return $user;
    }
}