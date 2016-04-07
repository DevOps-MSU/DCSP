<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $template['title']; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>
            $(function() {
                $('#nav-<?php echo $template['activeLink']; ?>').addClass('active');
                $('a').each(function() {
                    //$(this).attr('href', '/DCSP'+$(this).attr('href'));
                })
            });
        </script>
        <style type="text/css">
            /* Sticky footer styles
            -------------------------------------------------- */
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                background-color: #f5f5f5;
            }


            /* Custom page CSS
            -------------------------------------------------- */
            /* Not required for template or sticky footer method. */

            body > .container {
                padding: 10px 15px 0;
            }
            .container .text-muted {
                margin: 20px 0;
            }

            .footer > .container {
                padding-right: 15px;
                padding-left: 15px;
            }

            code {
                font-size: 80%;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#inverseNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="index.php">DCSP Example</a></div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="inverseNavbar1">
                    <ul class="nav navbar-nav">
                        <li id="nav-home"><a href="index.php">Home</a></li>
                        <li id="nav-threads"><a href="threads.php">All Threads</a></li>
                        <?php if(isset($user)) { ?>
                            <li id="nav-account"><a href="account.php">My Account</a></li>
                        <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!isset($user)) { ?>
                            <li id="nav-login"><a href="login.php">Login</a></li>
                            <li id="nav-register"><a href="register.php">Register</a></li>
                        <?php } else { ?>
                            <li><a href="logout.php">Log Out</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="page-header">
                <h1><?php echo $template['header']; ?></h1>
            </div>
