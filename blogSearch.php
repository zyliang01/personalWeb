<?php
require_once('connect.php');
$key=$_GET['key'];
$mysql="SELECT * FROM blog WHERE title LIKE '%$key%'";
$res=$mysqli->query($mysql);

if($res && $res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $rows[]=$row;//定义成数组后面好操作
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
    <style>
        .wrap{
            width:1200px;margin:50px auto;
        }
        li{list-style-type: none;}
    </style>
</head>
<body>
<div class="wrap">
    <ul>
    <?php foreach($rows as $row): ?>
   <div style="border:1px solid red;">
    <h2><a href="blogDetail.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
    <p><?php echo $row['description'] ?></p>
    </div>
    <?php endforeach; ?>
    </ul>
</div>
</body>
</html>