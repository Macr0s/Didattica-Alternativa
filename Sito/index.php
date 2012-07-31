<?php

$g = "15";
$m = "12";
$y = "2011";
$h = "10";
$h1 = "22";

$ga = date("j");
$ma = date("n");
$ya = date("Y");
$ha = date("G");

if ($ga > $g && $ma >= $m && $ya >= $y){
	$limit = " AND lvl = 2";
}else{
	if ($ga == $g && $ma == $m && $ya == $y && $ha >= $h1){
		$limit = " AND lvl = 2";
	}else{
		$limit = "";
	}
}

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

if($limit == false){
	$home = "login.before";
}else{
	$home = "login";
}

switch($page){

	//pagina di login
	case "login":
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$return = mysql_query("SELECT * FROM Account WHERE ( user = '$user' AND pass = '$pass'$limit)");
		$num = mysql_num_rows($return);
		if ($num == "1"){
			setcookie("sid_user",$user);
			setcookie("sid_pass",$pass);
			while ($row = mysql_fetch_array($return)){
				$level = $row['lvl'];
				setcookie("sid_name",base64_encode($row['name']));
				setcookie("sid_id",$row['id']);
				setcookie("sid_classe",$row['classe']);
			}
		}else{
			$url= "index.php?page=login_error";
		}
		if ($level == "2"){
			$url = "index.php?page=admin";
		}
		if ($level == "1"){
			$url = "index.php";
		}
		if ($level == "0"){
			$url = "index.php";
		}
		header("Location: $url");
	break;
	
	//pagina di logout
	case "logout":
		setcookie("sid_user","");
		setcookie("sid_pass","");
		setcookie("sid_name","");
		header("Location: index.php");
	break;
	
	//pagina di errore di login
	case "login_error":
		include("theme/$home.error.theme.php");
	break;
	
	//pagina admin
	case "admin":
		$user = $_COOKIE['sid_user'];
		$pass = $_COOKIE['sid_pass'];
		$return = mysql_query("SELECT * FROM Account WHERE user = '$user' AND pass = '$pass' AND lvl = 2");
		$num = mysql_num_rows($return);
		if ($num == "1"){
			include("theme/admin.theme.php");
		}else{
			header("Location: index.php");
		}
	break;
	
	//pagna delle statistiche 
	case "stat":
		include("theme/stat.theme.php");
	break;
	
	//pagina dell'errore del sopraccarico 
	case "error":
		header('HTTP/1.1 503 Service Temporarily Unavailable');
		require_once("theme/overload.theme.php");
	break;
	
	//modifica scheda personale
	case "mod":
		$user = $_COOKIE['sid_user'];
		$pass = $_COOKIE['sid_pass'];
		$return = mysql_query("SELECT * FROM Account WHERE user = '$user' AND pass = '$pass'$limit");
		$num = mysql_num_rows($return);
		if ($num == "1"){
			$id = $_COOKIE['sid_id'];
			$is = json_decode($_GET['i']);
			$giorno = $_GET['g'];
			$max = json_decode($_GET['m']);
			$r = array();
			for ($i = 0; $i < count($is); $i++) {
				$key = $i;
				$value = $is[$i];
				if ($value != "100"){
					if ($value == "99"){
						if (!mysql_query("DELETE FROM Iscritti$giorno WHERE user = '$id' AND turno = '$key'")){
							$r[$key] = "0";
						}else{
							$r[$key] = "1";
						}
					}else{
						if (mysql_num_rows(mysql_query("SELECT * FROM Iscritti$giorno WHERE id_forum = '$value'")) <= $max[$key]){
							if (!mysql_query("REPLACE INTO Iscritti$giorno SET user = '$id', turno = '$key', id_forum = '$value'")){
								$r[$key] = "0";
							} else {
								$r[$key] = "1";
							}
						}else{
							$r[$key] = "0";
						}
					}
				}else{
					$r[$key] = "1";
				}
			}
			echo mysql_error();
			echo json_encode($r);
		}else{
			header("Location: index.php");
		}
	break;
	
	case "confirm":
		$id = $_GET['id'];
		$return = mysql_query("SELECT * FROM Account WHERE id = '$id'");
		while ($row = mysql_fetch_array($return)){
			$lvl = $row['lvl'];
		}
		if ($lvl == "2"){
			$r = "ok";
		}else{
			$return = mysql_query("UPDATE Account SET lvl = 1 WHERE id = '$id'");
			if (!$return){
				$r = "error";
			}else{
				$r = "ok";
			}
		}
		echo $r;
	break;
	
	//pagine di forum disponibili in quel momento 
	case "forum":
		$turno = $_POST['t'];
		$giorno = $_POST['g'];
		$classe = $_POST['c'];
		switch ($classe){
			case "3cA":
				$all = " ";
			break;
			case "3cB":
				$all = " ";
			break;
			case "5A":
				$all = " ";
			break;
			case "5B":
				$all = " ";
			break;
			case "5C":
				$all = " ";
			break;
			case "5D":
				$all = " ";
			break;
			case "5E":
				$all = " ";
			break;
			case "5F":
				$all = " ";
			break;
			case "5G":
				$all = " ";
			break;
			default:
				$all = " AND `all` = 1";
		}
		$return = mysql_query("SELECT * FROM Giorno$giorno WHERE turno = '$turno'$limit");
		$r = array();
		while ( $row = mysql_fetch_array($return, MYSQL_ASSOC)){
			$r[$row['id']] = $row;
		}
		mysql_free_result($return);
		$return = mysql_query("SELECT COUNT(*) AS `real`, `id_forum` FROM `Iscritti$giorno` GROUP BY `id_forum` ORDER BY `id_forum`");
		while ( $row = mysql_fetch_array($return, MYSQL_ASSOC)){
			if ( $row['real'] <= $r[$row['id']]['max']){
				unset($r[$row['id']]);
			}
		}
		echo json_encode($r);
	break;
	
	//pagina di homepage
	default:
		$user = $_COOKIE['sid_user'];
		$pass = $_COOKIE['sid_pass'];
		$result = mysql_query("SELECT * FROM Account WHERE user = '$user' AND pass = '$pass'$limit");
		$num = mysql_num_rows($result);
		while ($row = mysql_fetch_array($result)){
			$level = $row['lvl'];
		}
		if ($num == "1"){
			if ($level == "1"){
				include("theme/user1.theme.php");
			}else{
				include("theme/user.theme.php");
			}
		}else{
			include("theme/$home.theme.php");
		}
}
if ($page != "error"){mysql_close($con);}
?>