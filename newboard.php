<?php
include("conn.php");

//var_dump($_POST['author']);
//var_dump($_POST['contect']);
//die();







if (isset($_POST["author"])) {

    $author = $_POST["author"];
    $contect = $_POST["contect"];
//    $creat_time = now();
    $good = 0;

    $sql="INSERT INTO boards(author,content,good)
            VALUES( '$author','$contect','$good')";

//    var_dump($sql);
//    die();

    $conn->exec($sql);



    echo "新增留言成功";



//    $url = "board.php";
//    echo "<script language='javascript' type='text/javascript'>";
//    echo "window.location.href='$url'";
//    echo "</script>";

}


