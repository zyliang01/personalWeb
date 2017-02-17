<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="sass/bootstrap.min.css">
    <link rel="stylesheet" href="sass/common.css">
    <link rel="stylesheet" href="sass/mallCommon.css">
    <link rel="stylesheet" href="sass/mall.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/mall.js"></script>
</head>
<body ng-app="myApp" ng-controller="myCtrl">
<header ng-include="header"></header>
<div class="wrap">
    <div class="logo">
        <img src="images/logo.png" width="140px" alt="飞猪商城">
    </div>
    <!--<div class="logoZh"><span>飞猪商城</span></div>
    <div class="logoEn"><span>&nbsp;&nbsp;Fly Pig</span></div>-->
    <div class="col-md-6 col-md-offset-3" >
        <form action="" method="get">
            <input type="text" name="searchText" placeholder="">
            <input type="submit" value="搜索">
        </form>
    </div>
</div>
</body>
<script>
    var app=angular.module("myApp",[]);
    app.controller("myCtrl",function($scope){
       $scope.header="header.php";
    })
</script>
</html>