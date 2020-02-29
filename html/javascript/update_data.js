$(document).ready(function() {
		
	//$("#tempgauge1").tempGauge({width:100, borderWidth:2, showLabel:true, showScale : true});
	
	window.setInterval(function(){
		
		$.ajax({
		   url: '/phpfunctions/update_data.php',
		   type: 'POST',
		   data: 'post-form=',
		   dataType: 'json',
		   success: function(response, textStatus, jqXHR) {
			 
			
			 updatePilots(response);
			 updateSwitches(response);
			updateAnalogInput(response);
			 updateLastChange(response);
			 
		   },
		   error: function(jqXHR, textStatus, errorThrown){
			 alert(textStatus, errorThrown);
		  }
		});		
		
		
	   },1000);		
	
});



function updatePilots(response){
	/* All pilots have the class pilot
	 * All the classes are searched and from each the id is selected
	 * The id is composed by "deviceNumber pilottNumber"-> example: device1 pilot2
	 * The device and pilot number are extracted.
	 * The pilot numbers go from 1 to 8. The first 4 are digital inputs and the last 4 are digital outputs
	 */
	$( ".pilot" ).each(function( index ) {
		id = $(this).attr('id');
		pilotNumber = id.substr(id.length - 1);
		deviceNumber = parseInt(id.substr(6,1)); 
		deviceNumberAux = deviceNumber - 1; //1 is extracted because array starts from 0.
		
		if( pilotNumber < 5 ){
			digital = "DI"+pilotNumber;
		}
		else{
			pilotNumber = pilotNumber - 4;
			digital = "DO"+pilotNumber;
		}
			
		digitalState = response[deviceNumberAux][digital]
		
		if(digitalState == 1)
			$(this).find('img').attr('src','images/pilot/pilot_on.png');
		else
			$(this).find('img').attr('src','images/pilot/pilot_off.png');
	});
}

function updateSwitches(response){
	/* All switches have the class switch
	 * All the classes are searched and from each the id is selected
	 * The id is composed by "deviceNumber switchNumber"-> example: device1 switch2
	 * The device and switch number are extracted.
	 * Switch numbers go from 1 to 4. 
	 */
	$( ".switch" ).each(function( index ) {
		id = $(this).attr('id');
		switchNumber = id.substr(id.length - 1);
		deviceNumber = parseInt(id.substr(6,1)); 
		deviceNumberAux = deviceNumber - 1; //1 is extracted because array starts from 0.		
		
		digital = "DO"+switchNumber;
		
			
		digitalState = response[deviceNumberAux][digital]
		
		if(digitalState == 1){
			$(this).find('.switchButton').attr('style','background: url(images/switch/switch_on.png) no-repeat;');
			$(this).find('.switchState').val(0);
		}
		else{
			$(this).find('.switchButton').attr('style','background: url(images/switch/switch_off.png) no-repeat;');
			$(this).find('.switchState').val(1);
		}
	});
}


function updateAnalogInput(response){
	$( ".analogInput" ).each(function( index ) {
		id = $(this).attr('id');
		analogNumber = id.substr(id.length - 1);
		deviceNumber = parseInt(id.substr(6,1)); 
		deviceNumberAux = deviceNumber - 1; //1 is extracted because array starts from 0.
		
		
		analog = "AI"+analogNumber;
		
			
		analogData = response[deviceNumberAux][analog];
		//temp = 0.21*analogData - 10.418;
		//temp = ((analogData/241)*5)/0.01 - 290;
		//temp = temp.toFixed(2);
		$(this).find('.analogValue').html(analogData);
		//$("#tempgauge1").tempGauge({width:100, borderWidth:2, showLabel:true, showScale : true});
		
	});
}

function updateLastChange(response){
	$( ".lastChange" ).each(function( index ) {
		//alert(index);
		deviceNumber = parseInt(id.substr(6,1)); 
		deviceNumberAux = deviceNumber - 1; //1 is extracted because array starts from 0.
		date = response[deviceNumberAux]['date'];
		$(this).html(date);
		
	});
}
