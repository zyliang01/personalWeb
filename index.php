<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zyliang</title>
    <link rel="stylesheet" href="sass/index.css">
    <link rel="stylesheet" href="sass/bootstrap.min.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="bg"></div>
<div class="theme"><img src="images/theme.png" alt=""></div>
<header>
    <ul id="nav-l">
        <?php
            session_start();
            if(isset($_SESSION['user'])){
                echo "<li class='welcome'>您好,<span id=\"loginName\">".$_SESSION['user']."</span>&nbsp;&nbsp;&nbsp;<a href=\"exit.php\">退出</a></li>";
            }else{
                echo "<li id=\"login\"><a >亲，请登陆</a></li>
                    <li id=\"reg\"><a>| 注册</a></li>";
            }
        ?>
    </ul>
    <ul id="nav-r">
               <li><a href="blogList.php">碎言碎语</a></li>
               <li><a href="my2048.html">|  休闲游戏</a></li>
               <li><a href="mall.php">|  飞猪商城</a></li>

    </ul>
</header>
<!--登陆注册块-->
<div class="container loginReg" style="width:390px;background: #fff; display:none;">
    <div class="close"></div>
    <div class="login_header">
        <span><a id="login_change" class="common_color" >快速登陆</a></span>
        <span><a  id="reg_change" class="common_color" >快速注册</a></span>
        <div class="switch_bottom"></div>
    </div>
    <!--login表单-->
    <div class="login_form">
        <form action="member.php?act=login" method="post">
            <div class="row">
                <label class="col-sm-3">用户名:</label><span class="login_user_tip"></span>
            </div>
            <div class="row">
                <input class="col-sm-8 col-sm-offset-2 login_user" placeholder="请输入手机号" type="text" name="user">
            </div>
            <div class="row">
                <label class="col-sm-3">密 码：</label><span class="login_psw_tip"></span>
            </div>
            <div class="row">
                <input class="col-sm-8 col-sm-offset-2 login_psw" placeholder="请输入密码" type="password" name="psw">
            </div>
            <div class="row submit">
                <input class="btn-info col-sm-4 col-sm-offset-4" type="submit" value="登陆" onclick="return loginCheck()" style="padding:3px 10px;">
            </div>
        </form>
    </div>
    <!--reg 表单-->
    <div class="reg_form" style="display:none;">
        <form action="member.php?act=reg" method="post">
            <div class="row">
                <label class="col-sm-3">用户名:</label><span class="reg_user_tip"></span>
            </div>
            <div class="row">
                <input class="col-sm-10 col-sm-offset-1 reg_user" type="text" placeholder="请输入手机号" name="user">
            </div>
            <div class="row">
                <label class="col-sm-3">密 码:</label><span class="reg_psw_tip"></span>
            </div>
            <div class="row">
                <input class="col-sm-10 col-sm-offset-1 reg_psw" type="password" placeholder="请输入6至16位字母加数字密码" name="psw">
            </div>
            <div class="row">
                <label class="col-sm-3">确认密码:</label><span class="reg_rpsw_tip"></span>
            </div>
            <div class="row">
                <input class="col-sm-10 col-sm-offset-1 reg_rpsw" type="password" placeholder="请确认密码一致" name="rpsw">
            </div>
            <div class="row">
                <label class="col-sm-3">验证码:</label> <span id="valid_failed"></span>
            </div>
            <div class="row">
                <input id="user_input_code" class="col-sm-4 col-sm-offset-1" type="text" name="code" placeholder="请输入验证码"/>
                <input type="text" class="col-sm-3 col-sm-offset-3 code" readonly="readonly" id="checkCode" />
            </div>
            <div class="row submit">
                <input class="btn-info col-sm-4 col-sm-offset-4" type="submit" onclick="return regCheck()" value="注册" style="padding:3px 10px;">
            </div>
        </form>
    </div>
</div>
</body>
</html>
