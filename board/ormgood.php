<?php
session_start();
require "bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;

$board_id = $_POST['board_id'];
$user_id = $_POST['user_id'];
$user = $_POST['user'];
$create_time = Carbon::now();

$have_good = Capsule::table('goods')
    ->where ('user_id','=',$user_id)
    ->where('boards_id','=',$board_id)
    ->first();



if ($have_good === null){

    Capsule::table('goods')->insert
    ([
        'user_id' => $user_id,
        'boards_id' => $board_id,
        'user_name' => $user,
        'create_time' => $create_time,
    ]);
    echo  "按讚完成<br>";

}else{

    $delete_good = Capsule::table('goods')
        ->where ('user_id','=',$user_id)
        ->where('boards_id','=',$board_id)
        ->delete();
    echo  "收回讚<br>";

}