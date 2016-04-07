<?php
require 'config.php';
$template = array(
    'title' => 'Register',
    'activeLink' => 'register',
    'header' => 'Register'
);
require 'templates/header.php';
?>

    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">
            <?php if(isset($_GET['specialChars'])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> Username may only contain alpha-numeric characters
                </div>
            <?php } ?>
            <?php if(isset($_GET['usernameTaken'])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> Username has been taken
                </div>
            <?php } ?>
            <form action="createAccount.php" method="POST" class="form">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="username" id="username" />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" />
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password:</label>
                    <input class="form-control" type="password" id="confirm-password" />
                </div>
                <button type="button" class="btn btn-default">Register</button>
            </form>
        </div>
        <div class="col-lg-3 col-md-3"></div>
    </div>

<script type="text/javascript">
    $(function() {
       $('form > button').on('click', function(event) {
           event.preventDefault();

           if($('#password').val() == $('#confirm-password').val()) {
               $('form').submit();
           } else {
               alert('Passwords do not match');
           }
       })
    });
</script>

<?php require 'templates/footer.php'; ?>