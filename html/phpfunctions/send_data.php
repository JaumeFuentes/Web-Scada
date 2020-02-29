<?php

include_once('../system/init.php');

isset($_REQUEST["device"]) ? $device = $_REQUEST["device"] : $device = NULL;
isset($_REQUEST["digitalOutuptNumber"]) ? $digitalOutuptNumber = $_REQUEST["digitalOutuptNumber"] : $digitalOutuptNumber = NULL;
isset($_REQUEST["state"]) ? $state = $_REQUEST["state"] : $state = NULL;

//$e = [$device,$digitalOutuptNumber,$state];
//echo json_encode($e, JSON_FORCE_OBJECT);


$struct = new \danog\PHP\StructClass('2I');
$count = $struct->size;


if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";

//Define ip and port for each device. In the future this data should be pulled from a database

if ( $device == 1 ){
	$ip = '192.168.1.41';
	$port = 8080;
}
elseif ( $device == 2 ){
	$ip = '192.168.255.110';
	$port = 8082;
}
else
	$ip = "";
 
if(!socket_connect($sock , $ip , $port))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not connect: [$errorcode] $errormsg \n");
}
 
echo "Connection established \n";



$packed = $struct->pack($digitalOutuptNumber, $state);

echo strlen($packed);
echo "<br>";
echo $count;

//Send the message to the server
if( ! socket_send ( $sock , $packed , $count , 0))
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Could not send data: [$errorcode] $errormsg \n");
}

echo "Data send successfully \n";





