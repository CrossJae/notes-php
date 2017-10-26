<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php混合html 初级</title>
  </head>
  <body>
    <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php
        if(isset($_POST['submitBtn'])){ // 点击submit后才执行，确保跟submit的name保持一致
          // 连接服务器
          $dbc = mysqli_connect('localhost','root','xxx','elvis_store')
            or die('error connecting');
          // 创建查询操作命令
          $query = "select * from email_list";
          // 查询
          $result = mysqli_query($dbc, $query)
            or die('error query');

          // echo $result; // 无法打印

          // 是一种遍历？？？
          while( $row = mysqli_fetch_array($result)){
            echo $row['first_name'] . "<br />";
          }

          // 关闭数据库
          mysqli_close($dbc);
        }
      ?>
      <input type="submit" name="submitBtn" value="ok" />
    </form>
  </body>
</html>
