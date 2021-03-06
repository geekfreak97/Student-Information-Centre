<?php

if(isset($_POST	["register"])){
$name = $_POST["name"];
$roll = $_POST["roll"];
$reg = $_POST["reg"];
$address = $_POST["address"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$gender = $_POST["gender"];
$dept = $_POST["dept"];
$dob = $_POST["dob"];
$age = $_POST["age"];
$batch = $_POST["batch"];
$blood = $_POST["blood"];
$hobby = $_POST["hobby"];
$sec_ques =  $_POST["sec_ques"];
$sec_ans = $_POST["sec_ans"];

$connection = mysqli_connect('localhost', 'root', '', 'sic');

$query = "INSERT INTO student(name, roll, reg, address, contact, email, gender, password,dept, dob, age, batch, blood, hobby, sec_ques, sec_ans, status)
					VALUES( '$name', '$roll', '$reg', '$address', '$contact', '$email', '$gender','$password', '$dept', '$dob', '$age', '$batch', '$blood', '$hobby', '$sec_ques', '$sec_ans', 0)";
$exe = mysqli_query($connection, $query);
if($exe){
	echo "<div id='success'> Registration completed <a href='signup.php'><button id='x1'>x</button></a></div>";
	// echo "<script type='text/javascript'>alert('Registration completed');</script>";

} else{
	$err = mysqli_error($connection);
	echo  "<div id='error'>$err<a href='signup.php'><button id='x2'>x</button></a></div>";
	// echo "<script type='text/javascript'>alert(\"$err\");</script>";
}

}
 ?>

<!DOCTYPE html>
<html>
<head>
<title> SIC: Sign Up </title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
<link rel="stylesheet" href="decoration.css">
</head>
<body>
<div class="container-fluid">
<img id="img" src="image/icon.png" alt="google"/>
<p class="head">STUDENT INFORMATION CENTRE</p>
<div class="row">
<ul>
	<li><a href="home.php" >Home</a></li>
	<li><a href="login.php" >Login</a></li>
	<li><a href="signup.php" style="background-color: #006CFF">Sign up</a></li>
	<li><a href="about.php">About</a></li>
</ul>
</div>

<div class="main">
  <div class="reg">
  <form action="signup.php" onsubmit="return validate_form()" method="post">
		<div class="box2">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" placeholder="Enter name" size="50" onfocusout="validate_name()"><br>
		<p class="alert" id="alert_name">*Enter name</p>

    <label for="roll">Roll no.:</label><br>
    <input type="text" id="roll" name="roll" placeholder="Enter Roll no." onfocusout="validate_roll()"> <br>
		<p class="alert" id="alert_roll">*Enter Roll no.</p>

    <label for="reg">Registration no.:</label><br>
    <input type="text" id="reg" name="reg" placeholder="Enter Registration no." onfocusout="validate_reg()"><br>
		<p class="alert" id="alert_reg">*Enter Resgistration no.</p>

    <label for="address">Address: </label><br>
		<textarea rows="4" cols="86" id="address" name="address" placeholder="Enter your address..." onfocusout="validate_address()"></textarea><br>
		<p class="alert" id="alert_address">*Enter Address</p>

		<label for="contact" >Contact no.: </label><br>
    <input type="number" id="contact" name="contact" placeholder="Enter contact no." onfocusout="validate_contact()"><br>
		<p class="alert" id="alert_contact">*Enter Contact no.</p>
		<p class="alert" id="alert_contact_invalid">*Invalid Contact no.</p>

    <label for="email">E-mail: </label><br>
    <input type="email" id="email" name="email" placeholder="Enter e-mail id" size="60" onfocusout="validate_email()"> <br>
		<p class="alert" id="alert_email">*Enter E-mail ID</p>

		<label for="password">Password: </label><br>
    <input type="password" id="password" name="password" placeholder="Enter password" onfocusout="validate_pass()"><br>
		<p class="alert" id="alert_pass">*Enter password</p>
		<p class="alert" id="alert_lower">*Your password should contain atleast one lowercase letter</p>
		<p class="alert" id="alert_upper">*Your password should contain atleast one uppercase letter</p>
		<p class="alert" id="alert_num">*Your password should contain atleast one numerical value</p>
		<p class="alert" id="alert_special">*Your password should contain atleast one special character</p>
		<p class="alert" id="alert_len">*Your password length should be more than or equal to 8</p>

		<label for="cnf_password">Confirm Password: </label><br>
		<input type="password" id="cnf_password" name="cnf_password" placeholder="Confirm password" onkeyup="validate_pass()"><br>
		<p class="alert" id="alert_cnf_pass">*Password and Confirm Password not matching</p>


		<label for="gender">Gender: </label><br>
    <input type="radio" name="gender" id="gender" value="M" style="width:10px" checked>Male
    <input type="radio" name="gender" id="gender" value="F" style="width:10px">Female <br>

		<label for="dept" >Department: </label><br>
		<select name="dept" id="dept">
		<option value="IT">IT</option>
		<option value="ECE">ECE</option>
		<option value="BT">BT</option>
		<option value="CSE">CSE</option>
		<option value="MME">MME</option>
		<option value="ME">ME</option>
		<option value="CE">CE</option>
		<option value="CH">CH</option>
		<option value="EE">EE</option>
		</select><br>

		<label for="dob" >Date of Birth: </label><br>
    <input type="date" id="dob" name="dob" placeholder="Enter Birth Date" onchange="cal_age()" onfocusout="validate_dob()"><br>
		<p class="alert" id="alert_dob">*Enter DOB</p>

		<label for="age" >Age:  </label><br>
    <input type="text" id="age" name="age" placeholder="Enter age" readonly><br>

		<label for="batch">Batch: </label><br>
    <select name="batch" id="batch">
    	<option value="2015-2019">2015-2019</option>
			<option value="2016-2020">2016-2020</option>
			<option value="2017-2021">2017-2021</option>
			<option value="2018-2022">2018-2022</option>
    </select> <br>

		<label for="blood">Blood group: </label><br>
    <select name="blood" id="blood">
    	<option value="A+">A+</option>
			<option value="B+">B+</option>
			<option value="AB+">AB+</option>
			<option value="O+">O+</option>
			<option value="A-">A-</option>
			<option value="B-">B-</option>
			<option value="AB-">AB-</option>
			<option value="O-">O-</option>
    </select> <br>

		<label for="hobby">Hobby:</label><br>
    <input type="text" id="hobby" name="hobby" placeholder="Enter hobby" onfocusout="validate_hobby()"><br>
		<p class="alert" id="alert_hobby">*Enter Hobby</p>

		<label for="sec_ques">Security Question: </label><br>
    <select name="sec_ques" id="sec_ques">
    	<option value="fav_author">Which is favourite author?</option>
			<option value="fav_color">Which is favourite color?</option>
			<option value="fav_char">Which is favourite character?</option>
			<option value="pet_name">What is your Pet's name?</option>
			<option value="fav_fruit">Which is favourite fruit?</option>
    </select> <br>
		<input type="text" name="sec_ans" id="sec_ans"placeholder="answer security question" onfocusout="validate_sec()" required>
		<p class="alert" id="alert_sec">*Answer the security question</p>
	</div>
    <div class="buttons">
    <button type="submit" name="register">Register</button>
    <button type="reset">Reset</button>
  </div>
  </form>
</div>
</div>

</div>

<script type="text/javascript" src="form.js"></script>
</body>
</html>
