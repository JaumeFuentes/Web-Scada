<?php

class BUTTON{
	public $state;
	public $description;
	private $device;
	private $digitalOutuptNumber;	
	private $buttonImage;
	
	public function __construct($switchData){
		if ( is_array($switchData) ){
			$this -> state = $switchData['state'];
			$this -> description = $switchData['description'];	
			$this -> device = $switchData['device'];	
			$this -> digitalOutuptNumber = $switchData['digitalOutuptNumber']+1; //in the function the switches numbers go from 0 to 3 so we need to add 1 because in the controller is programmed from 1 to 4	
			
			//$this->updateForm($this -> state);	
		}
		else
			{
			throw new Exception("No data was supplied.");
			}
	}
	/*All buttons have the class switch
	 * The id is composed by "deviceNumber buttonNumber" -> example: device1 button2
	 */
	public function printButton(){
		echo'
			<div class="buttonContainer">
				<form id = "device'.$this -> device.' button'.$this -> digitalOutuptNumber.'" class = "button">			
					<input class = "buttonButton" type="button" style="background: url(/images/button/button_off.png) no-repeat"  />
				</form>';
				echo '<div class="buttonDescription">'.$this -> description.'</div>';		
		echo'
			</div>';
	}	
}

