<?php
include ("conn.php");

$boards_asc = "SELECT  * FROM boards ORDER  BY id ASC ";

$callboards = $conn->query($boards_asc);

foreach ($callboards as $end){

    print $end['id'];
    print $end['author'];
    print $end['cotent'];
}

var_dump($callboards);
die();

header('Location: board.php');

