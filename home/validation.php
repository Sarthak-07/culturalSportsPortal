<?php
session_start();
$con= mysqli_connect('localhost','root','');
mysqli_select_db($con, 'login_signup');

$name=$_POST['uname'];
$pass=$_POST['password'];


$s="SELECT * FROM `login` WHERE rollno = '$name' && password='$pass'" ;

$result=mysqli_query($con, $s);

$num = mysqli_num_rows($result);
if($num==1){
	
	$row = $result->fetch_assoc();
	$_SESSION['username']=$row['name'];
	if($row['designation']=="Admin"){
		header('location:admin.php');
	}
	else{
	header('location:sports_portal.php');
}
}
else{
	$_SESSION['invalid']= "true";
	$_SESSION['fail']= "invalid credentials";
	header('location:signin.php');
}
?>