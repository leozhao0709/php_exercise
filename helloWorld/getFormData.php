<!DOCTYPE html>
<html>
  <head>
    <title></title>
	
    <meta name="keywords" content="keyword1,keyword2,keyword3">
    <meta name="description" content="this is my page">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
    <link rel="stylesheet" type="text/css" href="">
    <style type = "text/css"></style>
    <script type = "text/javascript"></script>

  </head>
  
  <body>
    <?php
      $a = $_POST['userName'];
      $b = $_POST['pwd'];

      echo "用户名为$a, 密码为$b";
    ?>
  </body>
</html>