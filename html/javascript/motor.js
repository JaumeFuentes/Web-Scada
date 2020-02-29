$(document).ready(function() {
	
	$('.motorButtonSpeedDown').on("click", function (e) {
		
		e.preventDefault(); 			
		
		var formId = $(this).parents('form:first').attr('id');
		
		motorNumber = formId.substr(formId.length - 1);			
		deviceNumber = parseInt(formId.substr(6,1));		
		speed = $("#speed"+deviceNumber+motorNumber).html();
		speed = parseInt(speed);
		
		if( speed > 0 )
			speed = speed - 5;	
		else
			speed = 0;
			
		$("#speed"+deviceNumber+motorNumber).html(speed);
		
		motorNumber = parseInt(motorNumber);
		motorNumber = motorNumber + 4; // I have to add 4 because switches go from 1 to 4, so the motors start in 5.
		
		datos="device="+encodeURIComponent(deviceNumber)+"&digitalOutuptNumber="+encodeURIComponent(motorNumber)+"&state="+encodeURIComponent(speed);		
																						
		$.ajax({
			url:'phpfunctions/send_data.php',
			data:datos,
			success:function(msg){															
			}
		});	

	});
	
	$('.motorButtonSpeedUp').on("click", function (e) {
		
		e.preventDefault(); 			
		
		var formId = $(this).parents('form:first').attr('id');
		
		motorNumber = formId.substr(formId.length - 1);			
		deviceNumber = parseInt(formId.substr(6,1));		
		speed = $("#speed"+deviceNumber+motorNumber).html();
		speed = parseInt(speed);
		
		if( speed < 100 )
			speed = speed + 5;	
		else
			speed = 100;
			
		$("#speed"+deviceNumber+motorNumber).html(speed);
		
		motorNumber = parseInt(motorNumber);
		motorNumber = motorNumber + 4; // I have to add 4 because switches go from 1 to 4, so the motors start in 5.	
		
		datos="device="+encodeURIComponent(deviceNumber)+"&digitalOutuptNumber="+encodeURIComponent(motorNumber)+"&state="+encodeURIComponent(speed);		
																						
		$.ajax({
			url:'phpfunctions/send_data.php',
			data:datos,
			success:function(msg){															
			}
		});

	});
	
});

