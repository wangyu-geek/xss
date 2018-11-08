<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Core\View;
use Core\Controller;

/**
 * Report controller
 * 接收CSP请求，并写入日志
 * PHP version 7.0
 */
class Report extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        // 配置
        $log_file = BASEDIR. '/logs/csp-violations.log';

        http_response_code(204); // HTTP 204 No Content

        $json_data = file_get_contents('php://input');

        // 写入日志
        if ($json_data = json_decode($json_data)) {
            $json_data = json_encode($json_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            $json_data = date("Y-M-D H:i:s")."\n".$json_data."\n";
            file_put_contents($log_file, $json_data, FILE_APPEND | LOCK_EX);
        }
    }


}
