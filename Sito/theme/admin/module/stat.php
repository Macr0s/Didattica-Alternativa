<?php

	$name = array();
	$return = mysql_query("SELECT *  FROM Account");
	while($row = mysql_fetch_array($return)){
		$tmp = array();
		$tmp['name'] = $row['name'];
		$tmp['id'] = $row['id'];
		$tmp['classe'] = $row['classe'];
		$name[$row['id']] = $tmp;
	}
	
	$num = array();
	
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `turno` FROM `Iscritti1` GROUP BY `turno` ORDER BY `turno`");
	$num[1] = array();
	while($row = mysql_fetch_array($return)){
		$num[1][$row['turno']] = $row['Righe'];
	}
	
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `turno` FROM `Iscritti2` GROUP BY `turno` ORDER BY `turno`");
	$num[2] = array();
	while($row = mysql_fetch_array($return)){
		$num[2][$row['turno']] = $row['Righe'];
	}
	
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `turno` FROM `Iscritti3` GROUP BY `turno` ORDER BY `turno`");
	$num[3] = array();
	while($row = mysql_fetch_array($return)){
		$num[3][$row['turno']] = $row['Righe'];
	}
	
	$tmp = array();
	$num[4] = 1040;
	
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `user` FROM `Iscritti1` GROUP BY `user` ORDER BY `user`");
	while ($row = mysql_fetch_array($return)){
		if ($tmp[$row['user']] == ""){
			$tmp[$row['user']] = 1;
		}else{
			$tmp[$row['user']] = $tmp[$row['user']] + 1;
		}
	}
	
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `user` FROM `Iscritti2` GROUP BY `user` ORDER BY `user`");
	while ($row = mysql_fetch_array($return)){
		if ($tmp[$row['user']] == ""){
			$tmp[$row['user']] = 1;
		}else{
			$tmp[$row['user']] = $tmp[$row['user']] + 1;
		}
	}
	
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `user` FROM `Iscritti2` GROUP BY `user` ORDER BY `user`");
	while ($row = mysql_fetch_array($return)){
		if ($tmp[$row['user']] == ""){
			$tmp[$row['user']] = 1;
		}else{
			$tmp[$row['user']] = $tmp[$row['user']] + 1;
		}
	}
	
	foreach($tmp as $value){
		if ($value = "3"){
			$num[4] = $num[4] - 1;
		}
	}
	
	$num[5] = array();
	$num[5][97] = 0;
	$num[5][96] = 0;
	$num[5][98] = 0;
	$num[6] = array();
	$num[6][97] = 0;
	$num[6][96] = 0;
	$num[6][98] = 0;
	$num[7] = array();
	$num[7][97] = 0;
	$num[7][96] = 0;
	$num[7][98] = 0;
	
	$return = mysql_query("SELECT * FROM Iscritti1 WHERE id_forum = 97 OR id_forum = 96 OR id_forum = 98");
	while($row = mysql_fetch_array($return)){
		$num[5][$row['id_forum']] += 1;
	}
	
	$return = mysql_query("SELECT * FROM Iscritti2 WHERE id_forum = 97 OR id_forum = 96 OR id_forum = 98");
	while($row = mysql_fetch_array($return)){
		$num[6][$row['id_forum']] += 1;
	}
	
	$return = mysql_query("SELECT * FROM Iscritti3 WHERE id_forum = 97 OR id_forum = 96 OR id_forum = 98");
	while($row = mysql_fetch_array($return)){
		$num[7][$row['id_forum']] += 1;
	}
	
	$return = mysql_query("SELECT * FROM Account WHERE lvl = 1");
	$num[8] = mysql_num_rows($return) + 5;
	
	$return = mysql_query("SELECT * FROM Account WHERE lvl = 0");
	$num[9] = mysql_num_rows($return);
	
	$num[10] = array();
	$return = mysql_query("SELECT * FROM Giorno1");
	while($row = mysql_fetch_array($return)){
		$num[10][$row['id']] = array();
		$num[10][$row['id']]['name'] = $row['name'];
		$num[10][$row['id']]['turno'] = $row['turno'];
	}
	$num[10]['97']['name'] = "UmVsYXRvcmU=";
	$num[10]['98']['name'] = "QXNzZW50ZQ==";
	$num[10]['96']['name'] = "U2VjdXJpdHk=";
	$num[10]['97']['turno'] = 0;
	$num[10]['98']['turno'] = 0;
	$num[10]['96']['turno'] = 0;
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `id_forum` FROM `Iscritti1` GROUP BY `id_forum` ORDER BY `id_forum`");
	while($row = mysql_fetch_array($return)){
		$num[10][$row['id_forum']]['num'] = $row['Righe'];
	}
	
	$num[11] = array();
	$return = mysql_query("SELECT * FROM Giorno2");
	while($row = mysql_fetch_array($return)){
		$num[11][$row['id']] = array();
		$num[11][$row['id']]['name'] = $row['name'];
		$num[11][$row['id']]['turno'] = $row['turno'];
	}
	$num[11]['97']['name'] = "UmVsYXRvcmU=";
	$num[11]['98']['name'] = "QXNzZW50ZQ==";
	$num[11]['96']['name'] = "U2VjdXJpdHk=";
	$num[11]['97']['turno'] = 0;
	$num[11]['98']['turno'] = 0;
	$num[11]['96']['turno'] = 0;
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `id_forum` FROM `Iscritti2` GROUP BY `id_forum` ORDER BY `id_forum`");
	while($row = mysql_fetch_array($return)){
		$num[11][$row['id_forum']]['num'] = $row['Righe'];
	}
	
	$num[12] = array();
	$return = mysql_query("SELECT * FROM Giorno3");
	while($row = mysql_fetch_array($return)){
		$num[12][$row['id']] = array();
		$num[12][$row['id']]['name'] = $row['name'];
		$num[12][$row['id']]['turno'] = $row['turno'];
	}
	$num[12]['97']['name'] = "UmVsYXRvcmU=";
	$num[12]['98']['name'] = "QXNzZW50ZQ==";
	$num[12]['96']['name'] = "U2VjdXJpdHk=";
	$num[12]['97']['turno'] = 0;
	$num[12]['98']['turno'] = 0;
	$num[12]['96']['turno'] = 0;
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `id_forum` FROM `Iscritti3` GROUP BY `id_forum` ORDER BY `id_forum`");
	while($row = mysql_fetch_array($return)){
		$num[12][$row['id_forum']]['num'] = $row['Righe'];
	}
	
	$num[13] = array();
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `user` FROM `Iscritti1` WHERE turno = 2 OR turno = 1 GROUP BY `user` ORDER BY `Righe` ASC");
	while($row = mysql_fetch_array($return)){
		if ($row['Righe'] == "1"){
			$num[13][] = $row['user'];
		}
	}
	
	$num[14] = array();
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `user` FROM `Iscritti2` WHERE turno = 2 OR turno = 1 GROUP BY `user` ORDER BY `Righe` ASC");
	while($row = mysql_fetch_array($return)){
		if ($row['Righe'] == "1"){
			$num[14][] = $row['user'];
		}
	}
	
	$num[15] = array();
	$return = mysql_query("SELECT COUNT(*) AS `Righe`, `user` FROM `Iscritti3` WHERE turno = 2 OR turno = 1 GROUP BY `user` ORDER BY `Righe` ASC");
	while($row = mysql_fetch_array($return)){
		if ($row['Righe'] == "1"){
			$num[15][] = $row['user'];
		}
	}
	
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
			<h2 align="center">Statistiche:</h2>
			Nei vari turni le persone sono:
			<br /> 
			<table border="1">
				<tr>
					<td>Giorno</td>
					<td>Un solo turno</td>
					<td>Primo turno</td>
					<td>Secondo turno</td>
					<td>Totale</td>
				</tr>
				<tr>
					<td>Primo giorno</td>
					<td><?php echo $num[1][0]; ?></td>
					<td><?php echo $num[1][1]; ?></td>
					<td><?php echo $num[1][2]; ?></td>
					<td><?php echo $num[1][0]+$num[1][1]+$num[1][2];?></td>
				</tr>
				<tr>
					<td>Secondo giorno</td>
					<td><?php echo $num[2][0]; ?></td>
					<td><?php echo $num[2][1]; ?></td>
					<td><?php echo $num[2][2]; ?></td>
					<td><?php echo $num[2][0]+$num[2][1]+$num[2][2];?></td>
				</tr>
				<tr>
					<td>Terzo giorno</td>
					<td><?php echo $num[3][0]; ?></td>
					<td><?php echo $num[3][1]; ?></td>
					<td><?php echo $num[3][2]; ?></td>
					<td><?php echo $num[3][0]+$num[3][1]+$num[3][2];?></td>
				</tr>
			</table>
			<br />
			Nei turni unici di ogni giorno ci sono:
			<br /> 
			<table border="1">
				<tr>
					<td>Giorno</td>
					<td>Assenza</td>
					<td>Security</td>
					<td>Relatore</td>
					<td>Altro</td>
				</tr>
				<tr>
					<td>Primo giorno</td>
					<td><?php echo $num[5][98]; ?></td>
					<td><?php echo $num[5][96]; ?></td>
					<td><?php echo $num[5][97]; ?></td>
					<td><?php echo $num[1][0]-$num[5][97]-$num[5][96]-$num[5][98];?></td>
				</tr>
				<tr>
					<td>Secondo giorno</td>
					<td><?php echo $num[6][98]; ?></td>
					<td><?php echo $num[6][96]; ?></td>
					<td><?php echo $num[6][97]; ?></td>
					<td><?php echo $num[2][0]-$num[6][97]-$num[6][96]-$num[6][98];?></td>
				</tr>
				<tr>
					<td>Terzo giorno</td>
					<td><?php echo $num[7][98]; ?></td>
					<td><?php echo $num[7][96]; ?></td>
					<td><?php echo $num[7][97]; ?></td>
					<td><?php echo $num[3][0]-$num[7][97]-$num[7][96]-$num[7][98];?></td>
				</tr>
			</table>
			<br />
			Numero di persone che mancano ancora: <?php echo $num[4];?> ragazzi
			<br />
			Numero di persone che hanno confermato: <?php echo $num[8];?> ragazzi
			<br />
			Numero di persone che non hanno confermato: <?php echo $num[9];?> ragazzi
			<br />
			<br />
			Numero di ragazzi nel primo giorno diviso per forum:
			<br />
			<table border="1">
				<tr>
					<td>Nome</td>
					<td>Numero</td>
				</tr>
				<?php
					foreach($num[10] as $value){
					?>
				<tr>
					<td><?php echo base64_decode($value['name']);?> (<?
						switch ($value['turno']){
				case "1":
					echo "primo turno";
				break;
				case "2":
					echo "secondo turno";
				break;
				case "0":
					echo "unico turno";
				break;
			}
					?>)</td>
					<td><?php echo $value['num'];?></td>
				</tr>
					<?php
					}
				?>
			</table>
			<br />
			Numero di ragazzi nel secondo giorno diviso per forum:
			<br />
			<table border="1">
				<tr>
					<td>Nome</td>
					<td>Numero</td>
				</tr>
				<?php
					foreach($num[11] as $value){
					?>
				<tr>
					<td><?php echo base64_decode($value['name']);?> (<?
						switch ($value['turno']){
				case "1":
					echo "primo turno";
				break;
				case "2":
					echo "secondo turno";
				break;
				case "0":
					echo "unico turno";
				break;
			}
					?>)</td>
					<td><?php echo $value['num'];?></td>
				</tr>
					<?php
					}
				?>
			</table>
			<br />
			Numero di ragazzi nel terzo giorno diviso per forum:
			<br />
			<table border="1">
				<tr>
					<td>Nome</td>
					<td>Numero</td>
				</tr>
				<?php
					foreach($num[12] as $value){
					?>
				<tr>
					<td><?php echo base64_decode($value['name']);?> (<?
						switch ($value['turno']){
				case "1":
					echo "primo turno";
				break;
				case "2":
					echo "secondo turno";
				break;
				case "0":
					echo "unico turno";
				break;
			}
					?>)</td>
					<td><?php echo $value['num'];?></td>
				</tr>
					<?php
					}
				?>
			</table>
			<br />
			<br />
			I ragazzi che si sono iscritti ed hanno un problema nel primo giorno:
			<br />
			<?php
				if (count($num[13]) == "0"){
					echo "Nessun ragazzo ha un problema nel primo giorno<br />";
				}else{
			?>
			<ul>
			<?php
				foreach($num[13] as $value){
					?>
				<li><?php echo $name[$value]['name']; ?> <?php echo $name[$value]['classe']; ?> (<a href="index.php?page=admin&w=mod_user&sid_id=<?php echo $value; ?>&sid_classe=<?php echo $name[$value]['classe']?>&name=<?php echo $name[$value]['name']; ?>">Modifica</a> - <a href="index.php?page=admin&w=user&id=<?php echo $value; ?>&name=<?php echo base64_encode($name[$value]['name']); ?>">Visualizza</a>)</li>
					<?php
				}
			?>
			</ul>
			<?php
				}
			?>
			<br />
			I ragazzi che si sono iscritti ed hanno un problema nel secondo giorno:
			<br />
			<?php
				if (count($num[14]) == "0"){
					echo "Nessun ragazzo ha un problema nel secondo giorno<br />";
				}else{
			?>
			<ul>
			<?php
				foreach($num[14] as $value){
					?>
				<li><?php echo $name[$value]['name']; ?> <?php echo $name[$value]['classe']; ?> (<a href="index.php?page=admin&w=mod_user&sid_id=<?php echo $value; ?>&sid_classe=<?php echo $name[$value]['classe']?>&name=<?php echo $name[$value]['name']; ?>">Modifica</a> - <a href="index.php?page=admin&w=user&id=<?php echo $value; ?>&name=<?php echo base64_encode($name[$value]['name']); ?>">Visualizza</a>)</li>
					<?php
				}
			?>
			</ul>
			<?php
				}
			?>
			<br />
			I ragazzi che si sono iscritti ed hanno un problema nel terzo giorno:
			<br />
			<?php
				if (count($num[15]) == "0"){
					echo "Nessun ragazzo ha un problema nel terzo giorno<br />";
				}else{
			?>
			<ul>
			<?php
				foreach($num[15] as $value){
					?>
				<li><?php echo $name[$value]['name']; ?> <?php echo $name[$value]['classe']; ?> (<a href="index.php?page=admin&w=mod_user&sid_id=<?php echo $value; ?>&sid_classe=<?php echo $name[$value]['classe']?>&name=<?php echo $name[$value]['name']; ?>">Modifica</a> - <a href="index.php?page=admin&w=user&id=<?php echo $value; ?>&name=<?php echo base64_encode($name[$value]['name']); ?>">Visualizza</a>)</li>
					<?php
				}
			?>
			</ul>
			<?php
				}
			?>
			<br />
			<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15_giftop.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="contatore" ><script  type="text/javascript" >
try {Histats.startgif(1,1744357,4,10003,"div#histatsC {position: absolute;top:0px;left:0px;}body>div#histatsC {position: fixed;}");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><style type="text/css">div#histatsC {position: absolute;top:0px;left:0px;}body>div#histatsC {position: fixed;}</style>
<a href="http://www.histats.com" alt="contatore" target="_blank" ><div id="histatsC"><img border="0" src="http://s4is.histats.com/stats/i/1744357.gif?1744357&103"></div></a>
</noscript>
        <!-- Histats.com  END  -->
			<a href="javascript:history.back()">Torna indietro</a>
			<hr width="90%" />
			<table width="90%" align="center">
				<tr><td><i> Sviluppato da <b>Matteo Filippi</b> con il supporto del <b>Professore Mammoliti</b>
				<br />
				La BCON ha offerto la piattaforma di hosting
				<br />
				Pagina aggiornata il: <?php echo date("j/m/Y - H:i:s");?></i></td></tr>
			</table>
			<div style="width: 700px; margin-left: auto; margin-right: auto; text-align: center;">
				<img src="./cloud.jpg" align = "center" WIDTH="50" HEIGHT="50">
			</div>
		</center></div>
		</div>
	</body>
	
</html>