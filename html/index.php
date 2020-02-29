<?php
include_once("common/top.php");
include_once('system/init.php');
//require('vendor/autoload.php');
//$struct = new \danog\PHP\StructClass('2?');
//$count = $struct->size;

?>



<?php
$controller1 = new controller(1);
$controller2 = new controller(2);




//echo '<div style = "clear:both"></div>';


//echo '<div style = "clear:both"></div>';







/*

$controller2 -> generateButton(0, "Pulsador 1 RB2");
$controller2 -> generatePilot(4, "Salida Digital 1 RB2");
$controller2 -> generateMotor(0, "Motor RB2");*/
?>

<div class="contenedor_equipo">
	<div class="top_contenedor_equipo">
		<span class="titulo">CONTROLADOR RASPBERRY 1</span>
		<span class="ultima_actualizacion">Last Update: <?php $controller1 -> printLastChange(); ?></span>
	</div>
	<div class="pilotos">
		<?php
		$controller1 -> generatePilot(0, "Entrada Digital 1");
		$controller1 -> generatePilot(1, "Entrada Digital 2");
		$controller1 -> generatePilot(2, "Entrada Digital 3");
		$controller1 -> generatePilot(3, "Entrada Digital 4");
		$controller1 -> generatePilot(4, "Salida Digital 1");
		$controller1 -> generatePilot(5, "Salida Digital 2");
		$controller1 -> generatePilot(6, "Salida Digital 3");
		$controller1 -> generatePilot(7, "Salida Digital 4");
		?>
	</div>
	<div class="interruptores">
		<?php
		$controller1 -> generateSwitch(0, "Interruptor 1");
		$controller1 -> generateSwitch(1, "Interruptor 2");
		$controller1 -> generateSwitch(2, "Interruptor 3");
		$controller1 -> generateSwitch(3, "Interruptor 4");
		?>
	</div>
	<div class="pulsadores">
		<?php
		$controller1 -> generateButton(0, "Pulsador 1");
		$controller1 -> generateButton(1, "Pulsador 2");
		$controller1 -> generateButton(2, "Pulsador 3");
		$controller1 -> generateButton(3, "Pulsador 4");
		?>
	</div>
	<div class="analogicas_entradas">
		<?php
		$controller1 -> generateAnalogInput(0, "Anemómetro", "Kn");
		$controller1 -> generateAnalogInput(1, "Humedad", "%");
		$controller1 -> generateAnalogInput(2, "Temperatura", "ºC");
		?>
	</div>
	<div class="analogicas_salidas">
		<?php
		$controller1 -> generateMotor(0, "Motor Coche");
		?>
	</div>
    <div style = "clear:both"></div>
</div>

<div class="contenedor_equipo">
	<div class="top_contenedor_equipo">
		<span class="titulo">CONTROLADOR RASPBERRY 2</span>
		<span class="ultima_actualizacion">Last Update: <?php $controller1 -> printLastChange(); ?></span>
	</div>
	<div class="pilotos">
		<?php
		$controller2 -> generatePilot(0, "Entrada Digital 1");
		$controller2 -> generatePilot(1, "Sensor Luz");
		$controller2 -> generatePilot(2, "Entrada Digital 3");
		$controller2 -> generatePilot(3, "Entrada Digital 4");
		$controller2 -> generatePilot(4, "Luz Alógena");
		$controller2 -> generatePilot(5, "Salida Digital 2");
		$controller2 -> generatePilot(6, "Pito");
		$controller2 -> generatePilot(7, "Salida Digital 4");
		?>
	</div>
	<div class="interruptores">
		<?php
		$controller2 -> generateSwitch(0, "LUZ ALÓGENA");
		$controller2 -> generateSwitch(1, "Interruptor 2");
		$controller2 -> generateSwitch(2, "PITO");
		$controller2 -> generateSwitch(3, "Interruptor 4");
		?>
	</div>
	<div class="pulsadores">
		<?php
		$controller2 -> generateButton(0, "Pulsador 1");
		$controller2 -> generateButton(1, "Pulsador 2");
		$controller2 -> generateButton(2, "Pulsador 3");
		$controller2 -> generateButton(3, "Pulsador 4");
		?>
	</div>
	<div class="analogicas_entradas">
		<?php
		$controller2 -> generateAnalogInput(0, "Velocidad motor", "m/s");
		$controller2 -> generateAnalogInput(1, "Luminosidad", "%");
		$controller2 -> generateAnalogInput(2, "Nivel agua", "mts");
		?>
	</div>
	<div class="analogicas_salidas">
		<?php
		$controller2 -> generateMotor(0, "Motor Ventilador");
		?>
	</div>
    <div style = "clear:both"></div>
</div>

<?php
include_once("common/bottom.php");

?>
