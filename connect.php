<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/22
 * Time: 下午4:24
 */
require_once ("config.php");
$mysqli=new mysqli(HOST,USERNAME,PASSWORD,'zyliang');
$mysqli->set_charset('utf8');
if($mysqli->connect_errno){
    die("CONNECT ERROR:".$mysqli->connect_error);
}