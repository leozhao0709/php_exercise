<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>瑞曼-留言本</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="../style/skin.css" />
<script type="text/javascript">
    function logout() {
        window.confirm('您确定要退出吗?');
        window.location.href = './login.html';
    }
</script>

<style type="text/css">

</style>
</head>
    <body>
        <div id="body">
            <h3>RainMan-留言本 后台管理</h3>
            <div id="nav">
                <ul>
                    <li><a href="index.php">管理首页</a></li>
                    <li><a href="mes_manage.php">留言管理</a></li>
                    <li><a href="mes_config.html">参数设置</a></li>
                    <li><a href="mes_admin.html">账号管理</a></li>
                    <li><a href="../index.php">前台首页</a></li>
                    <li><a href="javascript:void();" onclick="logout();">退出管理</a></li>
                </ul>
            </div>

            <?php
                $id = $_GET['id']; 
                require("../conn.php");
                $sql = "select * from liuyanbiao where id = $id";
                $result = mysql_query($sql);

                $oneline = mysql_fetch_array($result);

             ?>

            <div id="cont" style="padding-bottom:10px;">

                <div class="mes" style="padding-bottom:0px;">
                    <div id="lev" style="display:block;border:none;">
                        <form action="xiugailiuyan.php" method="POST" style="margin:15px;">
                            昵称：<input type="text" value="<?php echo $oneline['xingming']; ?>" name= "xingming"/><br />
                            标题：<input type="text" value="<?php echo $oneline['biaoti']; ?>" name= "biaoti"/><br />
                            内容：<br />
                            <textarea name= "neirong"><?php echo $oneline['neirong']; ?></textarea><br />
                            <?php 
                                
                             ?>
                            <input type = "hidden" name = 'id' value = "<?php echo "$id"; ?>">
                            <input class="c1" type="submit" value="提交" />
							<input class="c1" type="reset" value="重填" />
                        </form>
                    </div>
                </div>


            </div>
            <div id="foot">
                <p>RainMan-留言本 e-mail:zyc521008@sina.com</p>
                <p>Powered by 瑞曼留言本 V1.0 瑞曼科技 www.rain-man.cn</p>
            </div>
        </div>
    </body>
</html>