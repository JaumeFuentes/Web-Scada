$(document).ready(function() {
	
	$('.switchButton').on("click", function (e) {
		
		e.preventDefault(); 			
		
		var formId = $(this).parents('form:first').attr('id');
		
		digitalOutuptNumber = formId.substr(formId.length - 1);		
		deviceNumber = parseInt(formId.substr(6,1));		
		state = $(this).parents('form:first').find('.switchState').val();	
		
		datos="device="+encodeURIComponent(deviceNumber)+"&digitalOutuptNumber="+encodeURIComponent(digitalOutuptNumber)+"&state="+encodeURIComponent(state);		
																						
		$.ajax({
			url:'phpfunctions/send_data.php',
			data:datos,
			success:function(msg){															
			}
		});	

	});
	
});
