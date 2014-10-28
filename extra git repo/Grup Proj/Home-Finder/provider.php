<!DOCTYPE html>
<?php

$dbhandle = mysql_connect("localhost", "root", "") or die ("Unable to connect to MySQL");
$selected = mysql_select_db("test",$dbhandle) or die("Could not select examples");
?>

<?php
$addressErr=$typeErr=$facilityErr=$feesErr=$contactnoErr=$emailErr=$distanceErr=$nameErr=$NICErr="";
$address = $type = $facility = $fees = $contactno = $email = $distance = $other = $name = $NIC = $message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST['address'])){
$addressErr = "required";
}
else{
$address = test_input($_POST['address']);
}

$type = test_input($_POST['Rent_Type']);


if (preg_match("/^[0-9a-zA-Z -]+$/",$_POST['facility']) === 0){
$facilityErr = "Invalid details";
}
else{
$facility = test_input(md5($_POST['facility']));
}
if (preg_match("/^[0-9]{10,}$/",$_POST['fees']) === 0){
$feesErr = " Invalid details";
}
else{
$fees = test_input($_POST['fees']);
}
if (preg_match("/^[0-9]{10,}$/",$_POST['tel-number']) === 0){
$contactnoErr = "enter valid phone number";
}
else{
$contactno = test_input($_POST['tel-number']);
}

if (empty($_POST['email'])){
$emailErr = "required";
}
else{
$email = test_input($_POST['email']);
}

if (preg_match("/^[0-9]{10,}$/",$_POST['dis']) === 0){
$distanceErr = " Invalid details";
}
else{
$distance = test_input($_POST['dis']);
}
$$other = test_input($_POST['other']);

if (preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$_POST['Last_Name']) === 0){
$nameErr = "Name must be from letters";
}
else{
$name = test_input($_POST['name']);
}

if (preg_match("/^[0-9a-zA-Z]{10}$/",$_POST['nic']) === 0){
$NICErr = "NIC must contain 9 digits";
}
else{
$NIC = test_input($_POST['nic']);
}

$message = test_input($_POST['message']);

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
	<title>Provider - Student Accommodation Website </title>
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
						<h2><label><span>A</span>ccommodation<span>  F</span>orm</h2>
						<form action="activities.html">
						<div>
								<table>
									<tr>
										<td><label for="address"><span>A</span>ddress:</label></td>
										<td><textarea name="address" id="address" cols="30" rows="5"></textarea></td>
									</tr>
									<tr>
										<td><label for="Rent_Type"><span>R</span>ent<span> T</span>ype:</label></td>
										
										<td><select name="Rent_Type" maxlength="20">
											<option SELECTED>Rooms</option>
											<option>House</option>
											<option>Annex</option>
											<option>Flat</option>
											<option>Other</option>
					
									</select></td>
										<!--<td><label for="Rent_Type"><span>R</span>ent<span> T</span>ype:</label></td>
										<td><input type="text" id="Rent_Type"></td>-->
									</tr>
									<tr>
										<td><label for="Facilities"><span>F</span>acilities:</label></td>
										<td><textarea name="facility" id="$facility" cols="48" rows="3"></textarea></td>
									<tr>
										<td><label for="Fees"><span>F</span>ees/(rs):</label></td>
										<td><input type="varchar" name="fees" id="fees"></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>T</span>el.<span>N</span>umber:</label></td>
										<td><input type="text" name="tel-number" id="tel-number"></td>
									</tr>
									
									<tr>
										<td><label for="email"><span>E</span>mail <span> A</span>ddress:</label></td>
										<td><input type="text" name="email" id="email"></td>
									</tr>
									<tr>
										<td><label for="Destince"><span>D</span>estince/(km):</label></td>
										<td><input type="varchar" name ="dis" id="Destince"></td>
									</tr>
									<tr>
										<td><label for="Other"><span>O</span>ther:</label></td>
										<td><textarea name="other" id="other" cols="48" rows="3"></textarea></td>
									</tr>
								</table>
								<hr>
								
						<form action="activities.html">
							<table>
								<tr>
									<td><label for="name"><span>F</span>ull<span> N</span>ame:</label></td>
									<td><input type="text" name="name" id="name"></td>
								</tr>
								<tr>
									<td><label for="NIC"><span>NIC</span><span> No:</label></td>
									<td><input type="char" name="nic" id="NIC"></td>
								</tr>
								
								<tr>
									<td><label for="message"><span>M</span>essage:</label></td>
									<td><textarea name="message" id="message" cols="48" rows="3"></textarea></td>
								</tr>
							</table>
							<input type="submit" value="Send" id="submit"> 
						</form>
								
								
						</div>
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