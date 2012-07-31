<?php
$fun = $_GET["fun"];

switch($fun){
	case "mod":
		$id = $_GET['sid_id'];
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
		echo json_encode($r);
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
	
	
	//pagina di homepage
	default:
		include("mod_user.theme.php");
}
?>