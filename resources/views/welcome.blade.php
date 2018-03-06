<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="bower_components\bootstrap\bootstrap.min.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <script> var baseUrl = "{{url('/')}}/";</script>
</head>
<body>
    <div class="container" ng-controller="globalController">
        <div ng-view></div>
    </div>

    <!-- Application Dependencies -->
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-animate/angular-animate.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="bower_components/angular-cookies/angular-cookies.js"></script>
    <script src="bower_components/satellizer/dist/satellizer.js"></script>

    <!-- Application Scripts -->
    <script src="js/mainApp.js"></script>
    <script src="js/homeController.js"></script>
    <script src="js/authController.js"></script>
    <script src="js/userController.js"></script>
    <script src="js/navController.js"></script>
    <script src="js/globalController.js"></script>
    <script src="js/userModel.js"></script>
</body>
</html>
