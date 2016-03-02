<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>瑞曼-留言本</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="./style/skin.css">
<script type="text/javascript">
    function lev() {
        var lev_mes = document.getElementById('lev');
        lev_mes.style.display = 'block';
        location.href = '#form';
    }
</script>

<style type="text/css">
    
  li  a.now {
        color: red;
        font-weight: bolder;
    }

    .msg{
        margin: 10px auto;
        border: solid 1px red;
        /*background-color: #ffcc99;*/
        background-color: #ffcc99;
        text-align: center;
        color: red;
        padding: 5px;
    }

</style>
</head>
    <body>
        <div id="body">
            <h3>RainMan-留言本</h3>
            <div id="nav">
                <ul>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="javascript:void(0)"onclick="lev();">发表留言</a></li>
                    <li><a href="./admin/index.php">留言管理</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
            </div>

            

            <div id="cont">

                <?php
                    if (isset($_GET['msg'])) {
                ?>

                <div class = "msg">
                    <?php
                        echo $_GET['msg'];
                    ?>
                </div>

            <?php 
                }
            require("conn.php");
            // $sql = "select * from liuyanbiao order by id desc;";

            $pageSize = 3;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            
            $startRow = $pageSize * ($page - 1);

            $sql = "select * from liuyanbiao order by id desc limit $startRow, $pageSize";

            $result = mysql_query($sql);

            $len = mysql_num_rows($result);

            for ($i=0; $i < $len ; $i++) { 
                $oneline = mysql_fetch_array($result);
            ?>
                <!-- 留言区域开始 -->
                <div class="mes">
                    <div class="title">
                        <ul>
                            <li>序号：<?php echo $oneline['id']; ?> </li>
                            <li>时间：<?php echo $oneline['fabushijian']; ?> </li>
                            <li>姓名： <?php echo $oneline['xingming']; ?> </li>
                            <li>标题： <?php echo $oneline['biaoti']; ?> </li>
                        </ul>
                    </div>
                    <div class="txt">
                        <span>内容：</span><p><?php 
                        $neirong = $oneline['neirong'];
                        // $neirong = str_replace("<", '&lt', $neirong);
                        // $neirong = str_replace(">", '&gt', $neirong);
                        $neirong = htmlspecialchars($neirong);
                        // $neirong = str_replace("\n", "<br/>", $neirong);
                        $neirong = nl2br($neirong);
                        echo  $neirong;
                        ?></p>
                    </div>
                    <?php 
                        if ($oneline['huifu']) {
                     ?>
                    <div class="rep">
                        <span style="font-weight:bold">管理员回复：</span><p><?php echo $oneline['huifu']; ?></p>
                    </div>
                    <?php 
                        }
                     ?>
                </div>
                <!-- 留言区域止 -->

            <?php
                } 
             ?>



                <div id="page">
                    <span><a href="index.php">首页</a></span>
                    <ul>
                        <?php if ($page != 1) {
                        ?>
                        <li><a href="index.php?page= <?php echo $page-1; ?>">上一页</a></li>
                        <?php } else {
                        ?>
                        <li>上一页</li>
                        <?php 
                        }  
                            $sql = "select * from liuyanbiao";
                            $result = mysql_query($sql);
                            $len = mysql_num_rows($result);

                            $totalPages = ceil($len/$pageSize);
                            for ($p=1; $p <= $totalPages; $p++) {
                                if ($p == $page) {
                                    ?>
                                    <li><a class = "now" href="index.php?page= <?php echo $p; ?>"><?php echo "$p"; ?></a></li>
                                    <?php
                                 } else {
                            
                        ?>
                        <li><a href="index.php?page= <?php echo $p; ?>"><?php echo "$p"; ?></a></li>
                        <?php 
                                }
                            } 
                        if ($page != $totalPages) {
                        ?>
                        <li><a href="index.php?page= <?php echo $page+1; ?>">下一页</a></li>
                        <?php 
                            } 
                            else {
                        ?>
                        <li>下一页</li>
                        <?php } ?>
                        <li><a href = "index.php?page=<?php echo $totalPages; ?>">末页</a></li>
                        <li>总共有:<?php echo "$totalPages" ?>页</li>
                        <li>当前是第:<?php echo "$page"; ?>页</li>
                    </ul>
                </div>


                <a name="form">
                <div id="lev" style="display:block;">
                    <form action="insertLiuyan.php" method="POST">
                        昵称：<input type="text" value="" name = "n1"/><br />
                        标题：<input type="text" value="" name = "n2"/><br />
                        内容：(囧,-_-||不能写作文哦)<br />
                        <textarea name = "n3"></textarea><br />
                        
						<input class="c1" type="submit" value="提交" />
						
						<input class="c1" type="reset" value="重填" />
                    </form>
                </div>
            </div>
            <div id="foot">
                <p>RainMan-留言本 e-mail:zyc521008@sina.com</p>
                <p>Powered by 瑞曼留言本 V1.0 瑞曼科技 www.rain-man.cn</p>
            </div>
        </div>
    </body>
</html>