<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/26
 * Time: 下午11:27
 */
session_start();
require_once ("connect.php");
echo "<meta charset=\"UTF-8\">";
$psw=$_POST['psw'];
if($psw=='bugaosuni'){
    $_SESSION['psw']=$psw;
    echo "<script>alert('靠，这你都猜出来了');location.href='adminManger.php'</script>";
}else{
    echo "<script>alert('密码错误! 小样,猜不出来吧');location.href='blogList.php'</script>";
}