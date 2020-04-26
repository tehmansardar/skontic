<?php
$mssg = '';
/*if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['web']) && isset($_POST['message']))
{*/
	include('sk_db.php');
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$web = mysqli_real_escape_string($con,$_POST['website']);
	$msg = mysqli_real_escape_string($con,$_POST['msg']);
	
	if(empty($name) || empty($email) || empty($web) || empty($msg))
	{
		$mssg .='All Fields Are Required';
	}
	else
	{
		$query = "INSERT INTO sk_sc (sc_name,sc_email,sc_web,sc_msg) VALUES('$name','$email','$web','$msg')";
		if(mysqli_query($con, $query))
		{
			$mssg .= "Sended";
		}
		else
		{
			$mssg .="Not Sended";
		}
	}

echo $mssg;
?>