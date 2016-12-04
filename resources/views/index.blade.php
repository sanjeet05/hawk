<!DOCTYPE html>
<html lang="en" ng-app="starter">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>My Contact</title> -->
    <title ng-bind="$state.current.data.pageTitle"></title>

    <!-- Bootstrap -->
    <link href="client/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="client/css/style.css" rel="stylesheet">
    <link href="client/lib/intl-tel-input/build/css/intlTelInput.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="client/lib/jquery-3.1.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="client/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="client/lib/angular.min.js"></script>
    <script src="client/lib/angular-ui-router.min.js"></script>
    <script src="client/lib/ngStorage.min.js"></script>
    <script src="client/lib/satellizer.min.js"></script>

    <script src="client/lib/ui-bootstrap-2.0.1.js"></script>
    <script src="client/lib/angular-messages.min.js"></script>
    <script src="client/lib/showErrors.min.js"></script>

    <script src="client/js/app.js"></script>
    <script src="client/js/controllers/controllers.js"></script>
    <script src="client/js/controllers/LoginController.js"></script>
    <script src="client/js/controllers/AdminController.js"></script>
    <script src="client/js/controllers/ProfileCtrl.js"></script>

    <script src="client/lib/intl-tel-input/build/js/utils.js"></script>
    <script src="client/lib/intl-tel-input/build/js/intlTelInput.min.js"></script>

    <script src="client/lib/international-phone-number/releases/international-phone-number.min.js"></script>
    <script src="client/lib/ng-intl-tel-input/dist/ng-intl-tel-input.min.js"></script>


</head>

<body>

  <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container-fluid">


   <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"
         aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
     </button>
     <a ng-if="userRole == 'user' " class="navbar-brand glyphicon glyphicon-home" ui-sref="home"></a>
     <a ng-if="userRole == 'admin' " class="navbar-brand glyphicon glyphicon-home" ui-sref="adminHome"></a>
   </div>

   <div class="collapse navbar-collapse ">
       <div class="row nav navbar-right navbar-btn">
   <ul class="nav navbar-nav navbar-right">
     <li ng-if="authentication.isAuthenticated()" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown">
        <div class="pull-left"ng-bind="userName"></div>
        <span class="caret"></span>
    </a>
        <ul class="dropdown-menu">
          <li ng-if="userRole == 'user' " class="text-center"><a  ui-sref="editProfile">Edit Profile</a></li>
          <li class="text-center"><a  ui-sref="changePassword">Change Password</a></li>
          <li class="text-center"><a  href="#" ng-click="logout()">Logout</a></li>
        </ul>
      </li>
     <li ng-if="!authentication.isAuthenticated()"><a ui-sref="signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
     <li ng-if="!authentication.isAuthenticated()"><a ui-sref="login" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
   </ul>
 </div>
 </div>
 </div>
</nav>
    <!-- content -->
    <div class="container">
        <!-- THIS IS WHERE WE WILL INJECT OUR CONTENT -->
        <div ui-view></div>
    </div>
</body>

</html>
