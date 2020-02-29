<?php

class controller extends DBPDO{
	public $digitals = array();		
	public $analogs = array();
	public $lastChange;
	private $device;
	
	
	function __construct($device){
		parent::__construct();
		$this -> loadData();
		$this -> device = $device;		
	}
	
	
	private function loadData(){
		$DB = new DBPDO();
		$deviceData = $DB->fetch("SELECT * FROM raspberry1 ORDER BY id DESC LIMIT 1", NULL);
		
		$this -> digitals[0] = $deviceData['DI1'];
		$this -> digitals[1] = $deviceData['DI2'];
		$this -> digitals[2] = $deviceData['DI3'];
		$this -> digitals[3] = $deviceData['DI4'];
		
		$this -> digitals[4] = $deviceData['DO1'];
		$this -> digitals[5] = $deviceData['DO2'];
		$this -> digitals[6] = $deviceData['DO3'];
		$this -> digitals[7] = $deviceData['DO4'];
		
		$this -> analogs[0] = $deviceData['AI1'];
		$this -> analogs[1] = $deviceData['AI2'];
		$this -> analogs[2] = $deviceData['AI3'];
		$this -> analogs[3] = $deviceData['AI4'];
		$this -> analogs[4] = $deviceData['AI5'];
		
		$this -> analogs[5] = $deviceData['AO1'];
		$this -> analogs[6] = $deviceData['AO2'];
		$this -> analogs[7] = $deviceData['AO3'];
		$this -> analogs[8] = $deviceData['AO4'];
		$this -> analogs[9] = $deviceData['AO5'];
		
		$this -> lastChange = $deviceData['date'];
	}
	
	/*number of pilots go from 0 to 7 */
	public function generatePilot($pilotNumber, $description){
		$pilotData = array("device" => $this -> device,"pilotNumber" => $pilotNumber, "state" => $this -> digitals[$pilotNumber],"description" => $description);		
	
		$pilot = new PILOT($pilotData);
		
		$pilot -> printPilot();		
	}
	
	/*number of switches go from 0 to 3 */
	public function generateSwitch($digitalOutuptNumber, $description){
		$switchNumber = $digitalOutuptNumber + 4;
		$switchtData = array("device" => $this -> device,"digitalOutuptNumber" => $digitalOutuptNumber, "state" => $this -> digitals[$switchNumber],"description" => $description);
		
		$switch = new SWITCH_($switchtData);
		
		$switch -> printSwitch();
	}
	
	/*number of buttons go from 0 to 3 */
	public function generateButton($digitalOutuptNumber, $description){
		$buttonNumber = $digitalOutuptNumber + 4;
		$buttonData = array("device" => $this -> device,"digitalOutuptNumber" => $digitalOutuptNumber, "state" => $this -> digitals[$buttonNumber],"description" => $description);
		
		$button = new BUTTON($buttonData);
		
		$button -> printButton();
	}
	
	/*number of motors go from 0 to .. */
	public function generateMotor($motorNumber, $description){
		$motorNumber = $motorNumber + 1;
		$motorData = array("device" => $this -> device,"motorNumber" => $motorNumber, "speed" => 0,"description" => $description);
		
		$motor = new MOTOR($motorData);
		
		$motor -> printMotor();
	}
	
	/*number of analogs inputs go from 0 to .. */
	public function generateAnalogInput($analogNumber, $description, $unit){
		$analogData = array("device" => $this -> device,"analogNumber" => $analogNumber, "value" => $this -> analogs[$analogNumber], "unit" => $unit, "description" => $description);		
	
		$analog = new ANALOG_INPUT($analogData);
		
		$analog -> printAnalog();		
	}
	
	public function printLastChange(){
		/* The date format returned from mysql is in Y-m-d. 
		 * I use this to change it to d-m-Y
		 */
		$this -> lastChange = date("d-m-Y G:i:s", strtotime($this -> lastChange));
		echo '<span id = "device'.$this->device.' lastChange" class = "lastChange">'.$this -> lastChange.'</span>';
	}
	
}

