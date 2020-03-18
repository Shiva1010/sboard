<?php
session_start();
require "bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;

//$user = $_SESSION['user'];

if (isset($_POST["user"])) {

    $create_time = Carbon::now();

    Capsule::table('users')->insert
    ([
        'user_name' => $_POST["user"],
        'create_time' => $create_time,
    ]);


    echo "新增 User 成功";
//
    $_SESSION["user"]=$_POST["user"];
    $url = "ormboard.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}
