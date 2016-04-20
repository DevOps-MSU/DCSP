<?php
require 'connect.php';

/* // Force HTTPS
if(empty($_SERVER['HTTPS'])) {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
    die();
}*/

$template = array(
    'title' => 'Login',
    'activeLink' => 'login',
    'header' => 'Login'
);
require 'templates/header.php';
?>

<div class="row">
    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-6 col-md-6">
        <?php if(isset($_GET['invalidUsername'])) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Username does not exist
            </div>
        <?php } ?>
        <?php if(isset($_GET['invalidPassword'])) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Invalid password
            </div>
        <?php } ?>
        <?php if(isset($_GET['registerSuccess'])) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Account created
            </div>
        <?php } ?>
        <form action="validate.php" method="POST" class="form-inline">
            <div class="form-group">
                <label class="sr-only" for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" />
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
            </div>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
    <div class="col-lg-3 col-md-3"></div>
</div>

<?php require 'templates/footer.php'; ?>
