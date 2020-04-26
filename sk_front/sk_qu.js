$(document).ready(function(){

	// For Portfolio in index.html
	/*


	<div class="product-item website">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="images/product_1.png" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>  -->
								<div class="product_info">
									<h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
								</div>
							</div>
							
						</div>

	*/

	$.ajax({
		url:'sk_front/sk_port.php',
		method:'POST',
		processData:false,
		cache:false,
		success:function(data){
			$('.port-view').html(data);
			initIsotopeFiltering();
		}
	});
});
