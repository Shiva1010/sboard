<?php session_start();
require "bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;

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

<?php


    $boards_desc = Capsule::table('boards')
        ->select()
        ->orderBy('id','desc')
        ->get();


    foreach ($boards_desc as $end) {
        echo "
                <div style='border:3px 	#FF7575 ridge'>
                <font size='2' color='#8b4513'>番號：{$end->id}</font><br>
                <font size='2' color='#8b4513'>留言者：</font>{$end->author}<br>
                <font size='1' color='#9D9D9D'>留言時間：{$end->create_time}</font><br>
                <br>
                <font size='2' color='#8b4513'>留言內容</font><br>
                
                {$end->content}<br><br>
                   
                   
                <form action = 'ormmsg.php' method= 'POST'>
                <input type = 'hidden' name='board_id' value='{$end->id}'>
                <input type = 'hidden' name='msg_user' value=$user >
                <font size='2' color='#006400'>評論留言：</font><input type='text' name='msg'><br>
                <input type='submit' name='submit' value='評論'></div>
                </form>
                <br>";



    }