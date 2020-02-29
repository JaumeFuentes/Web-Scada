<?php

include_once('../system/init.php');
$DB = new DBPDO();

$raspberryData[] = array();
$raspberryData[0] = $DB->fetch("SELECT * FROM raspberry1 ORDER BY id DESC LIMIT 1", NULL);
$raspberryData[1] = $DB->fetch("SELECT * FROM raspberry2 ORDER BY id DESC LIMIT 1", NULL);

$raspberryData = orderData($raspberryData);


echo json_encode($raspberryData);
?>



<?php
/* The date format returned from mysql is in Y-m-d. 
 * I use this function to change it to d-m-Y
 */
function orderData($matrix){
	$i = 0;
	foreach ($matrix as $array){
		$array['date'] = date("d-m-Y G:i:s", strtotime($array['date']));
		$matrix2[$i] = $array;
		$i++;
	}
	
	return $matrix2;
}
?>
