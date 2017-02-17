<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/22
 * Time: 下午4:52
 */
session_start();
require_once ("connect.php");
$act=$_GET['act'];
$title=$_POST['title'];
$author=$_POST['author'];
$description=$_POST['description'];
$content=$_POST['content'];
$dateline=time();
switch($act){
    case 'new':
        $sql="INSERT INTO blog(title,author,description,content,dateline) VALUES('$title','$author','$description','$content','$dateline')";
        $mysqli->query($sql);
        echo "<script>location.href='adminManger.php'</script>";
        break;
    case 'edit':
        $id=$_POST['id'];
        if(isset($_SESSION['psw'])){
            $sql="UPDATE blog SET title='$title',author='$author',description='$description',content='$content',dateline='$dateline' WHERE id='$id'";
            $mysqli->query($sql);
            header("Location:adminManger.php");
            break;
        }else{
            echo "<script>alert('哈哈，编辑不了我吧😎');location.href='adminManger.php'</script>";

        }



}
