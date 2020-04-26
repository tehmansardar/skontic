<?php
	include('sk_db.php');

	$output = '';

	$query = "SELECT * FROM sk_sp ORDER BY sp_id DESC";
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$sp_id = $row['sp_id'];
			$sp_title = $row['sp_title'];
			$sp_cat = $row['sp_cat'];
			$sp_im1 = $row['sp_im1'];
			$output .='
				<div class="product-item trans '.$sp_cat.'" style="float:left;" data-id="'.$sp_id.'" data-pop="sk_pf/'.$sp_im1.'">
							<div class="product discount product_filter port_height">
								<div class="product_image pis">
									<img src="sk_pf/'.$sp_im1.'" alt="" style="padding:15px;">
								</div>
								<!-- <div class="favorite favorite_left"></div> -->
								<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>  -->
								<div class="product_info">
									<h6 class="product_name">'.$sp_title.'</h6>
								</div>
							</div>
							
						</div>

			';

		}
	}

	echo $output;
?>