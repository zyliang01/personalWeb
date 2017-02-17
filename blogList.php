<?php
    session_start();
    require_once('connect.php');
    $mysql="SELECT * FROM blog ORDER BY id DESC";
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
    <title>博客列表</title>
    <link rel="stylesheet" href="sass/common.css">
    <link rel="stylesheet" href="sass/blogList.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/blogList.js"></script>
</head>
<body>
<div class="wrap clearfix">
    <div class="blogTitle">
        <h1><a href="blogList.php">霾都码农</a></h1>
    </div>
    <!--左侧-->
    <div class="leftArea">
        <div>
            <canvas id="canvas" width="180" height="180"></canvas>
        </div>
        <h4>管理员登陆：</h4>
        <form action="adminLogin.php" method="post">
            账号：<input type="text" value="admin"><br>
            密码：<input type="password" name="psw" placeholder="不告诉你"> <br>
            <input type="submit" value="登陆" style="margin:10px 70px;">
        </form>
        <h4>个人资料：</h4>
        <img src="images/clock.png" alt="此处为博主帅气的照片" width="180px">
        <p style="text-align: center">朱云亮</p>
        <div class="icons">
            <img class="wechatIcon" src="images/wechat.png" alt="">
            <a href="https://github.com/zyliang01"><img src="images/github.png" class="github" alt=""></a>
            <a href="http://www.cnblogs.com/zyliang/"> <img src="images/blog.png" class="blog" alt=""></a>
        </div>
        <div class="qrcode"><img src="images/erweima.jpeg" width="160px" alt=""></div>
        <h4>搜索：</h4>
        <form action="blogSearch.php" method="get">
            <input type="text" name="key">
            <input type="submit" value="搜索">
        </form>
    </div>
    <!--右侧-->
    <div class="rightArea ">
        <?php foreach($rows as $row): ?>
        <div class="listBlog">
            <h3><a href="blogDetail.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h3>
            <p><?php echo $row['description'] ?></p>
            <span><?php echo  date("Y-m-d H:i:s", $row['dateline'])  ?></span>        </div>
        <?php endforeach; ?>
    </div>
</div>
<footer>
    <p style="text-align: center;margin: 100px 0 50px 0;">Copyright ©2016 霾都码农</p>
</footer>
</body>

</html>
