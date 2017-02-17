<?php
session_start();
require_once('connect.php');
$mysql="SELECT * FROM blog";
$res=$mysqli->query($mysql);
if($res && $res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $rows[]=$row;//定义成数组后面好操作
    }

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>博客后台管理</title>
    <link rel="stylesheet" href="sass/common.css">
    <link rel="stylesheet" href="sass/blogList.css">
</head>
<body>
<div class="wrap clearfix">
    <div class="blogTitle">
        <h1><a href="blogList.php">霾都码农</a></h1>
    </div>
    <!--左侧-->
    <div class="leftArea">
        <?php
            if(isset($_SESSION['psw'])){
            echo "<h4 ><a href='newBlog.php' style='color:#f00;'>新博客</a></h4>";
            }
            else{
                echo "<h4>管理员登陆：</h4>
        <form action=\"adminLogin.php\" method=\"post\">
            账号：<input type=\"text\" value=\"admin\">
            密码：<input type=\"password\" name=\"psw\" placeholder=\"不告诉你\"> <br>
            <input type=\"submit\" value=\"登陆\" style=\"margin:10px 70px;\">
        </form>";
            }
        ?>
        <h4>个人资料：</h4>
        <img src="images/clock.png" alt="此处为博主帅气的照片" width="180px">
        <p style="text-align: center">朱云亮</p>
        <!--再加上github，weibo，wechat图标-->
        <h4>搜索：</h4>
        <form action="blogSearch.php" method="get">
            <input type="text" name="key">
            <input type="submit" value="搜索">
        </form>
        <h4>博客分类</h4>
        <hr>
        <p><a href="">web前端(1)</a></p>
        <p><a href="">php(1)</a></p>
        <p><a href="">生活杂想(1)</a></p>
    </div>
    <!--右侧-->
    <div class="rightArea ">
        <?php foreach($rows as $row): ?>
            <div class="listBlog">
                <h3><a href="blogDetail.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h3>
                <p><?php echo $row['description'] ?></p>
                <span><?php echo  date("Y-m-d H:i:s", $row['dateline'])  ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>阅读(1)</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>评论(0)</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span><a onclick="return confirm('不再考虑一下？')" href="operation.php?act=del&id=<?php echo $row['id'] ?>" style="color:#f00;">删除</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span><a href="editBlog.php?id=<?php echo $row['id'] ?>" style="color:#f00;">编辑</a></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<footer>
    <p style="text-align: center;margin: 100px 0 50px 0;">Copyright ©2016 霾都码农</p>
</footer>
</body>
<script src="js/blogList.js"></script>
</html>
