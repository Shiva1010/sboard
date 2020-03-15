<?php session_start();
require_once("conn.php");

// 要使用 isset($_SESSION['user'] 還是 isset($_POST['user']) ???
if (isset($_POST['user'])) {

    $user = $_SESSION['user'] = $_POST['user'];

}

$boards_desc = "SELECT  * FROM boards ORDER  BY id DESC ";
//$msgs_desc = "SELECT * FROM msgs ORDER  BY id DESC";


$callboards = $conn->query($boards_desc);
//$callmsgs = $conn->query($msgs_desc);
?>

<html>
    <meta charset="UTF-8" />
    <title>新增留言</title>
<body>


<table border="1" align = "center">

    <tr>
        <th>番號</th>
        <th>留言</th>
        <th>回覆</th>
    </tr>

<!--<form action = "look.php" method="GET">-->
<?php

//echo "<input type='text' value='hi'>";

foreach ($callboards as $end){
    echo  "<tr>";
//    echo  "<td><input type='text' value='{$end['id']}'></td>";
    echo  "<td>
            <div align='center'>{$end['id']}</div>
            </td>";
    echo  "<td>
            <div><font size='2' color='#8b4513'>留言者：</font>{$end['author']}</div>
            <div><font size='2' color='#d2691e'>留言內容：</font>
            <div style='border:2px #984B5c solid'>{$end['content']}</div>
            <div><font size='1' color='#87ceeb'>留言時間：{$end['create_time']}</font></div>
            </td>>";
//    $msg_end['boards_id']
//    foreach ($callmsgs as $msg_end) {
    $msgs_desc = "SELECT * FROM msgs ORDER  BY id DESC";


    //    $callboards = $conn->query($boards_desc);
    $callmsgs = $conn->query($msgs_desc);


        foreach ($callmsgs as $msg_end) {
        if($end['id'] != $msg_end['boards_id']){
//            echo $end['id'] .'hello';
//            var_dump($msg_end.'<br>');
            continue;
        }
        echo "<td>
            <div><font size='2' color='#8b4513'>評論番號：</font>{$msg_end['boards_id']}</div>
            <div><font size='2' color='#f08080'>評論者：</font>{$msg_end['msg_user']}</div>
            <form action = 'msg.php' method= 'POST'>
            <input type = 'hidden' name='board_id' value='{$end['id']}'>
            <div>評論者：<input type='text' name='msg_user' value= $user></div>
            <div>評論內容：<input type='text' name='msg' id='msg'></div>
            <div><input type='submit' name='submit' value='回覆留言'></div>
            </form>
           </td>";

    }
//    echo  "<td><input type='submit' name='submit' value='回覆留言'></td>";
    echo  "</tr>";

//    print $end['author'];
//    print $end['content'];
}


?>



<form action = "newboard.php" method="POST">

    留言者:<input type="text" name="author" value= "<?=$user;?>" id="author"><br>
    留言內容:<input type="text" name="contect" id="contect"><br>
    <input type="submit" name="submit" value="新增留言"><br>


<!--要回覆的文章編號，可用 hidden 處理-->
<!-- <input type="hidden" name=$_POST['id']>-->

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



