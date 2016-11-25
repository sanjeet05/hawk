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

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand text-uppercase" ui-sref="home">
            Hawk
          </a>
            </div>

            <!-- /.nevbar header -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <div class="nav navbar-right navbar-btn">
                    <a ui-sref="login" class="btn btn-default" ng-show="!authentication.isAuthenticated()">
                        Login
                    </a>
                    <a  class="btn btn-default" ng-click="logout()" ng-show="authentication.isAuthenticated()">
                        Logout
                    </a>
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
