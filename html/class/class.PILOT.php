<?php

class PILOT{
	public $state;
	public $description;
	private $device;
	private $pilotNumber;	
	
	public function __construct($pilotData){
		if ( is_array($pilotData) ){
			$this -> state = $pilotData['state'];
			$this -> description = $pilotData['description'];	
			$this -> device = $pilotData['device'];	
			$this -> pilotNumber = $pilotData['pilotNumber'] +1;		
		}
		else
			{
			throw new Exception("No data was supplied.");
			}
	}
	
	
	
	public function printPilot(){		
		
		echo '
		<div id = "device'.$this->device.' pilot'.$this->pilotNumber.'" class = "pilot">
			<div class = "pilotImage">';
				
				if($this -> state == true)
					echo '<img src="images/pilot/pilot_on.png" />';
				else
					echo '<img src="images/pilot/pilot_off.png" />';
			echo '	
			</div>
			<div class = "pilotDescription">';
				echo $this -> description;
			echo '
			</div>
		</div>';
	}
	
}
	
