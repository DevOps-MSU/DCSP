<?php
require 'config.php';

if(!isset($user)) {
    header('Location: login.php');
    die();
}

$template = array(
    'title' => 'My Account',
    'activeLink' => 'account',
    'header' => 'Account Settings'
);
require 'templates/header.php';
?>
    <div class="row">
        <div class="col-lg-1 col-md-1"></div>
        <div class="col-lg-3 col-md-3">
            <h3>Delete Thread</h3>
            <?php
            $threads = Thread::getAllThreads($user->getID());
            foreach($threads as $thread) { ?>
                <p>
                    <button thread-id="<?php echo $thread['id']; ?>" class="btn btn-danger delete-thread"><span class="glyphicon glyphicon-remove"></span> <b><?php echo $thread['title']; ?></b></button>
                </p>
            <?php } ?>
            <script type="text/javascript">
                $(function() {
                    $('button.delete-thread').on('click', function() {
                        $.ajax({
                            url: 'ajaxServer.php',
                            method: 'post',
                            data: {
                                command: 'deleteThread',
                                id: $(this).attr('thread-id')
                            }
                        }).done(function(data) {
                            window.location = 'account.php';
                        });
                    });
                });
            </script>
        </div>
        <div class="col-lg-1 col-md-1"></div>
        <div class="col-lg-4 col-md-4">
            <h3>Export My Threads</h3>
            <?php
            $threads = Thread::getAllThreads($user->getID());
            if (!empty($threads)) { ?>
            <button class="btn btn-success export-threads"><span class="glyphicon glyphicon-download"></span> <b>Excel</b></button>
            <?php } else { ?>
            You've started no threads
            <?php } ?>
            <script type="text/javascript">
                $(function() {
                    $('button.export-threads').on('click', function() {
                        window.location = 'ajaxServer.php?command=exportThreads';
                    });
                });
            </script>
        </div>
        <div class="col-lg-1 col-md-1"></div>
        <div class="col-lg-2 col-md-2">
            <h3>Delete Account</h3>
            <button class="btn btn-danger delete-account"><span class="glyphicon glyphicon-remove"></span> <b><?php echo $user->getUsername(); ?></b></button>
            <script type="text/javascript">
                $(function() {
                    $('button.delete-account').on('click', function() {
                        $.ajax({
                            url: 'ajaxServer.php',
                            method: 'post',
                            data: {
                                command: 'deleteAccount'
                            }
                        }).done(function(data) {
                            window.location = 'logout.php';
                        });
                    });
                });
            </script>
        </div>
    </div>

<?php require 'templates/footer.php'; ?>