<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Thank you!</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php

require 'connect.php';
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    // variables
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST["email"];
    $address = $_POST["street_address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip_code"];
    $age = $_POST["age"];
    $dob =  $_POST["dob"];
    $race = $_POST["ethnicity"];
    $gender = $_POST["gender"];
    $shirtsize = $_POST["shirt_size"];
    $grade = $_POST["grade_level"];
    $gpa = $_POST["gpa"];
    $pfname = $_POST["pfirst_name"];
    $plname = $_POST["plast_name"];
    $pemail = $_POST["pemail"];
    $homephone = $_POST["home_phone"];
    $altphone = $_POST["alternate_phone"];
    $ename = $_POST["emergency_name"];
    $ephone = $_POST["emergency_phone"];
    $schoolname = $_POST["school_name"];
    $schoolcity = $_POST["school_city"];
    $schoolstate = $_POST["school_state"];
    $schoolzip = $_POST["school_zip_code"];
    $essay = $_POST["student_essay"];

    $sql1 = $conn->prepare('INSERT INTO Students (first_name, last_name, email, street_address, city,
    sstate, zip_code, age, dob, ethnicity, gender, shirt_size, grade_level, gpa)
    VALUES (:firstname, :lastname, :email, :address, :city, :state, :zip, :age, :dob,
      :race, :gender, :shirtsize, :grade, :gpa)');
    $sql1->bindParam(':firstname', $firstname);
    $sql1->bindParam(':lastname', $lastname);
    $sql1->bindParam(':email', $email);
    $sql1->bindParam(':address', $address);
    $sql1->bindParam(':city', $city);
    $sql1->bindParam(':state', $state);
    $sql1->bindParam(':zip', $zip);
    $sql1->bindParam(':age', $age);
    $sql1->bindParam(':dob', $dob);
    $sql1->bindParam(':race', $race);
    $sql1->bindParam(':gender', $gender);
    $sql1->bindParam(':shirtsize', $shirtsize);
    $sql1->bindParam(':grade', $grade);
    $sql1->bindParam(':gpa', $gpa);
    $sql1->execute();

    $sidsql = 'SELECT MAX(student_ID) AS s_id FROM Students';
    $studentid = $conn->prepare($sidsql);
    $studentid->execute();
    $test = $studentid->fetch(PDO::FETCH_ASSOC);
    $sid = $test[s_id];

    $sql2 = $conn->prepare('INSERT INTO Parents (student_ID, first_name, last_name, email, home_phone, alternate_phone,
    emergency_name, emergency_phone) VALUES (:studentid, :pfname, :plname, :pemail, :homephone, :altphone, :ename, :ephone)');
    $sql2->bindParam(':studentid', $sid);
    $sql2->bindParam(':pfname', $pfname);
    $sql2->bindParam(':plname', $plname);
    $sql2->bindParam(':pemail', $pemail);
    $sql2->bindParam(':homephone', $homephone);
    $sql2->bindParam(':altphone', $altphone);
    $sql2->bindParam(':ename', $ename);
    $sql2->bindParam(':ephone', $ephone);
    $sql2->execute();

    $sql3 = $conn->prepare('INSERT INTO Schools (school_name, city, sstate, zip_code) VALUES (:schoolname,
    :schoolcity, :schoolstate, :schoolzip)');
    $sql3->bindParam(':schoolname', $schoolname);
    $sql3->bindParam(':schoolcity', $schoolcity);
    $sql3->bindParam(':schoolstate', $schoolstate);
    $sql3->bindParam(':schoolzip', $schoolzip);
    $sql3->execute();

    $sql4 = $conn->prepare('INSERT INTO Essay (student_ID, student_essay) VALUES (:studentid, :essay)');
    $sql4->bindParam(':studentid',$sid);
    $sql4->bindParam(':essay', $essay);
    $sql4->execute();
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
<div class="jumbotron">
  <h1>Thank you for applying!</h1>
  <p>Your application has been recorded.</p>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
