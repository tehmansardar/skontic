<?php

session_start();

$con = mysqli_connect("localhost","skontic","crusherstudy1","sk_dbb");

$salt = '$2y$10$fathermothersistersons';


if(isset($_POST['user_sub']))
{
	$username = $_POST['username'];
	$password = $_POST['user_pass'];

	$salted = crypt($password,$salt);

	$check_query = "SELECT * FROM sk_user WHERE user_name='$username' LIMIT 1";
	$check_run = mysqli_query($con,$check_query);
	$check_row = mysqli_fetch_array($check_run);

		$db_user = $_SESSION['user_name'] = $check_row['user_name'];
		$db_pass = $check_row['user_password'];

		if($username==$db_user && $salted==$db_pass)
		{
			header('location:index.php');		
		}
		else
		{
			
		}
}

	//$my_password = crypt($password,$salt);

?>







<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="sk_admin.css">
</head>
<body>

		<div class="container" align="center">
			<br><br>
			<h3>Login</h3>
			<br>
			<div class="col-md-6">
			<form action="" method="post">
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control" placeholder="username">
				</div>
				<div class="form-group">
					<input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="password">
				</div>
				<input type="submit" name="user_sub" id="user_sub" class="btn btn-primary" placeholder="username">
			</form>
			</div>
		</div>

</body>
</html>