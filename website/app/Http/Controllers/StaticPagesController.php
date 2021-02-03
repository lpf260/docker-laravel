<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //
    public function home()
    {

        return view("static_pages/home");
    }

    public function help()
    {
        return view("static_pages/help");
    }

    public function about()
    {
        return view("static_pages/about");
    }

    public function test()
    {
////        echo phpinfo();
//
//        $host = "mysql";
//        $port = "3306"; //
//        $username = "root";
//        $password = "zaq12wsx";
//        $dbname = "weibo";
//        $charset = "utf8";
//        $dsn = "mysql:dbname=$dbname;host=$host";
//
//        try{
//            $pdo = new \Pdo($dsn, $username, $password);
//            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);    // 设置sql语句查询如果出现问题 就会抛出异常
//            set_exception_handler("cus_exception_handler");
//        } catch(PDOException $e){
//            die("连接失败: ".$e->getMessage());
//        }
    }
}
