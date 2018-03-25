<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="css/Main.css">
    {{--<link rel="stylesheet" href="css/bootstrap_lumen.min.css">--}}
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="bower_components/dropzone/dist/basic.css">
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

<!-- Application Scripts -->
<script type="text/javascript" src="js/mainApp.js"></script>
<script type="text/javascript" src="js/controllers/homeController.js"></script>
<script type="text/javascript" src="js/controllers/authController.js"></script>
<script type="text/javascript" src="js/controllers/userController.js"></script>
<script type="text/javascript" src="js/controllers/navController.js"></script>
<script type="text/javascript" src="js/controllers/globalController.js"></script>
<script type="text/javascript" src="js/controllers/galleryController.js"></script>
<script type="text/javascript" src="js/controllers/cartController.js"></script>
<script type="text/javascript" src="js/models/userModel.js"></script>
<script type="text/javascript" src="js/models/productModel.js"></script>
<script type="text/javascript" src="js/models/galleryModel.js"></script>
<script type="text/javascript" src="js/models/cartModel.js"></script>
</body>
</html>
