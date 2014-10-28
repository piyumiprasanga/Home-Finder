<!DOCTYPE html>
<?php

$dbhandle = mysql_connect("localhost", "root", "") or die ("Unable to connect to MySQL");
$selected = mysql_select_db("test",$dbhandle) or die("Could not select examples");
?>

<?php
$addressErr=$renttypeErr=$facilitiesErr=$priceErr=$contactnoErr=$emailErr=$placeErr=$otherErr=$fullnameErr=$NICErr=$message="";
$address = $renttype = $facilities = $price = $contactno = $email = $place = $other = $fullname = $NIC= $message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST['address'])){
$addressErr = "required";
}
else{
$address = test_input($_POST['address']);
}

if (preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$_POST['Rent_Type']) === 0){
$renttypeErr = "required";
}
else{
$renttype = test_input($_POST['Rent_Type']);
}

if (preg_match("/^[0-9a-zA-Z]{10}$/",$_POST['NIC']) === 0){
$NICErr = "NIC must contain 9 digits";
}
else{
$NIC = test_input($_POST['NIC']);
}

if (empty($_POST['Facilities'])){
$facilitiesErr = "required";
}
else{
$facilities = test_input($_POST['Facilities']);
}

if (empty($_POST['fees'])){
$priceErr = "required";
}
else{
$price = test_input($_POST['fees']);
}

if (empty($_POST['email'])){
$emailErr = "required";
}
else{
$email = test_input($_POST['email']);
}

if (preg_match("/^[0-9]{10,}$/",$_POST['tel-number']) === 0){
$contactnoErr = "enter valid phone number";
}
else{
$contactno = test_input($_POST['tel-number']);
}

if (empty($_POST['Destince'])){
$placeErr = "required";
}
else{
$place = test_input($_POST['Destince']);
}

$other = test_input($_POST['other']);
$message = test_input($_POST['message']);

if (preg_match("/^[a-zA-Z][a-zA-Z -]+$/",$_POST['name']) === 0){
$fullnameErr = "Name must be from letters";
}
else{ 
$fullname = test_input($_POST['name']);
}
}

mysql_query("insert into acc_provider(NIC,Name,Email,Contact_No,Message)VALUES('$NIC','$fullname','$email','$contactno','$message')");
mysql_query("insert into accommodation(Address,Type,Facilities,Price,Area,Other,NIC)VALUES('$address','$renttype','$facilities','$price','$place','$other','$NIC')");
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
						<h2><label><span>A</span>ccommodation<span>  F</span>orm</h2>
						<p><span class="error">* required field.</span></p>
						<form role="form" action="" method="post" name="Accommodation_Form">
						<div>
								<table>
									<tr>
										<td><label for="address"><span>A</span>ddress:</label></td>
										<td><textarea name="address" id="address" cols="30" rows="5"></textarea></td>
										<td><div class="error">* <?php echo $addressErr;?></div></td>
									</tr>
									<tr>
										<td><label for="Rent_Type"><span>R</span>ent<span> T</span>ype:</label></td>
										<td><input type="text" name="Rent_Type" id="Rent_Type"></td>
										<td><div class="error">* <?php echo $renttypeErr;?></div></td>
									</tr>
									<tr>
										<td><label for="Facilities"><span>F</span>acilities:</label></td>
										<td><input type="text" name="Facilities" id="Facilities" width="100" height="5"></td>
										<td><div class="error">* <?php echo $facilitiesErr;?></div></td>
									<tr>
										<td><label for="Fees"><span>F</span>ees:</label></td>
										<td><input type="varchar" name="fees" id="fees"></td>
										<td><div class="error">* <?php echo $priceErr;?></div></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>T</span>el.<span>N</span>umber:</label></td>
										<td><input type="text" name="tel-number" id="tel-number"></td>
										<td><div class="error">* <?php echo $contactnoErr;?></div></td>
									</tr>
									
									<tr>
										<td><label for="email"><span>E</span>mail <span> A</span>ddress:</label></td>
										<td><input type="text" name="email" id="email"></td>
										<td><div class="error">* <?php echo $emailErr;?></div></td>
									</tr>
									<tr>
										<td><label for="Destince"><span>D</span>estince:</label></td>
										<td><input type="varchar" name="Destince" id="Destince"></td>
										<td><div class="error">* <?php echo $placeErr;?></div></td>
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
									<td><div class="error">* <?php echo $fullnameErr;?></div></td>
								</tr>
								<tr>
									<td><label for="NIC"><span>NIC</span><span> No:</label></td>
									<td><input type="char" name="NIC" id="NIC"></td>
									<td><div class="error">* <?php echo $NICErr;?></div></td>
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