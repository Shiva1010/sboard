### 主要會用到的檔案

* git clone 會拿到的：
    - user.php
    - addtable.php
    - board.php
    - newboard.php 
    - msg.php 
    - remsg.php

* 要自己新增的：
    - conn.php
  
 
 ####  1. 設定要使用的 Database
      
      新增檔案 conn.php ，寫入程式碼
    
       ```
        <?php
        $server = "127.0.0.1";     // 要連線的 server 位址，已本機爲例
        $user = " MySql 使用者名稱";
        $password = "MySql 密碼";
        $db = " 要使用的DB名稱 ";    // 如果沒有，要自己先到MySql建立一個

        try {   
        
         $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);
         
        } catch (PDOException $e) {

            die($e->getMessage());

        }
      ```  
        



    
 #### 2. 終端機（ Terminal ），下指令建立三張 table 
 
 一鍵建立三張 table（board 、msg、remsg）到 Mysql 的 DB (資料庫) 裡
    
        
        php addtable.php
        
       
       
#### 3. 使用者輸入姓名，點擊按鈕 

位置：index.php

![](https://i.imgur.com/ko3bFnI.png)

程式碼解說

使用者因爲暫時先不要將名字存入資料庫，所以點擊〔開始留言〕時，會用的 session 方式把狀態存在Server 端，靠一個SessionID 來辨識，但並未寫入到資料庫


```html
<html>
<body>

<form action = "board.php" method="post">
    <div style="text-align: center">
    <font size='26' color='#055d88b' family='-apple-system'>君の名は</font><br><br>
    <input size='24' type ="text" name="user" /><br><br>
    <input type="submit" value="開始留言" onclick="board.php">
    </div>
</form>


</body>
</html>
```

#### 4. 留言板，留言撰寫方式

位置：board.php

採用 foreach 方式，迴圈到第三層，呈現留言下的回覆結果，使用 table 內的 boarads_id 及 msg_id 辨識要回覆的文章。

填寫留言方式
![](https://i.imgur.com/APRy3fj.png)

留言顯示方式
![](https://i.imgur.com/XmFxbJ7.png)







