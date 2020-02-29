<?php

class ANALOG_INPUT{
	public $value;
	public $unit;
	public $description;
	private $device;
	private $analogNumber;	
	
	public function __construct($analogData){
		if ( is_array($analogData) ){
			$this -> value = $analogData['value'];
			$this ->unit = $analogData['unit'];
			$this -> description = $analogData['description'];	
			$this -> device = $analogData['device'];	
			$this -> analogNumber = $analogData['analogNumber'] +1;		
		}
		else
			{
			throw new Exception("No data was supplied.");
			}
	}
	
	
	
	public function printAnalog(){		
		
		echo '
		<div id = "device'.$this->device.' analogInput'.$this->analogNumber.'" class = "analogInput">
			<span class = "analogValue">';
				echo $this->value;				
			echo '	
			</span>
			<span>'.$this->unit.'</span>
			<div class = "analogDescription">';
				echo $this -> description;
			echo '
			</div>
		</div>';
	}
	
}
	
