<?php
	if ($_GET['id'] == ""){
		header("location: index.php?page=admin&w=search");
		exit();
	}
	$id = $_GET['id'];
	$r1 = array();
	$r2 = array();
	$r3 = array();
	
	$return = mysql_query("SELECT * FROM Iscritti1 WHERE user = '$id'");
	while($row = mysql_fetch_array($return)){
		$r1[] = $row;
	}
	$return = mysql_query("SELECT * FROM Iscritti2 WHERE user = '$id'");
	while($row = mysql_fetch_array($return)){
		$r2[] = $row;
	}
	$return = mysql_query("SELECT * FROM Iscritti3 WHERE user = '$id'");
	while($row = mysql_fetch_array($return)){
		$r3[] = $row;
	}
	
	$f1 = array();
	$f2 = array();
	$f3 = array();
	
	$return = mysql_query("SELECT * FROM Giorno1");
	while($row = mysql_fetch_array($return)){
		$f1[$row['id']] = $row['name'];
	}
	$f1['97'] = "UmVsYXRvcmU=";
	$f1['98'] = "QXNzZW50ZQ==";
	$f1['96'] = "U2VjdXJpdHk=";
	
	$return = mysql_query("SELECT * FROM Giorno2");
	while($row = mysql_fetch_array($return)){
		$f2[$row['id']] = $row['name'];
	}
	$f2['97'] = "UmVsYXRvcmU=";
	$f2['98'] = "QXNzZW50ZQ==";
	$f2['96'] = "U2VjdXJpdHk=";
	
	$return = mysql_query("SELECT * FROM Giorno3");
	while($row = mysql_fetch_array($return)){
		$f3[$row['id']] = $row['name'];
	}
	$f3['97'] = "UmVsYXRvcmU=";
	$f3['98'] = "QXNzZW50ZQ==";
	$f3['96'] = "U2VjdXJpdHk=";
	
	$classi = array();
	$classi[1] = array();
	$classi[2] = array();
	$classi[3] = array();
	$return = mysql_query("SELECT * FROM Classi1");
	while($row = mysql_fetch_array($return)){
		$classi[1][$row['id']] = " - ".$row['classe'];
	}
	$return = mysql_query("SELECT * FROM Classi2");
	while($row = mysql_fetch_array($return)){
		$classi[2][$row['id']] = " - ".$row['classe'];
	}
	$return = mysql_query("SELECT * FROM Classi3");
	while($row = mysql_fetch_array($return)){
		$classi[3][$row['id']] = " - ".$row['classe'];
	}
	
	$relatori = array();
	$relatori[1] = array();
	$relatori[2] = array();
	$relatori[3] = array();
	$return = mysql_query("SELECT * FROM Relatori1");
	while($row = mysql_fetch_array($return)){
		$relatori[1][$row['user']] = $f1[$row['id_forum']];
	}
	$return = mysql_query("SELECT * FROM Relatori2");
	while($row = mysql_fetch_array($return)){
		$relatori[2][$row['user']] = $f2[$row['id_forum']];
	}
	$return = mysql_query("SELECT * FROM Relatori3");
	while($row = mysql_fetch_array($return)){
		$relatori[3][$row['user']] = $f3[$row['id_forum']];
	}
	
	$presenze = array();
	$presenze[1] = array();
	$presenze[2] = array();
	$presenze[3] = array();
	$return = mysql_query("SELECT * FROM Presenza1 WHERE user = $id");
	while($row = mysql_fetch_array($return)){
		$presenze[1][$row['turno']] = $row['id_forum'];
	}
	$return = mysql_query("SELECT * FROM Presenza2 WHERE user = $id");
	while($row = mysql_fetch_array($return)){
		$presenze[2][$row['turno']] = $row['id_forum'];
	}
	$return = mysql_query("SELECT * FROM Presenza3 WHERE user = $id");
	while($row = mysql_fetch_array($return)){
		$presenze[3][$row['turno']] = $row['id_forum'];
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
			<h2 align="center"><?php echo base64_decode($_GET['name']); ?></h2>
			<h2 align="center">Scheda personale</h2>
			
			<dl>
				<dt>Primo Giorno</dt>
					<?php
						if (count($r1) == "0"){
							?>
							<dd>Nessun Forum</dd>
							<?php
						}else{
							foreach($r1 as $value){
								if($value['turno'] == "0"){
									?>
									<dd><b>Un solo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if (count($presenze[1]) == "2" && $presenze[1][1] == $presenze[1][2] && $presenze[1][1] == $value['id_forum']){
												echo "Presente";
											}else{
												switch ($value['id_forum']){
													case $presenze[1][1]:
														echo "Presente solo prima della ricreazione";
													break;
												case $presenze[1][2]:
													echo "Presente solo dopo della ricreazione";
												break;
												default:
													echo "Non presente";
												}
											}
											echo " in ";
										}
										echo base64_decode($f1[$value['id_forum']]); echo $classi[1][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[1][$id]);
										}
									?></dd>
									<?php
								}
								if($value['turno'] == "1"){
									?>
									<dd><b>Primo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if ($presenze[1][1] == $value['id_forum']){
												echo "Presente";
											}else{
												echo "Non presente";
											}
											echo " in ";
										}
										echo base64_decode($f1[$value['id_forum']]); echo $classi[1][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[1][$id]);
										}	
									?></dd>
									<?php
								}
								if($value['turno'] == "2"){
									?>
									<dd><b>Secondo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if ($presenze[1][2] == $value['id_forum']){
												echo "Presente";
											}else{
												echo "Non presente";
											}
											echo " in ";
										}
										echo base64_decode($f1[$value['id_forum']]); echo $classi[1][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[1][$id]);
										}
									?></dd>
									<?php
								}
							}
						}
					?>
			</dl>
			<dl>
				<dt>Secondo Giorno</dt>
					<?php
						if (count($r2) == "0"){
							?>
							<dd>Nessun Forum</dd>
							<?php
						}else{
							foreach($r2 as $value){
								if($value['turno'] == "0"){
									?>
									<dd><b>Un solo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if (count($presenze[2]) == "2" && $presenze[2][1] == $presenze[2][2] && $presenze[2][1] == $value['id_forum']){
												echo "Presente";
											}else{
												switch ($value['id_forum']){
													case $presenze[2][1]:
														echo "Presente solo prima della ricreazione";
													break;
													case $presenze[2][2]:
														echo "Presente solo dopo della ricreazione";
													break;
													default:
														echo "Non presente";
												}
											}
											echo " in ";
										}
										echo base64_decode($f2[$value['id_forum']]); echo $classi[2][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[2][$id]);
										}
									?></dd>
									<?php
								}
								if($value['turno'] == "1"){
									?>
									<dd><b>Primo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if ($presenze[2][1] == $value['id_forum']){
												echo "Presente";
											}else{
												echo "Non presente";
											}
											echo " in ";
										}
										echo base64_decode($f2[$value['id_forum']]); echo $classi[2][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[2][$id]);
										}
									?></dd>
									<?php
								}
								if($value['turno'] == "2"){
									?>
									<dd><b>Secondo turno: </b><?php
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if ($presenze[2][2] == $value['id_forum']){
												echo "Presente";
											}else{
												echo "Non presente";
											}
											echo " in ";
										}									
										echo base64_decode($f2[$value['id_forum']]); echo $classi[2][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[2][$id]);
										}
									?></dd>
									<?php
								}
							}
						}
					?>
			</dl>
			<dl>
				<dt>Terzo Giorno</dt>
					<?php
						if (count($r3) == "0"){
							?>
							<dd>Nessun Forum</dd>
							<?php
						}else{
							foreach($r3 as $value){
								if($value['turno'] == "0"){
									?>
									<dd><b>Un solo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if (count($presenze[3]) == "2" && $presenze[3][1] == $presenze[3][2] && $presenze[3][1] == $value['id_forum']){
												echo "Presente";
											}else{
												switch ($value['id_forum']){
													case $presenze[3][1]:
														echo "Presente solo prima della ricreazione";
													break;
												case $presenze[3][2]:
													echo "Presente solo dopo della ricreazione";
												break;
												default:
													echo "Non presente";
												}
											}
											echo " in ";
										}
										echo base64_decode($f3[$value['id_forum']]); echo $classi[3][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[3][$id]);
										}
										?></dd>
									<?php
								}
								if($value['turno'] == "1"){
									?>
									<dd><b>Primo turno: </b><?php
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if ($presenze[3][1] == $value['id_forum']){
												echo "Presente";
											}else{
												echo "Non presente";
											}
											echo " in ";
										}									
										echo base64_decode($f3[$value['id_forum']]); echo $classi[3][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[3][$id]);
										}
									?></dd>
									<?php
								}
								if($value['turno'] == "2"){
									?>
									<dd><b>Secondo turno: </b><?php 
										if ($value['id_forum'] != "" && $value['id_forum'] < 90){
											if ($presenze[3][2] == $value['id_forum']){
												echo "Presente";
											}else{
												echo "Non presente";
											}
											echo " in ";
										}
										echo base64_decode($f3[$value['id_forum']]); echo $classi[3][$value['id_forum']];
										if ($value['id_forum'] == "97"){
											echo " in ";
											echo base64_decode($relatori[3][$id]);
										}
									?></dd>
									<?php
								}
							}
						}
					?>
			</dl>
			<br />
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
				<tr><td><i> Sviluppato da <b>Matteo Filippi</b> con il supporto del <b>Professore Mammoliti</b><br />La BCON ha offerto la piattaforma di hosting</i></td></tr>
			</table>
			<div style="width: 700px; margin-left: auto; margin-right: auto; text-align: center;">
				<img src="./cloud.jpg" align = "center" WIDTH="50" HEIGHT="50">
			</div>
		</center></div>
		</div>
	</body>
	
</html>