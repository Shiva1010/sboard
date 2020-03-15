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


<form action = "newboard.php" method="POST">

    留言者:<input type="text" name="author" value= "<?=$user;?>" id="author"><br>
    留言內容:<input type="text" name="contect" id="contect"> <br>
    <input type="submit" name="submit" value="新增留言"><br>


    <!--要回覆的文章編號，可用 hidden 處理-->
    <!-- <input type="hidden" name=$_POST['id']>-->

</form>

<table border = "1" align = "center">

    <tr>
        <th>番號</th>
        <th>留言</th>
        <th>回覆內容</th>
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
            <div style='border:3px #98685cd8 ridge'>{$end['content']}</div>
            <div><font size='1' color='#87ceeb'>留言時間：{$end['create_time']}</font></div>
            <br>
            
            <form action = 'msg.php' method= 'POST'>
            <input type = 'hidden' name='board_id' value='{$end['id']}'>
            <input type = 'hidden' name='msg_user' value=$user >
            <div><font size='2' color='#006400'>評論留言：</font><input type='text' name='msg'></div>
            <div><input type='submit' name='submit' value='進行評論'></div>
            </form>
            </td>>";

    $msgs_desc = "SELECT * FROM msgs ORDER  BY id DESC";
    $callmsgs = $conn->query($msgs_desc);


        foreach ($callmsgs as $msg_end) {

            if($end['id'] != $msg_end['boards_id']){
                continue;
            }
                echo "<td>
                    <div><font size='1' color='#8b4513'>評論號：</font>{$msg_end['id']}</div>
                    <div><font size='2' color='#f08080'>評論者：</font>{$msg_end['msg_user']}</div>
                    <div><font size='2' color='#f08080'>評論內容：</font></div>
                    <div style='border:3px #98bb5cd8 ridge'><font size='1'>{$msg_end['msg']}</div>
                    <div><font size='1' color='#a9a9a9'>評論時間：{$msg_end['create_time']}</font></div>
                    <br>
                    <form action = 'remsg.php' method = 'POST'>
                    <input type= 'hidden' name= 'board_id' value='{$msg_end['boards_id']}'>
                    <input type= 'hidden' name= 'msg_id' value ='{$msg_end['id']}'>
                    <input type= 'hidden' name= 'remsg_user' value = $user>
                    <div>回覆評論：<input type= 'text' name= 'remsg'></div>
                    <div><input type='submit' name='submit' value='回覆'></div>
                    </form>
                    ";

            $remsgs_desc = "SELECT * FROM remsgs ORDER BY id DESC";
            $callremsgs = $conn->query($remsgs_desc);

            foreach ($callremsgs as $remsg_end){


                if($msg_end['id'] != $remsg_end['msg_id']){
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
                         <div style='border:3px #5CADAD ridge'><font size='1'>
                        <div><font size='1' color='#8b4513'>留言號：</font>{$remsg_end['boards_id']}</div>
                        <div><font size='1' color='#8b4513'>評論號：</font>{$remsg_end['msg_id']}</div>
                        <div><font size='2' color='#f08080'>回覆者：</font>{$remsg_end['remsg_user']}</div>
                        <div><font size='2' color='#f08000'>回覆內容：</font>{$remsg_end['remsg']}</div>
                       </div>"
                    ;



            }
            echo "</td>";
        }

    echo  "</tr>";

}


?>

</body>
</html>





