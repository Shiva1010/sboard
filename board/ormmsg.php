<?php session_start();
require "bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;


if (isset($_POST["board_id"])) {

    $boards_id = $_POST["board_id"];
    $msg_user = $_POST["msg_user"];
    $msg = $_POST["msg"];
    $create_time = Carbon::now();

   $QQ= Capsule::table('msgs')->insert
    ([
        'boards_id' => $boards_id,
        'msg_user' => $msg_user,
        'msg' => $msg,
        'create_time' => $create_time,
    ]);


    echo "新增評論成功";



    $url = "ormboard.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}