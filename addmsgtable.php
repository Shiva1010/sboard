<?php

$server = "localhost";
$user = "root";
$password = "12345678";
$db = "sboard";


try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $msg = "CREATE TABLE msgs(
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        boards_id INT(4),
        msg_user VARCHAR (20) NOT NULL,
        msg VARCHAR (100) NOT NULL,   
        create_time TIMESTAMP 

    )";

    $conn->exec($msg);

    echo "回覆留言資料表創建成功";

    } catch (PDOException $e) {

    echo $msg . "<br>" . $e->getMessage();

    }

$conn = null;


