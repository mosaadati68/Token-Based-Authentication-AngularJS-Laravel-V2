<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Angular-Laravel Authentication</title>
    {{--<link rel="stylesheet" href="bower_components\bootstrap\bootstrap.min.css">--}}
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script> var baseUrl = "{{url('/')}}/";</script>
</head>
<body ng-controller="globalController">
<div class="container">
    <div ng-view></div>
</div>

<!-- Application Dependencies -->
{{--<script type="text/javascript" src="bower_components/jquery/jquery.min.js"></script>--}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bower_components/angular/angular.js"></script>
<script type="text/javascript" src="bower_components/angular-animate/angular-animate.js"></script>
<script type="text/javascript" src="bower_components/angular-route/angular-route.js"></script>
<script type="text/javascript" src="bower_components/angular-cookies/angular-cookies.js"></script>
<script type="text/javascript" src="bower_components/satellizer/dist/satellizer.js"></script>

<!-- Application Scripts -->
{{--<script type="text/javascript" src="js/bootstrap.min.js"></script>--}}
<script type="text/javascript" src="js/mainApp.js"></script>
<script type="text/javascript" src="js/homeController.js"></script>
<script type="text/javascript" src="js/authController.js"></script>
<script type="text/javascript" src="js/userController.js"></script>
<script type="text/javascript" src="js/navController.js"></script>
<script type="text/javascript" src="js/globalController.js"></script>
<script type="text/javascript" src="js/userModel.js"></script>
</body>
</html>
