<?php

session_start();
$con = mysqli_connect("localhost","skontic","crusherstudy1","sk_dbb");

if(!$_SESSION['user_name'])
{
	header('location:login.php');
}
?>



<?php
	
	$msg ='';

	$con = mysqli_connect("localhost","skontic","crusherstudy1","sk_dbb");

	$sp_title = mysqli_real_escape_string($con, $_POST['sp_title']);
	$sp_cat = $_POST['sp_cat'];

	$sp_im1 = $_FILES['sp_im1']['name'];
	$im1_tmp = $_FILES['sp_im1']['tmp_name'];

	

	if(!empty($sp_title)
	 && !empty($sp_cat) 
	 && !empty($sp_im1))
	{

	//start title
	if(empty($sp_title))
	{
		$msg .= 'Title Empty. ';
	}

	//start desc
	if(empty($sp_cat))
	{
		$msg .= 'Category Empty. ';
	}

	//Start im1
	if(!empty($sp_im1))
	{
		$ex_name_im1 = explode('.',$sp_im1);
		$ext_im1 = end($ex_name_im1);
		$ext_allow_im1 = array('jpg','jpeg','png','gif');
		if(in_array($ext_im1, $ext_allow_im1))
		{
			$new_im1 = md5(rand()).".".$ext_im1;
			$path_im1 = "../sk_pf/".$new_im1;
			move_uploaded_file($im1_tmp, $path_im1);

		}
		else
		{
			$msg .= 'im1 Invalid Format. ';
		}
	}
	else
	{
		$msg .= 'im1 Empty. ';
	}
	// End im1


	
	//Query Start

	if(!empty($sp_title)
	 && !empty($sp_cat)
	 && !empty($sp_im1)) 
	{
		$query = "INSERT INTO sk_sp(sp_title,sp_cat,sp_im1) VALUES('$sp_title','$sp_cat','$new_im1')";
		if(mysqli_query($con,$query))
		{
		$msg .='good';
		}
		else
		{
			$msg .='Error';
		}
	}
	else
	{
		$msg .='check * Fields ';
	}

	}
	else
	{
		$msg .= "Don't Leave Empty Field";
	}


	echo $msg;
?>