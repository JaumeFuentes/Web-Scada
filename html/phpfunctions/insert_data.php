<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../system/init.php');
$DB = new DBPDO();

isset($_GET["device"]) ? $device = $_GET["device"] : $device = NULL;
isset($_GET["DI1"]) ? $DI1 = $_GET["DI1"] : $DI1 = NULL;
isset($_GET["DI2"]) ? $DI2 = $_GET["DI2"] : $DI2 = NULL;
isset($_GET["DI3"]) ? $DI3 = $_GET["DI3"] : $DI3 = NULL;
isset($_GET["DI4"]) ? $DI4 = $_GET["DI4"] : $DI4 = NULL;

isset($_GET["DO1"]) ? $DO1 = $_GET["DO1"] : $DO1 = NULL;
isset($_GET["DO2"]) ? $DO2 = $_GET["DO2"] : $DO2 = NULL;
isset($_GET["DO3"]) ? $DO3 = $_GET["DO3"] : $DO3 = NULL;
isset($_GET["DO4"]) ? $DO4 = $_GET["DO4"] : $DO4 = NULL;

isset($_GET["AI1"]) ? $AI1 = $_GET["AI1"] : $AI1 = NULL;
isset($_GET["AI2"]) ? $AI2 = $_GET["AI2"] : $AI2 = NULL;
isset($_GET["AI3"]) ? $AI3 = $_GET["AI3"] : $AI3 = NULL;
isset($_GET["AI4"]) ? $AI4 = $_GET["AI4"] : $AI4 = NULL;
isset($_GET["AI5"]) ? $AI5 = $_GET["AI5"] : $AI5 = NULL;

isset($_GET["AO1"]) ? $AO1 = $_GET["AO1"] : $AO1 = NULL;
isset($_GET["AO2"]) ? $AO2 = $_GET["AO2"] : $AO2 = NULL;
isset($_GET["AO3"]) ? $AO3 = $_GET["AO3"] : $AO3 = NULL;
isset($_GET["AO4"]) ? $AO4 = $_GET["AO4"] : $AO4 = NULL;
isset($_GET["AO5"]) ? $AO5 = $_GET["AO5"] : $AO5 = NULL;

$values = array($DI1, $DI2, $DI3, $DI4, $DO1, $DO2, $DO3, $DO4, $AI1, $AI2, $AI3, $AI4, $AI5, $AO1, $AO2, $AO3, $AO4, $AO5);


$DB->execute("INSERT INTO ".$device."  (DI1 , DI2, DI3, DI4, DO1, DO2, DO3, DO4, AI1, AI2, AI3, AI4, AI5, AO1, AO2, AO3, AO4, AO5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ", $values);

echo "hola";
