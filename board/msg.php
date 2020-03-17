<?php session_start();
include("conn.php");

//var_dump($_POST['author']);
//var_dump($_POST['contect']);
//die();


//$user = $_SESSION['user'];


if (isset($_POST["board_id"])) {

    $boards_id = $_POST["board_id"];
    $msg_user = $_POST["msg_user"];
    $msg = $_POST["msg"];


    $msgs = "INSERT INTO msgs(boards_id,msg_user,msg)
            VALUES( '$boards_id','$msg_user','$msg')";


    $conn->exec($msgs);


//    echo "新增評論成功";
//    echo "<br>
//          <form action = 'board.php' method = 'POST'>
//          <input type= 'hidden' name= 'user' value=$user>
//          <input type='submit' name='submit' value='返回留言板'>
//          ";


    $url = "board.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}