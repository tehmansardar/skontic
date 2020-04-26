<?php

session_start();
$con = mysqli_connect("localhost","skontic","crusherstudy1","sk_dbb");

if(!$_SESSION['user_name'])
{
	header('location:login.php');
}
?>