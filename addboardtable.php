<?php
$server = "localhost";
$user = "root";
$password = "12345678";
$db = "sboard";



try{
    $conn = new PDO("mysql:host=$server;dbname=$db",$user,$password);

    $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $boards = "CREATE TABLE boards(
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        author VARCHAR (20) NOT NULL,
        content VARCHAR (100) NOT  NULL,
        create_time TIMESTAMP, 
        good INT(5)
        )";


    $conn->exec($boards,$msg,$remsg);

    echo "留言版資料表創建成功";

}catch(PDOException $e){

   echo $boards . "<br>"  . $e->getMessage();

}

    $conn = null;


