<?php
require 'config.php';
$template = array(
    'title' => 'Threads',
    'activeLink' => 'threads',
    'header' => 'All Threads'
);
require 'templates/header.php';
?>
    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">
            <?php if(isset($user)) { ?>
            <button id="newThread" class="btn btn-success" href="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Start New Thread</button>
            <hr />
            <?php } ?>
            <div class="list-group">
                <?php
                $threadData = Thread::getAllThreads();
                foreach($threadData['threads'] as $thread) { ?>
                    <a href="thread.php?id=<?php echo $thread['id']; ?>" class="list-group-item">
                        <span class="badge"><?php echo (isset($threadData['postCount'][$thread['id']]) ? $threadData['postCount'][$thread['id']] : 0); ?></span>
                        <b><?php echo $thread['title']; ?></b> (Started by <?php echo $thread['username']; ?>)
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-3"></div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Thread</h4>
                </div>
                <div class="modal-body">
                    <input class="form-control" id="newThreadTitle" type="text" placeholder="Thread Title"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button id="createThread" type="button" class="btn btn-primary">Create Thread</button>

                    <script type="application/javascript">
                        $(function() {
                            $('#createThread').on('click', function() {
                                $.ajax({
                                    method: "POST",
                                    url: "createThread.php",
                                    dataType: 'json',
                                    data: {
                                        title: $('#newThreadTitle').val()
                                    }
                                }).done(function(rtn) {
                                    if(rtn.success) {
                                        window.location = 'thread.php?id='+rtn.id;
                                    } else {
                                        alert("There was an error creating your thread:\n\n"+rtn.msg);
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php require 'templates/footer.php'; ?>