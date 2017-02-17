<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/26
 * Time: 下午11:03
 */
session_start();
require_once('connect.php');
$act=$_GET['act'];
$id=$_GET['id'];
switch($act){
    case 'del':
       if(isset($_SESSION['psw'])){
           $sql="DELETE FROM blog WHERE id=$id";
           $mysqli->query($sql);
          header("Location:adminManger.php");
           break;
 //echo "<script>location.href='adminManger.php'</script>";
       }else{
           echo "<script>alert('你又不是管理员 👿');location.href='adminManger.php'</script>";

       }

}
