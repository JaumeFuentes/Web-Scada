<?php

class SWITCH_{
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
			
			$this->updateForm($this -> state);	
		}
		else
			{
			throw new Exception("No data was supplied.");
			}
	}
	/*All switches have the class switch
	 * The id is composed by "deviceNumber switchNumber" -> example: device1 switch2
	 */
	public function printSwitch(){
		echo'
			<div class="switchContainer">
				<form id = "device'.$this -> device.' switch'.$this -> digitalOutuptNumber.'" class = "switch">			
					<input class = "switchState" type = "hidden" name = "state" value = "'.$this -> state.'" />
					<input class = "switchButton" type="button" style="background: url('.$this -> buttonImage.') no-repeat;"  />
				</form>';
				echo '<div class="switchDescription">'.$this -> description.'</div>';
		echo'
			</div>';
		
	}
	
	private function updateForm($state){
		if( $state == 0 ){
			$this -> state = 1;
			$this -> buttonImage = 'images/switch/switch_off.png';
		}
		else{
			$this -> state = 0;
			$this -> buttonImage = 'images/switch/switch_on.png';
		}			
		
	}
	
}
