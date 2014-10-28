<!--<!DOCTYPE html>-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog - Student Accommodation Website</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="Template-IpadLoginJS/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Template-IpadLoginJS/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="Template-IpadLoginJS/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="Template-IpadLoginJS/bootstrap/js/bootstrap.min.js"></script>
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
					<a href="programs.html"><span>V</span>iew</a>
				</li>
				<li class="selected">
					<a href="blog.html"><span>L</span>ogin</a>
				</li>
				<li>
					<a href="staff.html"><span>S</span>taff</a>
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
	<!--<div class="body">
		<div>
			<div>
				<div>
					<div class="blog">
						<h2>Sign Up</h2>
						<div class="first">
						<!-- Interactive Login - START -->
						<div class="container">
							<!--<div class="row colored">-->
								<div id="contentdiv" class="contcustom">
									<span class="fa fa-spinner bigicon"></span>
									
									<h2>Login</h2>
									<div>
									<!-- my work-->
									<form action="" method="POST">
										<input id="username" type="text" name="username" placeholder="username">
										<input id="password" type="password" name="password" placeholder="password">
										<input type="submit" name="submit" value="Sign in" >
										</form>

										<?php
										/*if(isset($_POST["submit"]))(
										$username=$_POST['username'];
										$password=md5($_POST['password']);
										
										$dbhandle = mysql_connect("localhost", "root", "") or die ("Unable to connect to MySQL");
									    mysql_select_db('test') or die("Could not select examples");
										echo "success";
										
										$query = mysql_query("SELECT* FROM prospective_tenent WHERE username='"$regno"' AND password='"	$password"' ");
										$numrow = mysql_num_rows($query );
										
										if($numrow!=0)
										{
										while($row=mysql_fetch_assoc($query)) 
										{
										$dbuser=$row['$regno'];
										$dbpass=$row['password'];
										}
										if($username==$dbuser && $password==$dbpass)
										{
										session_start(); 
										$_SESSION['sess_user']=$username;
										header("location:student.php");
										}
										}else{
										echo "Invalid Username or Password!";									
										}
										)
										*/
										?>
										<!--<a href="student.html"></a>-->
										<div>
										<a href="application.html">Forgot your password?</a>
										</div>
										<!--<span id="lock1" class="fa fa-lock medhidden redborder"></span>-->
										
									   <!-- <button id="button1" class="btn btn-default wide hidden"> <span class="fa fa-check med"></span></button>
										<span id="lock1" class="fa fa-lock medhidden redborder"></span>-->
									</div>
								</div>
							</div>
						</div>

						<script type="text/javascript">


							function check_values() {
								if ($("#username").val().length != 0 && $("#password").val().length != 0) {
									$("#button1").removeClass("hidden").animate({ left: '250px' });;
									$("#lock1").addClass("hidden").animate({ left: '250px' });;
								}
							}


						</script>

						<style>
						.redborder {
							border:2px solid #f96145;
							border-radius:2px;
						}

						.hidden {
							display: none;
						}

						.visible {
							display: normal;
						}

						.colored {
							background-color: #F0EEEE;
						}

						.row {
							padding: 20px 0px;
						}

						.bigicon {
							font-size: 97px;
							color: #f96145;
						}

						.contcustom {
							text-align: center;
							width: 500px;
							border-radius: 0.5rem;
							top: 0;
							bottom: 0;
							left: 0;
							right: 0;
							margin: 10px auto;
							background : -moz-linear-gradient(#FF9900,#ffffcc,#ffffaa,#ffffbb,#FF9900,#ffffaa);
							padding: 20px;
						}

						input {
							width: 75%;
							margin-bottom: 17px;
							padding: 15px;
							background-color: #ECF4F4;
							border-radius: 2px;
							border: none;
						}

						h2 {
							margin-bottom: 20px;
							font-weight: bold;
							color: #ABABAB;
						}

						.btn {
							border-radius: 2px;
							padding: 10px;
						}

						.med {
							font-size: 27px;
							color: white;
						}

						.medhidden {
							font-size: 27px;
							color: #f96145;
							padding: 10px;
							width:100%;
						}

						.wide {
							background-color: #8EB7E4;
							width: 100%;
							-webkit-border-top-right-radius: 0;
							-webkit-border-bottom-right-radius: 0;
							-moz-border-radius-topright: 0;
							-moz-border-radius-bottomright: 0;
							border-top-right-radius: 0;
							border-bottom-right-radius: 0;
						}
						</style>

						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			
			<div class="connect">
				<font size="3" color="gray"><b>FOLLOW US:</b></font>
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