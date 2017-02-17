<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/18
 * Time: 下午5:14
 */
session_start();
header("content-type:text/html;charset=utf8");

$mysqli=new mysqli('localhost','root','ROOT','zyliang');
$mysqli->set_charset('utf-8');
if($mysqli->connect_errno){
    die("CONNECT ERROR:".$mysqli->connect_error);
}
$act=$_GET['act'];
$user=$_POST['user'];
$password=md5($_POST['psw']);
switch($act){
    case 'reg':
        $sql="INSERT INTO personalWeb(user,psw) VALUES('$user','$password')";
//最外面双引号
        $mysqli->query($sql);
        echo "<script>
                    location.href='index.php';
                    
                    </script>";
        break;
    case 'login':
        $sql="SELECT * FROM personalWeb WHERE user='{$user}' and psw='{$password}'";
        $res=$mysqli->query($sql);
        if($row=$res->fetch_array()){
            $_SESSION['user']=$row['user'];
            echo "<script>
                    location.href='index.php';
                    
                    </script>";
        }else{
            echo '<script>alert("登录失败");  location.href="index.php";</script>';
        }
}
