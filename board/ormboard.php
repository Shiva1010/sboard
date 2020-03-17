<?php session_start();
require "bootstrap.php";

if (isset($_POST['user'])) {

    $_SESSION['user'] = $_POST['user'];
}

$user = $_SESSION['user'];

?>

<html>
<meta charset="UTF-8"/>
<title>Shiva の　留言板</title>
<body>
<div style="text-align: center">
    <font size='6' color='#02C88b'>Shiva の 留言板</font><br><br>

    <form action="ormnewboard.php" method="POST">

        <font size='4' color='#02C7c'>
            留言者<br>
            <input type='hidden' name='author' value=<?= $user; ?>>
            <font size='4' color="#796a55"><?= $user; ?></font><br><br>

            留言內容<br><input type="text" name="content" id="contect" border="3" style="width:200px; height:50px;"><br>
        </font>
        <input type="submit" name="submit" value="新增留言"><br>

        <!--要回覆的文章編號，可用 hidden 處理-->
        <!-- <input type="hidden" name=$_POST['id']>-->
    </form>
</div>
