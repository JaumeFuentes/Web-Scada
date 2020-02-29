<html>
	<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/javascript/update_data.js"></script> 
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('vendor/autoload.php');

$struct = new \danog\PHP\StructClass('2cxbxBx?xhxHxixIxlxLxqxQxfxdx2xsx5pP');

$packed = $struct->pack(
'n', 'v', -127, 100, true, 333, 444, 232423, 234342, 999999999999, 999999999999, -88888888888888,
88888888888877, 2.2343,
3.03424, 'df', 'asdfghjkl', 1283912);

$unpacked = $struct->unpack($packed);

echo $packed;
echo "</br>";
echo $unpacked[2];


require('vendor/autoload.php');
$struct = new \danog\PHP\StructClass('2?');
$count = $struct->size;


if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
if(!socket_connect($sock , 'localhost' , 8080))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not connect: [$errorcode] $errormsg \n");
}
 
echo "Connection established \n";

//Now receive reply from server
if(socket_recv ( $sock , $packed , $count , MSG_WAITALL ) === FALSE)
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not receive data: [$errorcode] $errormsg \n");
}
 
//print the received message
$unpacked = $struct->unpack($packed);
print_r($unpacked);*/
?>

Digital input 1 = <span id="DI1"></span>
</body>
</html>
