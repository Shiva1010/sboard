<?php session_start();
include("conn.php");

//var_dump($_POST['author']);
//var_dump($_POST['contect']);
//die();

$user = $_SESSION['user'];


if (isset($_POST["author"])) {

    $author = $_POST["author"];
    $contect = $_POST["contect"];

    $good = 0;

    $sql="INSERT INTO boards(author,content,good)
            VALUES( '$author','$contect','$good')";


   $conn->exec($sql);



    echo "新增留言成功";
    echo "<br>
          <form action = 'board.php' method = 'POST'>
          <input type= 'hidden' name= 'user' value=$user>
          <input type='submit' name='submit' value='返回留言板'>
          ";



//    $url = "board.php";
//    echo "<script language='javascript' type='text/javascript'>";
//    echo "window.location.href='$url'";
//    echo "</script>";

}


