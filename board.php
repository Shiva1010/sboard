<?php session_start();
require_once("conn.php");

// 要使用 isset($_SESSION['user'] 還是 isset($_POST['user']) ???
if (isset($_POST['user'])) {

    $user = $_SESSION['user'] = $_POST['user'];

}

$boards_asc = "SELECT  * FROM boards ORDER  BY id ASC ";

$callboards = $conn->query($boards_asc);
?>

<html>
    <meta charset="UTF-8" />
    <title>新增留言</title>
<body>


<table border="1" align = "center">

    <tr>
        <th>ID</th>
        <th>留言者</th>
        <th>留言</th>
        <th>留言時間</th>
        <th>讚數</th>
        <th>回覆者</th>
    </tr>

<!--<form action = "look.php" method="GET">-->
<?php

//echo "<input type='text' value='hi'>";

foreach ($callboards as $end){
    echo  "<tr>";
    echo  "<td><input type='text' value='{$end['id']}'></td>";
    echo  "<td><input type='text' value='{$end['author']}'></td>>";
    echo  "<td><input type='text' value='{$end['content']}'></td>>";
    echo  "<td><input type='text' value='{$end['create_time']}'></td>";
    echo  "<td><input type='text' value='{$end['good']}'></td>>";
    echo  "<td><input type='submit' name='submit' value='回覆留言'></td>";
    echo  "</tr>";

//    print $end['author'];
//    print $end['content'];
}


?>


<div></div>
<form action = "newboard.php" method="POST">

    留言者:<input type="text" name="author" value= "<?=$user;?>" id="author"><br>
    留言內容:<input type="text" name="contect" id="contect"><br>
    <input type="submit" name="submit" value="新增留言"><br>

    <form action = "msg.php" method="POST">

        <input type="hidden" name=$_POST['id']>
        評論者:<input type="text" name="msg_user" value= "<?=$user;?>" id="msg_user"><br>
        評論內容:<input type="text" name="msg" id="msg"><br>
        <input type="submit" name="submit" value="回覆留言">
    </form>
</form>


</body>
</html>



<?php
//
//while ($row_board = $callboards->fetch(PDO::FETCH_ASSOC)){
//
//
//
////include "conn.php";
////
////if(isset($_POST["submit"]))
////{
////    $sql="INSERT INTO boards(id,author,content,create_time,good)
////            VALUES( NULL,'$_POST[author]','$_POST[contect]',now(),0)";
////    mysqli_query($sql);
////
////    echo "新增留言成功";
////
////    $url = "board.php";
////    echo "<script language='javascript' type='text/javascript'>";
////    echo "window.location.href='$url'";
////    echo "</script>";
//
////}
////
////
////?>



