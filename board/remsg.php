<?php session_start();
include("conn.php");

//var_dump($_POST['author']);
//var_dump($_POST['contect']);
//die();

//$user = $_SESSION['user'];

if (isset($_POST["msg_id"])) {

    $boards_id = $_POST["board_id"];
    $msg_id = $_POST["msg_id"];
    $remsg_user = $_POST["remsg_user"];
    $remsg = $_POST["remsg"];


    $remsgs = "INSERT INTO remsgs(boards_id,msg_id,remsg_user,remsg)
            VALUES( '$boards_id','$msg_id','$remsg_user','$remsg')";




    $conn->exec($remsgs);


    echo "回覆評論成功";
//    echo "<br>
//          <form action = 'board.php' method = 'POST'>
//          <input type= 'hidden' name= 'user' value=$user>
//          <input type='submit'  value='返回留言板'>
//          ";


    $url = "board.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}
