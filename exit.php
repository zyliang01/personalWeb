<?php
/**
 * Created by PhpStorm.
 * User: zhuyunliang
 * Date: 2016/12/26
 * Time: 下午5:12
 */
session_start();
$user=$_SESSION['user'];
session_unset($user);
echo "<script>location.href='index.php'</script>";