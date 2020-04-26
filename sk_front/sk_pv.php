<?php
	
	$output = '';

	if(isset($_GET['pid']))
	{
		include('sk_db.php');

		$pid = $_GET['pid'];

		$query = "SELECT * FROM sk_sp WHERE sp_id='$pid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
			
			$sp_title = $row['sp_title'];
			$sp_desc = $row['sp_desc'];
			$sp_t1 = $row['sp_t1'];
			$sp_t2 = $row['sp_t2'];
			$sp_t3 = $row['sp_t2'];
			$sp_im1 = $row['sp_im1'];
			$sp_im2 = $row['sp_im2'];
			$sp_im3 = $row['sp_im3'];
	


	$output .='
<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li class="thumb1-li"><img src="sk_pf/'.$sp_t1.'" alt="" data-image="sk_pf/'.$sp_im1.'" class="thumb-img1"></li>
									<li class="thumb2-li"><img src="sk_pf/'.$sp_t2.'" alt="" data-image="sk_pf/'.$sp_im2.'" class="thumb-img2"></li>
									<li class="thumb3-li"><img src="sk_pf/'.$sp_t3.'" alt="" data-image="sk_pf/'.$sp_im3.'" class="thumb-img3"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(sk_pf/'.$sp_im1.')"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>'.$sp_title.'</h2>
						<p>'.$sp_desc.'</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>Delivered</span>
					</div>
					
				</div>
			</div>
		</div>
		';
	}
	echo $output;

?>