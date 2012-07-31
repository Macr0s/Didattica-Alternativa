<?php

$off = 0;

if ($off == "1"){
	include("theme/off.theme.php");
	exit();
}

$page = $_GET["page"];
$con = mysql_connect("localhost","stud_10723","MX5vHH88");

switch(false){
	case $con:
		$page = "error";
	break;
	default:
		mysql_select_db("stud_liceoblaisepascal_it", $con);
}


switch($page){

	//pagina di login
	case "login":
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$return = mysql_query("SELECT * FROM Account WHERE ( user = '$user' AND pass = '$pass')");
		$num = mysql_num_rows($return);
		if ($num == "1"){
			while($row = mysql_fetch_array($return)){
				$id = $row['id'];
				$name = base64_encode($row['name']);
			}
			include("theme/check.user.theme.php");
		}else{
			$url= "check.php?page=login_error";
		}
	break;

	
	//pagina di errore di login
	case "login_error":
		include("theme/check.error.theme.php");
	break;
	
	//pagina di homepage
	default:
		include("theme/check.theme.php");
}
if ($page != "error"){mysql_close($con);}
?>