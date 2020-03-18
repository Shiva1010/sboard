<?php
session_start();
require "bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;


if (isset($_POST["msg_id"])) {

    $boards_id = $_POST["board_id"];
    $msg_id = $_POST["msg_id"];
    $remsg_user = $_POST["remsg_user"];
    $remsg = $_POST["remsg"];
    $create_time = Carbon::now();

    $QQ = Capsule::table('remsgs')->insert
    ([
        'boards_id' => $boards_id,
        'msg_id' => $msg_id,
        'remsg_user' => $remsg_user,
        'remsg' => $remsg,
        'create_time' => $create_time,
    ]);


    echo "新增回覆成功";


    $url = "ormboard.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}