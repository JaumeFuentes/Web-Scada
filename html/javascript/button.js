$(document).ready(function() {
	var isMobile = false;
	
	if( window.innerWidth <= 990 && window.innerHeight <= 1450) {
	 isMobile = true;
	 
	}
	
	/*$('.buttonButton').on('mousedown', function(e) {	
		myElement = $(this);		
	});*/
	
	//myElement = document.getElementsByClassName(".buttonButton");
	//var mc = new Hammer(myElement);
	
	$('.buttonButton').bind(isMobile ? "touchstart" : "mousedown", function(e) {
		
		e.preventDefault(); 			
		
		$(this).attr('style','background: url(/images/button/button_on.png) no-repeat');
		
		var formId = $(this).parents('form:first').attr('id');
		
		digitalOutuptNumber = formId.substr(formId.length - 1);		
		deviceNumber = parseInt(formId.substr(6,1));	
		state = 1;	
				
		
		datos="device="+encodeURIComponent(deviceNumber)+"&digitalOutuptNumber="+encodeURIComponent(digitalOutuptNumber)+"&state="+encodeURIComponent(state);		
																						
		$.ajax({
			url:'phpfunctions/send_data.php',
			data:datos,
			success:function(msg){															
			}
		});	
	});
	
	$('.buttonButton').bind(isMobile ? 'touchend' : "click", function(e) {		
			
		e.preventDefault();
		
		$(this).attr('style','background: url(/images/button/button_off.png) no-repeat');
		
		var formId = $(this).parents('form:first').attr('id');
		
		digitalOutuptNumber = formId.substr(formId.length - 1);		
		deviceNumber = parseInt(formId.substr(6,1));		
		state = 0;
				
		
		datos="device="+encodeURIComponent(deviceNumber)+"&digitalOutuptNumber="+encodeURIComponent(digitalOutuptNumber)+"&state="+encodeURIComponent(state);		
																						
		$.ajax({
			url:'phpfunctions/send_data.php',
			data:datos,
			success:function(msg){															
			}
		});
		
		
	});
	
	
	
});

