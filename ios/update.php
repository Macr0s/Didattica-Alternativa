<?php
	$con = mysql_connect("localhost","stud_10723","MX5vHH88");
	$return = array();
	mysql_select_db("stud_liceoblaisepascal_it", $con);
	$json = base64_decode(json_decode($_POST['json']));
	
?>