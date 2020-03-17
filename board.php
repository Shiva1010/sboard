<?php session_start();
include("conn.php");
//require_once("conn.php");

// 要使用 isset($_SESSION['user'] 還是 isset($_POST['user']) ???
if (isset($_POST['user'])) {

    $_SESSION['user'] = $_POST['user'];

}

$user = $_SESSION['user'];
//elseif(isset($_POST["author"])){
//
//    $user = $_SESSION['author'] = $_POST['author'];
//
//}else{
//
//    $user="不要問我是誰";
//
//}


?>

<html>
<meta charset="UTF-8"/>
<title>Shiva の　留言板</title>
<body>
<div style="text-align: center">
    <font size='6' color='#02C88b'>Shiva の 留言板</font><br><br>


    <form action="newboard.php" method="POST">

        <font size='4' color='#02C7c'>
            留言者<br>
            <input type='hidden' name='author' value=<?= $user; ?>>
            <font size='4' color="#796a55"><?= $user; ?></font><br><br>

            留言內容<br><input type="text" name="contect" id="contect" border="3" style="width:200px; height:50px;"><br>
        </font>
        <input type="submit" name="submit" value="新增留言"><br>


        <!--要回覆的文章編號，可用 hidden 處理-->
        <!-- <input type="hidden" name=$_POST['id']>-->
    </form>
</div>

<table border="1" align="center">

    <!--    <tr>-->
    <!--        <th>番號</th>-->
    <!--        <th>留言</th>-->
    <!--        <th>回覆內容</th>-->
    <!--    </tr>-->

    <!--<form action = "look.php" method="GET">-->
    <?php

    //echo "<input type='text' value='hi'>";

    $boards_desc = "SELECT  * FROM boards ORDER  BY id DESC ";

    $callboards = $conn->query($boards_desc);

    foreach ($callboards as $end) {
//    echo  "<td><input type='text' value='{$end['id']}'></td>";

//    echo  "<td>";
//        echo"<div style='border:5px #408080 groove'>";
        echo "
            <div style='border:3px 	#FF7575 ridge'>
            <font size='2' color='#8b4513'>番號：{$end['id']}</font><br>
            <font size='2' color='#8b4513'>留言者：</font>{$end['author']}<br>
            <font size='1' color='#9D9D9D'>留言時間：{$end['create_time']}</font><br>
            <br>
            <font size='2' color='#8b4513'>留言內容</font><br>
            
            {$end['content']}<br>
            <form action = 'msg.php' method= 'POST'>
            <input type = 'hidden' name='board_id' value='{$end['id']}'>
            <input type = 'hidden' name='msg_user' value=$user >
            <font size='2' color='#006400'>評論留言：</font><input type='text' name='msg'><br>
            <input type='submit' name='submit' value='進行評論'></div>
            </form>
            <br>";
//            </td>";

        $msgs_desc = "SELECT * FROM msgs ORDER  BY id DESC";
        $callmsgs = $conn->query($msgs_desc);


        foreach ($callmsgs as $msg_end) {

            if ($end['id'] != $msg_end['boards_id']) {
                continue;
            }
//                echo "<td>
            echo "
                  
                    <div style='border:3px #A3D1D1 ridge'	><font size='1' color='#7E3D76'>評論號：</font>{$msg_end['id']}<br>
                    <font size='1' color='#7E3D76'>評論者：</font>{$msg_end['msg_user']}<br>
                    <font size='1' color='#a9a9a9'>評論時間：{$msg_end['create_time']}</font>
                    <br><br>
                    <font size='2' color='	#7E3D76'>評論內容</font><br>
                    <font size='1' color='black'>{$msg_end['msg']}</font>
                    
                    <form action = 'remsg.php' method = 'POST'>
                    <input type= 'hidden' name= 'board_id' value='{$msg_end['boards_id']}'>
                    <input type= 'hidden' name= 'msg_id' value ='{$msg_end['id']}'>
                    <input type= 'hidden' name= 'remsg_user' value = $user>
                    <font size='1' color='teal'>回覆評論：<input type= 'text' name= 'remsg'></font><br>
                    <div><input type='submit' name='submit' value='回覆'></div>
                    </form>
                    </div>
                    <br>";

            $remsgs_desc = "SELECT * FROM remsgs ORDER BY id DESC";
            $callremsgs = $conn->query($remsgs_desc);

            foreach ($callremsgs as $remsg_end) {


                if ($msg_end['id'] != $remsg_end['msg_id']) {
                    continue;
                }

//                    echo "
//                       <td>
//                        <div><font size='1' color='#8b4513'>留言號：</font>{$remsg_end['boards_id']}</div>
//                        <div><font size='1' color='#8b4513'>評論號：</font>{$remsg_end['msg_id']}</div>
//                        <div><font size='2' color='#f08080'>回覆者：</font>{$remsg_end['remsg_user']}</div>
//
//                    </td>";


                echo "
                        
                        <font size='1' color='#f08080'>回覆者：</font>
                        <font size='1' color='#5B4B00'>{$remsg_end['remsg_user']}</font><br>
                        <font size='1' color='#f08080'>回覆內容</font><br>
                        <font size='1' color='#5B4B00'>{$remsg_end['remsg']}</font><br><br>";

            }
            echo "<br>";
//            echo "</div>";
        }


    }


    ?>

</body>
</html>





