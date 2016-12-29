<?php
$unlocked_page = true;
include realpath($_SERVER["DOCUMENT_ROOT"]).'/budgeter/resources/library/redirect.inc.php';
?>

<html>

<head>
    <title>Login | Budgeter</title>
    <!-- Include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Local style -->
    <link rel="stylesheet" href="css/forms.css">
    <!-- Local scripts -->
    <script type="text/javascript" src="js/submit_login_form.js"></script>
</head>

<body>
<?php include '../resources/templates/nav.inc.php' ?>
<div class="container">
    <h1 class="text-center">Login</h1>

    <form method="post" role="form" class="form-horizontal" id="form">
        <div class="form-group">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input name="username" id="username" type="text" maxlength="255"  class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input name="password" id="password" type="password" maxlength="255" class="form-control" placeholder="Password">
            </div>
        </div>
        <div id="warning" class="alert alert-danger" hidden>
            <p class="text-center" id="warning-message"></p>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-block" value="Login" id="login">
            </div>
        </div>
    </form>
    <a href="register.php"><p class="text-center">Not registered? Sign up here</p></a>
</div>
</body>

</html>