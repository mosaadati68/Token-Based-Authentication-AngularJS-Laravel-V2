<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Angular-Laravel Authentication</title>
    <!-- Angular Material style sheet -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">

    <link rel="stylesheet" href="css/Main.css">
    <link rel="stylesheet" href="css/material-steppers.css">
    {{--<link rel="stylesheet" href="css/bootstrap_lumen.min.css">--}}
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="bower_components/dropzone/dist/basic.css">
    {{--<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="bower_components/dropzone/dist/dropzone.css">
    <link rel="stylesheet" href="bower_components/angular-loading-bar/build/loading-bar.min.css">
    <link rel="stylesheet" href="bower_components/angular-bootstrap/ui-bootstrap-csp.css">
    <link rel="stylesheet" href="bower_components/angular-bootstrap-lightbox/dist/angular-bootstrap-lightbox.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        var baseUrl = "{{url('/')}}/";
        var csrfToken = "{{ csrf_token() }}";
    </script>
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

<script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
<script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="bower_components/angular-bootstrap-lightbox/dist/angular-bootstrap-lightbox.min.js"></script>
<script type="text/javascript" src="bower_components/angular-cookies/angular-cookies.js"></script>
<script type="text/javascript" src="bower_components/satellizer/dist/satellizer.js"></script>
<script type="text/javascript" src="bower_components/dropzone/dist/dropzone.js"></script>
<script type="text/javascript" src="bower_components/angular-loading-bar/build/loading-bar.min.js"></script>

<!-- Angular Material requires Angular.js Libraries -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-aria.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-messages.min.js"></script>

<!-- Angular Material Library -->
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.7/angular-material.js"></script>

<!-- Application Scripts -->
<script type="text/javascript" src="js/material-steppers.min.js"></script>
<script type="text/javascript" src="js/mainApp.js"></script>
<script type="text/javascript" src="js/controllers/homeController.js"></script>
<script type="text/javascript" src="js/controllers/authController.js"></script>
<script type="text/javascript" src="js/controllers/userController.js"></script>
<script type="text/javascript" src="js/controllers/navController.js"></script>
<script type="text/javascript" src="js/controllers/globalController.js"></script>
<script type="text/javascript" src="js/controllers/galleryController.js"></script>
<script type="text/javascript" src="js/controllers/cartController.js"></script>
<script type="text/javascript" src="js/controllers/materialController.js"></script>
<script type="text/javascript" src="js/models/userModel.js"></script>
<script type="text/javascript" src="js/models/productModel.js"></script>
<script type="text/javascript" src="js/models/galleryModel.js"></script>
<script type="text/javascript" src="js/models/cartModel.js"></script>
</body>
</html>