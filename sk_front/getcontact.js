
//This is for Sending data contact that includes name, email, website, Message also there....

$(document).ready(function(){
	$('#review_submit').click(function(){

		var name = $('#input_name').val();
		var email = $('#input_email').val();
		var website = $('#input_website').val();
		var msg = $('#input_message').val();

		if(name !='' && email !='' && website !='' && msg !='')
		{
			$.ajax({

				url : "sk_front/getcontact.php",
 				method : "POST",
 				data : {name:name, email:email, website:website, msg:msg},
 				contentType:false,
 				processData:false,
 				success:function(data)
				{
					alert(data);
				}
			});
		}

	});
})