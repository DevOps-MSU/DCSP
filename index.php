<?php
require 'config.php';
$template = array(
    'title' => 'Home',
    'activeLink' => 'home',
    'header' => 'DCSP Example Website'
);
require 'templates/header.php';
?>
<?php if(isset($_SESSION['loggedIn'])) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Login successful!</strong> Welcome, <?php echo $user->getUsername(); ?>
    </div>
<?php
unset($_SESSION['loggedIn']);
} ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Bulldog Bytes</h1>
        <?php if(isset($_SESSION['loggedIn'])) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Login successful!</strong> Welcome, <?php echo $user->getUsername(); ?>
            </div><?php
            unset($_SESSION['loggedIn']);
            } ?>
        <p>Bulldog Bytes is a camp for middle school and high school students interested in computer science and engineering.</p>
        }?>
        <p><a class="btn btn-primary btn-lg" href="apply.php" role="button">Apply Today &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>About Page</h2>
            <p>Learn more about bulldog bytes. Recent news about the camp and changes to its operation can be found here.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Discussion Page</h2>
            <p>Post questions, read past posts, and get information and advice from other members here.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Profile Page</h2>
            <p>Make sure we have your correct information. Check and update your profile here.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

</div> <!-- /container -->

<?php require 'templates/footer.php'; ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
