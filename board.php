<?php session_start();

// 要使用 isset($_SESSION['user'] 還是 isset($_POST['user']) ???
if (isset($_POST['user'])) {

    $user = $_SESSION['user'] = $_POST['user'];

}

?>

<html>
    <meta charset="UTF-8" />
    <title>新增留言</title>
<body>
<form action = "newboard.php" method="post">

    留言者:<input type="text" name="author" value= "<?=$user;?>" id="author"><br>
    留言內容:<input type="text" name="contect" id="contect"><br>
    <input type="submit" name="submit" value="新增留言"><br>

    <form action = "msg.php" method="post">


        回覆留言:<input type="text" name="msg_user" value= "<?=$user;?>" id="msguser"><br>
        回覆內容:<input type="text" name="msg" id="msg"><br>
        <input type="submit" name="submit" value="回覆留言">
    </form>
</form>



</body>
</html>



<?php
//include "conn.php";
//
//if(isset($_POST["submit"]))
//{
//    $sql="INSERT INTO boards(id,author,content,create_time,good)
//            VALUES( NULL,'$_POST[author]','$_POST[contect]',now(),0)";
//    mysqli_query($sql);
//
//    echo "新增留言成功";
//
//    $url = "board.php";
//    echo "<script language='javascript' type='text/javascript'>";
//    echo "window.location.href='$url'";
//    echo "</script>";

//}
//
//
//?>



