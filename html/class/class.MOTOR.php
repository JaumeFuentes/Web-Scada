<?php

class MOTOR{
	public $speed;
	public $description;
	private $device;
	private $motorNumber;	
	
	
	public function __construct($motorData){
		if ( is_array($motorData) ){
			$this -> speed = $motorData['speed'];
			$this -> description = $motorData['description'];	
			$this -> device = $motorData['device'];	
			$this -> motorNumber = $motorData['motorNumber']; 	
			
			
		}
		else
			{
			throw new Exception("No data was supplied.");
			}
	}
	/*All motors have the class motor
	 * The id is composed by "deviceNumber motorNumber" -> example: device1 motor2
	 */
	public function printMotor(){
		echo'
			<div class="motorContainer">
				<span id="speed'.$this -> device.$this -> motorNumber.'" class="valor_velocidad">0</span>
				<form id = "device'.$this -> device.' motor'.$this -> motorNumber.'" class = "motor">						
					<input class = "motorButtonSpeedDown" type="button" value="-"  />
					<input class = "motorButtonSpeedUp" type="button" value="+"  />
				</form>';
				echo '<div class="motorDescription">'.$this -> description.'</div>';
		echo '
			</div>';
	}
	
	
	
}
