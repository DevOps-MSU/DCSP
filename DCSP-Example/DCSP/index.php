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
<p class="lead">This is an example website.</p>
<p>
    This site allows the following:
    <ul>
        <li>Create Accounts</li>
        <li>Create Threads</li>
        <li>Post to Threads</li>
        <li>Delete Threads</li>
        <li>Export Threads to Excel</li>
        <li>Delete Accounts</li>
    </ul>
</p>
<p>
    <h2><b>This is a simple example. There are security vulnerabilities.</b></h2>
    <h4><b>While this site provides a lot of practical knowledge in regards to PHP, any real-world projects would need more attention (and would use a newer version of PHP)</b></h4>
</p>
<p>
    While there are several security features, not all vulnerabilities have been fixed. For more information on vulnerabilities for this site, feel free to contact me <a href="mailto:hbl20@msstate.edu">hbl20@msstate.edu</a>
</p>

<?php require 'templates/footer.php'; ?>