<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/28
 * Time: 下午11:15
 */
session_start();
require_once ('connect.php');
$comment=$_POST['comment'];
$user=$_POST['user'];
$time=time();
$cid=$_POST['cid'];
$bid=$_GET['bid'];
$sql="INSERT INTO comment(comment,user,time,cid,bid) VALUES ('$comment','$user','$time','$cid','$bid')";
$mysqli->query($sql);
header("location:blogDetail.php?id=$bid");