<?php

session_start();
$con = mysqli_connect("localhost","skontic","crusherstudy1","sk_dbb");

if(!$_SESSION['user_name'])
{
	header('location:login.php');
}
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

	<div class="container" style="width: 786px;">
		<br>
		<div class="row">
			<h3 class="col-md-10">Insert Portfolio</h3>
		<a href="logout.php" class="col-md-2">logout</a>
		</div>

		<div class="port">
			<br>
				<span class="msg"></span>
			<br>

			<form method="post" id="form-submit" enctype="multipart/form-data">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" name="sp_title" id="sp_title" class="sp_title form-control" placeholder="Title">
				</div>

				

				<div class="form-group">
					<label>Category:</label>
					
					<select name="sp_cat" class="form-control col-md-3 sp_cat" id="sp_cat">
						<option value=''>Select Category</option>
						<option value='website'>Website</option>
						<option value='application'>Application</option>
						<option value='ui/ux'>UI/UX</option>
					</select>
				</div>

				<div class="row">
				<div class="col-md-4">
					<label>Product 1st Image:</label>
					<input type="file" name="sp_im1" id="sp_im1" class="sp_im1 form-control">
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<button type="submit" name="sp_btn" class="sp_btn btn btn-primary" id="sp_btn">Submit</button>
				</div>
				</div>

				
				</div>
				<br>
				<br>
				<br>
				<br>
			</form>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#form-submit').on('submit', function(e){
			e.preventDefault();

			$.ajax({
 				url : "upload.php",
 				method : "POST",
 				data : new FormData(this),
 				contentType:false,
 				processData:false,
 				success:function(data)
 				{
 					$('.msg').html(data);

 					$('#sp_title').val('');
 					$('#sp_desc').val('');
 					$('#sp_cat').val('');
 					$('#sp_t0').val('');
 					$('#sp_t1').val('');
 					$('#sp_t2').val('');
 					$('#sp_t3').val('');
 					$('#sp_im1').val('');
 					$('#sp_im2').val('');
 					$('#sp_im3').val('');
 				}
		});
	});

	});

</script>
