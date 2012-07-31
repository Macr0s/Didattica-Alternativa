<?php
	$what = $_GET['id'];
	$g = $_GET['g'];
	$t = $_GET['t'];
	$name2 = $_GET['name'];
	$return = mysql_query("SELECT * FROM Account");
	$name = array();
	while($row = mysql_fetch_array($return)){
		$name[$row['id']] = $row['name'];
	}
	$return = mysql_query("SELECT * FROM Classi$g WHERE id = $what");
	while($row = mysql_fetch_array($return)){
		$classe = $row['classe'];
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
			<h2 align="center"><?php echo base64_decode($name2);?> - <?php echo $classe; ?> (<?php
			switch ($g){
				case "1":
					echo "primo giorno";
				break;
				case "2":
					echo "secondo giorno";
				break;
				case "3":
					echo "terzo giorno";
				break;
			}
			?> - <?php
			switch ($t){
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
			?>)</h2>
			<ul>
				<?php
					$return = mysql_query("SELECT user FROM Iscritti$g WHERE id_forum = $what");
					echo mysql_error();
					while($row = mysql_fetch_array($return)){
						?>
						<li><?php echo $name[$row['user']]?></li>
						<?php
					}
				?>
			</ul>

			<br />
			<br />
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