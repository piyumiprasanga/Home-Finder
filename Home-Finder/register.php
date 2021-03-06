<!DOCTYPE html>
<?php

$dbhandle = mysql_connect("localhost", "root", "") or die ("Unable to connect to MySQL");
$selected = mysql_select_db("test",$dbhandle) or die("Could not select examples");
?>

<?php
$firstnameErr=$lastnameErr=$NICErr=$regnoErr=$addressErr=$emailErr=$facultyErr=$passwordErr=$contactnoErr=$notificationErr="";
$firstname = $lastname = $NIC = $regno = $address = $email = $faculty = $password = $contactno = $notification="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$_POST['First_Name']) === 0){
$firstnameErr = "Name must be from letters";
}
else{ 
$firstname = test_input($_POST['First_Name']);
}

if (preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$_POST['Last_Name']) === 0){
$lastnameErr = "Name must be from letters";
}
else{
$lastname = test_input($_POST['Last_Name']);
}

if (preg_match("/^[0-9a-zA-Z]{10}$/",$_POST['NIC']) === 0){
$NICErr = "NIC must contain 9 digits";
}
else{
$NIC = test_input($_POST['NIC']);
}

if (preg_match("/^[0-9a-zA-Z -]{5,}$/",$_POST['username']) === 0){
$regnoErr = "required";
}
else{
$regno = test_input($_POST['username']);
}

if (empty($_POST['address'])){
$addressErr = "required";
}
else{
$address = test_input($_POST['address']);
}

if (empty($_POST['email'])){
$emailErr = "required";
}
else{
$email = test_input($_POST['email']);
}

$faculty = test_input($_POST['faculty']);

if (preg_match("/^[0-9a-zA-Z -]{6,}$/",$_POST['password']) === 0){
$passwordErr = "password length must be at least 6 characters";
}
else{
$password = test_input(md5($_POST['password']));
}

if (preg_match("/^[0-9]{10,}$/",$_POST['tel-number']) === 0){
$contactnoErr = "enter valid phone number";
}
else{
$contactno = test_input($_POST['tel-number']);
}

if (empty($_POST['notification'])){
$notificationErr = "required";
}
else{
$notification = test_input($_POST['notification']);
}
}

mysql_query("insert into prospective_tenent(Reg_No,First_Name,Last_Name,Email,NIC,Faculty,Address,Contact_No,Password,Notification)VALUES('$regno','$firstname','$lastname','$email','$NIC','$faculty','$address','$contactno','$password','$notification')");
mysql_close($dbhandle);

function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<html>
<head>
<style>
.error {
		color: #FF0000;
		font-size: 15px;
		}
</style>
	<meta charset="UTF-8">
	<title>Register - Student Accommodation Website </title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="header">
		<div>
			<a href="index.html" id="logo"><img src="images/logo.png" alt="logo"></a>
			<ul>
				<li>
					<a href="index.html"><span>H</span>ome</a>
				</li>
				<li>
					<a href="about.html"><span>A</span>bout</a>
				</li>
				<li>
					<a href="activities.html"><span>V</span>iew</a>
				</li>
				<li>
					<a href="blog.html"><span>L</span>ogin</a>
				</li>
				<li>
					<a href="gallary.html"><span>G</span>allary</a>
				</li>
				<li>
					<a href="contact.html"><span>C</span>ontact</a>
				</li>
			</ul>
			<div>
				<p>
					<span>S</span>tudent <span>A</span>ccommodation <span>I</span>n: <span><span>Colombo</span></span>
				</p>
			</div>
		</div>
	</div>
	<div class="body">
		<div class="register">
			<div>
				<div>
					<div class="register">
						<h2>Register Now!</h2>
						<p><span class="error">* required field.</span></p>
						<form role="form" action="" method="post" name="RegForm" >
							<div>
								<table>
									<tr>
										<td><label for="First_Name"><span>F</span>irst<span> N</span>ame:</label></td>
										<td><input type="text" name="First_Name" id="InputName" ></td>
										<td><div class="error">* <?php echo $firstnameErr;?></div></td>
										<!--<td><style ="font size:15px; font color:red;">* <?php echo $firstnameErr;?></td>-->
									</tr>
									<tr>
										<td><label for="Last_Name"><span>L</span>ast<span> N</span>ame:</label></td>
										<td><input type="text" name="Last_Name" id="InputName"></td>
										<td><div class="error">* <?php echo $lastnameErr;?></div></td>
									</tr>
									<tr>
										<td><label for="NIC"><span>NIC</span> No:</label></td>
										<td><input type="Char" name="NIC" id="InputName"></td>
										<td><div class="error">* <?php echo $NICErr;?></div></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>T</span>el.<span> N</span>umber:</label></td>
										<td><input type="text" name="tel-number" id="InputName"></td>
										<td><div class="error">* <?php echo $contactnoErr;?></div></td>
									</tr>
									<tr>
										<td><label for="address"><span>A</span>ddress:</label></td>
										<td><textarea name="address" id="InputName" cols="30" rows="5"></textarea></td>
										<td><div class="error">* <?php echo $addressErr;?></div></td>
									</tr>
									<tr>
										<td><label for="email"><span>E</span>mail <span>A</span>ddress:</label></td>
										<td><input type="email" name="email" id="InputEmailFirst"></td>
										<td><div class="error">* <?php echo $emailErr;?></div></td>
									</tr>
									<tr>
										<td><label for="SEND E-MAIL NOTIFICATIONS"><span>E</span>mail <span>N</span>otification:</label></td>
										<td><input type="checkbox" name="notification" value="send"></td>
									</tr>
									
									
									<tr>
										<td><label for="FACULTY NAME"><span>F</span>ACULTY:</label></td>
										
										<td><select name="faculty" maxlength="10">
											<option SELECTED>UCSC</option>
											<option>Science </option>
											<option>Management</option>
											<option>Maths department</option>
											<option>Education department</option>
											<option>Medical Faculty</option>
											<option>Sripalee</option>
											<option>Art Faculty</option>
											<option>Law Faculty</option>
					
									</select></td></tr>
									<tr>
										<td><label for="USER NAME"><span>U</span>ser<span> N</span>ame:<br>(Enter Reg:no)</label></td>
										<td><input type="text" name="username" id="InputName"></td>
										<td><div class="error">* <?php echo $regnoErr;?></div></td>
									</tr>
									<tr>
										<td><label for="PASSWORD"<span>P</span>assword:</label></td>
										<td><input type="password" name="password" id="InputName" ></td>
										<td><div class="error">* <?php echo $passwordErr;?></div></td>
									</tr>
									<tr>
										<td><label for="CONFIRM PASSWORD"<span>C</span>onform<span> P</span>assword:</label></td>
										<td><input type="password" name="password_conf" id="InputName"></td>
									
									</tr>

									<tr>
										<td><a href="#"><img src="images/button-plus.png" alt=""></a></td>
									</tr>
								</table>
								<input type="submit" name="submit" id="submit" value="Submit">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			
			<div class="connect">
				<h4>FOLLOW US:</h4>
				<a href="http://freewebsitetemplates.com/go/facebook/" class="facebook">Facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" class="twitter">Twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" class="google">Google+</a>
			</div>
		</div>
		<div>
			<p>
				Student Accommodation &#169; 2014| All Rights Reserved
			</p>
		</div>
	</div>
</body>
</html>