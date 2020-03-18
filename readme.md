2.0 ORM 版的留言版，可留言、評論、回覆評論，按讚、收回讚

    
  
 
 ####  1. 設定要使用的 Database
      
      新增檔案 board/bootstrap.php.php ，寫入程式碼
    
       ```
       <?php
       
       require "../vendor/autoload.php";
       
       use Illuminate\Database\Capsule\Manager as Capsule;
       
       
       $capsule = new Capsule;
       
       
       $capsule->addConnection([
       
           "driver" => "mysql",
       
           "host" => "127.0.0.1",  // 要連線的 server 位址，已本機爲例
       
           "database" => "要使用的DB名稱", 
       
           "username" => "MySql 使用者名稱",
       
           "password" => "MySql 密碼"
       
       ]);
       
       $capsule->setAsGlobal();
       //$capsule->bootEloquent();
 
       
      ```  
        



    
 #### 2. 終端機（ Terminal ），下指令建立 5 張 table 
 
 建立五張 table（users、boards 、msgs、remsgs）到 Mysql 的 DB (資料庫) 裡
    
        cd board 
        php ormaddtable.php
        
       
       
#### 3. 使用者輸入姓名，點擊按鈕 

位置：index.php

![](https://i.imgur.com/ko3bFnI.png)



#### 4. 留言板，留言撰寫方式


採用 foreach 方式，迴圈到第三層，呈現留言下的回覆結果，使用 table 內的 boarads_id 及 msg_id 辨識要回覆的文章。

填寫留言方式
![](https://i.imgur.com/APRy3fj.png)

留言顯示方式
![](https://i.imgur.com/XmFxbJ7.png)


#### 5. 按讚，收回讚，查看讚者

按讚，收回讚，查看讚者

![](https://i.imgur.com/EEdJl6f.png)

查看目前讚者有誰

![](https://i.imgur.com/hIDJVk2.png)





