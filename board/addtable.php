<?php
include("conn.php");


try{
    $conn = new PDO("mysql:host=$server;dbname=$db",$user,$password);

    $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $boards = "CREATE TABLE boards(
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        author VARCHAR (20) NOT NULL,
        content VARCHAR (100) NOT  NULL,
        create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
        good INT(5)
        )";


    $conn->exec($boards);



    $msg = "CREATE TABLE msgs(
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        boards_id INT(4),
        msg_user VARCHAR (20) NOT NULL,
        msg VARCHAR (100) NOT NULL,   
        create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $conn->exec($msg);


    $remsg = "CREATE TABLE remsgs(
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        boards_id INT(4),
        msg_id INT(4),
        remsg_user VARCHAR (20) NOT NULL,
        remsg VARCHAR (100) NOT NULL,   
        create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

    $conn->exec($remsg);



    echo "留言版 ( 留言、回覆、回覆回覆 ) 資料表創建成功";

}catch(PDOException $e){

    echo $boards . "<br>"  . $e->getMessage();

}

$conn = null;