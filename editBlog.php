<?php
session_start();
require_once('connect.php');
$id=$_GET['id'];
$mysql="SELECT * FROM blog WHERE id=$id";
$res=$mysqli->query($mysql);
/*if($res && $res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $rows[]=$row;//定义成数组后面好操作
        print_r($row['title']);
    }

}*/
$row=$res->fetch_assoc();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>编辑博客</title>
    <link rel="stylesheet" href="sass/bootstrap.min.css">
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
        if(!isset($_SESSION['psw'])){
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
        <h2 style="text-align: center">编辑博客</h2><br><br>
        <form action="blogHandle.php?act=edit" method="post">

                <div class="row">
                    <label class="col-md-2">标题</label>
                    <input type="text" class="col-md-7" name="title" value="<?php echo $row['title'] ?>">
                </div>
                <div class="row">
                    <label class="col-md-2">作者</label>
                    <input type="text" class="col-md-1" name="author" value="<?php echo $row['author'] ?>">
                </div>
                <div class="row">
                    <label class="col-md-2">简介</label>
                    <textarea name="description" class="col-md-7" id="" cols="100" rows="5" ><?php echo $row['description'] ?></textarea>
                </div>
                <br>
                <div class="row">
                    <label class="col-md-2">正文</label>
                    <textarea name="content" class="col-md-7" id="" cols="100" rows="20" ><?php echo $row['content'] ?></textarea>
                </div>

            <br>
            <input type="hidden" name="dateline">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
           <div class="row">
               <input type="submit" class="col-md-2 col-md-offset-5 btn-success" value="发布">
           </div>
        </form>
    </div>
</div>
<footer>
    <p style="text-align: center;margin: 100px 0 50px 0;">Copyright ©2016 霾都码农</p>
</footer>
</body>
<script src="js/blogList.js"></script>
</html>
