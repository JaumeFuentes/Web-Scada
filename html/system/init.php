<?php

define('DATABASE_NAME', 'raspberry');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '000177');
define('DATABASE_HOST', 'localhost');

include_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.DBPDO.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.PILOT.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.SWITCH.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.BUTTON.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.MOTOR.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.CONTROLLER.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/class/class.ANALOG_INPUT.php';
