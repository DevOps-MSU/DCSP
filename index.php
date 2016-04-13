<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Apply for 2016 Bulldog Bytes</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap theme -->
<link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/theme.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
body {background-color: maroon;}
</style>
</head>
<body>
  <div class="container theme-showcase" role="main">
    <div class="jumbotron">
      <h2>2016 Bulldog Bytes // Application</h2>
      <p>Please fill out this application in its entirety.</p>
  <div id="app">
    <form action="submit.php" method="POST" id ="app_form">
      <fieldset>
        <legend>Student Information:</legend>
        First Name <input type="text" name="first_name">
        Last Name <input type="text" name="last_name"><br>
        Student E-mail <input type="text" name="email"><br>
        Street Address <input type="text" name="street_address">
        City <input type="text" name="city">
        State
        <select name="state">
          <option>--</option>
        	<option value="AL">Alabama</option>
        	<option value="AK">Alaska</option>
        	<option value="AZ">Arizona</option>
        	<option value="AR">Arkansas</option>
        	<option value="CA">California</option>
        	<option value="CO">Colorado</option>
        	<option value="CT">Connecticut</option>
        	<option value="DE">Delaware</option>
        	<option value="DC">District of Columbia</option>
        	<option value="FL">Florida</option>
        	<option value="GA">Georgia</option>
        	<option value="HI">Hawaii</option>
        	<option value="ID">Idaho</option>
        	<option value="IL">Illinois</option>
        	<option value="IN">Indiana</option>
        	<option value="IA">Iowa</option>
        	<option value="KS">Kansas</option>
        	<option value="KY">Kentucky</option>
        	<option value="LA">Louisiana</option>
        	<option value="ME">Maine</option>
        	<option value="MD">Maryland</option>
        	<option value="MA">Massachusetts</option>
        	<option value="MI">Michigan</option>
        	<option value="MN">Minnesota</option>
        	<option value="MS">Mississippi</option>
        	<option value="MO">Missouri</option>
        	<option value="MT">Montana</option>
        	<option value="NE">Nebraska</option>
        	<option value="NV">Nevada</option>
        	<option value="NH">New Hampshire</option>
        	<option value="NJ">New Jersey</option>
        	<option value="NM">New Mexico</option>
        	<option value="NY">New York</option>
        	<option value="NC">North Carolina</option>
        	<option value="ND">North Dakota</option>
        	<option value="OH">Ohio</option>
        	<option value="OK">Oklahoma</option>
        	<option value="OR">Oregon</option>
        	<option value="PA">Pennsylvania</option>
        	<option value="RI">Rhode Island</option>
        	<option value="SC">South Carolina</option>
        	<option value="SD">South Dakota</option>
        	<option value="TN">Tennessee</option>
        	<option value="TX">Texas</option>
        	<option value="UT">Utah</option>
        	<option value="VT">Vermont</option>
        	<option value="VA">Virginia</option>
        	<option value="WA">Washington</option>
        	<option value="WV">West Virginia</option>
        	<option value="WI">Wisconsin</option>
        	<option value="WY">Wyoming</option>
        </select>
        Zip Code <input type="text" name="zip_code"><br>
        Birthday (YYYY-MM-DD) Ex: 2016-01-31 <input type="date" name="dob">
        Age <input type="number" name="age"><br>
        Race/Ethnicity
        <select name ="ethnicity">
          <option>--</option>
          <option>Hispanic or Latino</option>
          <option>American Indian or Alaska Native</option>
          <option>White</option>
          <option>Asian</option>
          <option>Black or African American</option>
          <option>Native Hawaiian or Pacific Islander</option>
          <option>Two or More Races</option>
          <option>Other Race</option>
        </select><br>
        Gender<br>
        <input type="radio" name="gender" value="M" checked> Male<br>
        <input type="radio" name="gender" value="F"> Female<br>
        T-Shirt Size <select name ="shirt_size">
          <option>--</option>
          <option>XS</option>
          <option>S</option>
          <option>M</option>
          <option>L</option>
          <option>XL</option>
        </select><br>
        Grade Level in <b>School Year 2016-2017</b> <select name="grade_level">
          <option>--</option>
          <option value ="06">6th</option>
          <option value="07">7th</option>
          <option value="08">8th</option>
          <option value="09">9th</option>
          <option value="10">10th</option>
          <option value="11">11th</option>
          <option value="12">12th</option>
        </select><br>
        GPA <input type="number" name="gpa" min="0.00" max="4.00" step="0.01"><br>
      </fieldset>
      <fieldset>
        <legend>Parent Information:</legend>
        First Name <input type="text" name="pfirst_name">
        Last Name <input type="text" name="plast_name"><br>
        Parent E-mail <input type="text" name="pemail"><br>
        Primary Phone <input type="text" name="home_phone">
        Secondary Phone <input type="text" name="alternate_phone"><br>
        Emergency Contact <input type="text" name="emergency_name">
        Emergency Contact Phone <input type="text" name="emergency_phone"><br>
      </fieldset>
      <fieldset>
        <legend>School Information:</legend>
        School Name <input type="text" name="school_name">
        City <input type="text" name="school_city">
        State
        <select name="school_state">
          <option>--</option>
        	<option value="AL">Alabama</option>
        	<option value="AK">Alaska</option>
        	<option value="AZ">Arizona</option>
        	<option value="AR">Arkansas</option>
        	<option value="CA">California</option>
        	<option value="CO">Colorado</option>
        	<option value="CT">Connecticut</option>
        	<option value="DE">Delaware</option>
        	<option value="DC">District of Columbia</option>
        	<option value="FL">Florida</option>
        	<option value="GA">Georgia</option>
        	<option value="HI">Hawaii</option>
        	<option value="ID">Idaho</option>
        	<option value="IL">Illinois</option>
        	<option value="IN">Indiana</option>
        	<option value="IA">Iowa</option>
        	<option value="KS">Kansas</option>
        	<option value="KY">Kentucky</option>
        	<option value="LA">Louisiana</option>
        	<option value="ME">Maine</option>
        	<option value="MD">Maryland</option>
        	<option value="MA">Massachusetts</option>
        	<option value="MI">Michigan</option>
        	<option value="MN">Minnesota</option>
        	<option value="MS">Mississippi</option>
        	<option value="MO">Missouri</option>
        	<option value="MT">Montana</option>
        	<option value="NE">Nebraska</option>
        	<option value="NV">Nevada</option>
        	<option value="NH">New Hampshire</option>
        	<option value="NJ">New Jersey</option>
        	<option value="NM">New Mexico</option>
        	<option value="NY">New York</option>
        	<option value="NC">North Carolina</option>
        	<option value="ND">North Dakota</option>
        	<option value="OH">Ohio</option>
        	<option value="OK">Oklahoma</option>
        	<option value="OR">Oregon</option>
        	<option value="PA">Pennsylvania</option>
        	<option value="RI">Rhode Island</option>
        	<option value="SC">South Carolina</option>
        	<option value="SD">South Dakota</option>
        	<option value="TN">Tennessee</option>
        	<option value="TX">Texas</option>
        	<option value="UT">Utah</option>
        	<option value="VT">Vermont</option>
        	<option value="VA">Virginia</option>
        	<option value="WA">Washington</option>
        	<option value="WV">West Virginia</option>
        	<option value="WI">Wisconsin</option>
        	<option value="WY">Wyoming</option>
        </select>
        Zip Code <input type="text" name="school_zip_code"><br>
      </fieldset>
      <fieldset>
        <legend>Essay:</legend>
        Please tell us about yourself including your interests (academic and non‐academic) as well as why you wish to attend this program. What do you expect out of attending Bulldog Bytes? We are also interested in your plans for college and career. Where do you intend to attend college and what major are you most interested in?<br>
        <textarea name="student_essay" form="app_form" rows="10" cols="100">Enter text here...</textarea>
      </fieldset>
      <button type="submit" class="btn btn-default">Submit!</button>
    </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </div>
</div>
  </body>
  </html>
