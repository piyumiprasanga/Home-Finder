<!--<!DOCTYPE html>-->
<?php
//open connection
$dbhandle = mysql_connect("localhost", "root", "") or die ("Unable to connect to MySQL");
$selected = mysql_select_db("test",$dbhandle) or die("Could not select examples");

?>

<?php
// Assigning values for variables
$un = $_POST['username'];
$pass = md5($_POST['password']);
//selectt query										
$result = mysql_query("SELECT Password FROM prospective_tenent WHERE Reg_No = '$un'");
$row=mysql_fetch_row($result);

//compairing values
if (!empty($un) && !empty($pass)) {
    if($un=="Admin" && $row[0]==$pass){
	include('index1.html');
	}
	elseif ($row[0]==$pass) {
	include('student.html');
	
	}else {
	include('blogdub.html');
		}
	

 }else {
	include('blogdub.html');
}
mysql_close($dbhandle);
?>

