<?php session_start();
require "bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;



if (isset($_POST["author"])) {

    $author = $_POST["author"];
    $content = $_POST["content"];
    $create_time = Carbon::now();

    Capsule::table('boards')->insert
    ([
        'author' => $author,
        'content' => $content,
        'create_time' => $create_time,
        ]);



    echo "新增留言成功";



    $url = "ormboard.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}