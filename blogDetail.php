<?php
    require_once ("connect.php");
    $id=$_GET['id'];
    $sql="SELECT * FROM blog WHERE id=".$id;  //博客文章id
    $res=$mysqli->query($sql);
    if($res && $res->num_rows>0){
       $arr=$res->fetch_assoc();
    }

    $sql1="SELECT * FROM comment WHERE bid=$id ORDER BY cid DESC";//评论列表，cid评论自增主键，bid为博客对应的id
    $res1=$mysqli->query($sql1);
    if($res1 && $res1->num_rows){
        while($arr1=$res1->fetch_assoc()){
            $arr2[]=$arr1;
        }

    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <h4>管理员登陆：</h4>
        <form action="adminLogin.php" method="post">
            账号：<input type="text" value="admin"><br>
            密码：<input type="password" name="psw" placeholder="不告诉你"> <br>
            <input type="submit" value="登陆" style="margin:10px 70px;">
        </form>
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
        <h2 style="text-align: center;color:#6B6451;"><?php echo $arr['title'] ?></h2><br/>
        <span style="text-align: center;">作者： <?php echo $arr['author'] ?></span><br/><br>
        <p id="content"><?php
            $arr1=explode("\n",$arr['content']);
            $str1=nl2br($arr['content']);//回车换成换行默认函数
            echo $str1;?>
        </p><br><br>
        <!--评论区域-->

            <div class="row">
                <h3 class="col-md-2">评论：</h3>
            </div>
        <br>
        <form action="comment.php?bid=<?php echo $arr['id'] ?>" method="post">
                <div class="row">
                    <textarea name="comment" id="comment" class="col-sm-10 col-sm-offset-1" rows="4"></textarea>
                </div> <br>
                <div class="row">
                    <input type="hidden" name="cid">
                    <input type="hidden" name="time">
                    <input type="text" name="user" class="col-md-2 col-md-offset-1 " id="comUser" placeholder="请输入名字">
                    <input type="submit" value="评论" onclick="return check()" class="col-md-1 col-md-offset-7 btn-success">
                </div>
        </form>
        <br><br>
        <div class="row">
            <h4 class="col-md-2">评论列表：</h4>
        </div>
        <br>
        <?php foreach($arr2 as $arr1): ?>
            <div style="margin-top:20px;">
                <div class="row">
                    <p class="col-sm-2 col-sm-offset-1" style="font-weight: bold;"><?php echo $arr1['user'] ?></p>
                    <p class="col-sm-2 col-sm-offset-7"><?php echo date("m-d H:i:s", $arr1['time']) ?></p>
                </div>
                <div class="row" style="margin-top:10px;">
                    <p class="col-sm-10 col-sm-offset-1"><?php echo $arr1['comment'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<footer>
    <p style="text-align: center;margin: 100px 0 50px 0;">Copyright ©2016 霾都码农</p>
</footer>
</body>
<script src="js/editBlog.js"></script>
</html>