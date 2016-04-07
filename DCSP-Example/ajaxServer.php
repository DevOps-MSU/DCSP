<?php
// Handle ajax requests

// If command is not set, stop execution
if(!isset($_REQUEST['command'])) {
    echo "command not set";
    die();
}

require 'config.php';

// User must be logged in to use ajaxServer
if(!isset($user)) {
    header('HTTP/1.1 401 Unauthorized');
    die();
}

// Do action based off of command
switch($_REQUEST['command']) {
    // Delete a thread
    case 'deleteThread':
        if(!isset($_POST['id']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
            header('Location: account.php');
            die();
        }
        Thread::delete($_POST['id'], $user->getID());
        break;
    // Export threads of a user (and comments) to an excel file
    case 'exportThreads':
        // PHPExcel is a 3rd party tool
        require 'classes/PHPExcel.php';

        // New PHPExcel workbook
        $excel = new PHPExcel();

        // Delete the default worksheet
        $excel->removeSheetByIndex(0);

        // Get all Threads
        foreach(Thread::getAllThreads($user->getID()) as $thread) {
            $sheet = new PHPExcel_Worksheet($excel, $thread['title']);
            $excel->addSheet($sheet);

            $thread = new Thread($thread['id']);

            $excel->setActiveSheetIndexByName($thread->getTitle());
            $sheet = $excel->getActiveSheet();

            $sheet->setCellValue('A1', 'Thread Creation Date:');
            $sheet->setCellValue('B1', $thread->getTimestamp());

            $sheet->setCellValue('A2', 'Number of Posts:');
            $sheet->setCellValue('B2', count($thread->getPosts()));

            $sheet->setCellValue('A4', 'Poster');
            $sheet->setCellValue('B4', 'Timestamp');
            $sheet->setCellValue('C4', 'Post');

            $row = 5;

            // Get all posts for this thread
            foreach($thread->getPosts() as $post) {
                $sheet->setCellValue('A'.$row, $post->getPoster());
                $sheet->setCellValue('B'.$row, $post->getTimestamp());
                $sheet->setCellValue('C'.$row, $post->getContent());
                $row++;
            }
        }

        // Set active sheet to first sheet (first thread) when a user opens Excel
        $excel->setActiveSheetIndex(0);
        $objWriter = new PHPExcel_Writer_Excel2007($excel);

        // By default, PHPExcel can only save files to disk. This tells the function to save to PHP Output.
        // The output is captured and then sent to the user so they can download it in their browser
        ob_start();
        $objWriter->save('php://output');
        $excelOutput = ob_get_clean();

        // Tell browser we are sending a spreadsheet
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $user->getUsername() . '.xlsx"');

        // Echo out the actual data
        echo $excelOutput;

        break;
    // Delete a user's account
    case 'deleteAccount':
        $user->delete();
        break;
    // Create a post on a thread
    case 'post':
        if(!isset($_POST['post'], $_POST['id']) || empty($_POST['post']) || empty($_POST['id'])) {
            header("Location: thread.php?id=".$_POST['id']);
            die();
        }

        try {
            $user = Post::post($user->getID(), $_POST['id'], $_POST['post']);
        } catch (Exception $e) {
            header("Location: thread.php?id={$_POST['id']}&" . $e->getMessage());
            die();
        }

        header("Location: thread.php?id={$_POST['id']}");
        break;
    default:
        echo 'command not recognized';
}