<?php
	$num = array();
	$iscritti = array();
	$forum = array();
	$forum[1] = array();
	$forum[2] = array();
	$forum[3] = array();
	$return =  mysql_query("SELECT * FROM Giorno1");
	$num[1] = mysql_num_rows($return);
	while($row  = mysql_fetch_array($return)){
		$forum[1][$row['id']]= $row;
	}
	
	$return =  mysql_query("SELECT * FROM Giorno2");
	$num[2] = mysql_num_rows($return);
	$forum[2][0] = array();
	$forum[2][1] = array();
	$forum[2][2] = array();
	while($row  = mysql_fetch_array($return)){
		$forum[2][$row['id']]= $row;
	}
	$return =  mysql_query("SELECT * FROM Giorno3");
	$num[3] = mysql_num_rows($return);
	$forum[3][0] = array();
	$forum[3][1] = array();
	$forum[3][2] = array();
	while($row  = mysql_fetch_array($return)){
		$forum[1][$row['id']] = $row;
	}
	
	$return = mysql_query("SELECT COUNT(id_forum) AS num, id_forum FROM Iscritti1 GROUP BY id_forum");
	$iscritti[1] = mysql_num_rows($return);
	while ($row = mysql_fetch_array($return)){
		$forum[1][$row['id_forum']]['real'] = $row['num'];
	}
	
	$return = mysql_query("SELECT COUNT(id_forum) AS num, id_forum FROM Iscritti2 GROUP BY id_forum");
	$iscritti[2] = mysql_num_rows($return);
	while ($row = mysql_fetch_array($return)){
		$forum[2][$row['id_forum']]['real'] = $row['num'];
	}
	
	$return = mysql_query("SELECT COUNT(id_forum) AS num, id_forum FROM Iscritti3 GROUP BY id_forum");
	$iscritti[3] = mysql_num_rows($return);
	while ($row = mysql_fetch_array($return)){
		$forum[3][$row['id_forum']]['real'] = $row['num'];
	}
	
	$final = array();
	$final[1] = array();
	$final[1][0] = array();
	$final[1][1] = array();
	$final[1][2] = array();
	$final[2] = array();
	$final[2][0] = array();
	$final[2][1] = array();
	$final[2][2] = array();
	$final[3] = array();
	$final[3][0] = array();
	$final[3][1] = array();
	$final[3][2] = array();
	
	foreach($forum[1] as $value){
		$final[1][$value['turno']][$value['id']] = $value;
	}
	
	foreach($forum[2] as $value){
		$final[2][$value['turno']][$value['id']] = $value;
	}
	
	foreach($forum[3] as $value){
		$final[3][$value['turno']][$value['id']] = $value;
	}
	
	unset($forum);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	
	<head>
		<title>Didattica alternativa</title>
		<meta http-equiv="Content-type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<div id="box"><center>
			<h1 align="center">Didattica alternativa</h1>
			<h2 align="center">Numero Iscritti per forum in tempo reale</h2>
			
			<b>Forum del primo giorno</b>
			Turno unico <br />
			<?php
				foreach ($forum[1][0] as $value){
					echo base64_decode($value['name']);
					echo " : ";
					echo $value['real'];
					echo "<br />";
				}
			?>
			Primo e secondo turno <br />
			<?php
				foreach ($forum[1][1] as $value){
					echo base64_decode($value['name']);
					echo " : ";
					echo $value['real'];
					echo "<br />";
				}
			?>
			<br />
			<br />
			<hr width="90%" />
			<table width="90%" align="center">
				<tr><td><i> Sviluppato da <b>Matteo Filippi</b> con il supporto del <b>Professore Mammoliti</b><br />La BCON ha offerto la piattaforma di hosting</i></td></tr>
			</table>
			<div style="width: 700px; margin-left: auto; margin-right: auto; text-align: center;">
				<img src="./cloud.jpg" align = "center" WIDTH="50" HEIGHT="50">
			</div>
		</center></div>
		</div>
	</body>
	
</html>