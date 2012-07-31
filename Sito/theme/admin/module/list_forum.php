<?php
	if ($_GET['presenza'] != ""){
		$presenza = explode("|",$_GET['presenza']);
		$id = $presenza[0];
		$value = $presenza[1];
		$giorno = $presenza[2];
		$key = $presenza[3];
		if (mysql_query("REPLACE INTO Presenza$giorno SET user = '$id', turno = '$key', id_forum = '$value'") != false){
			echo "ok"; 
		}else{
			echo mysql_error(); 
		}
		exit();
	}
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
			<script type="text/javascript">
				function presente(w){
					var xmlhttp;
					if (window.XMLHttpRequest){
						xmlhttp=new XMLHttpRequest();
					}else{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							document.getElementById(w).innerHTML=xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","http://studenti.liceoblaisepascal.it/index.php?page=admin&w=list_forum&presenza="+w,true);
					xmlhttp.send();
			}
			</script>
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
					$return = mysql_query("SELECT * FROM Iscritti$g WHERE id_forum = $what");
					echo mysql_error();
					while($row = mysql_fetch_array($return)){
						
						?>
						<li><?php echo $name[$row['user']]?> 
						<?php
						if ($t != 0){
						$presenza = $row['user']."|".$row['id_forum']."|".$g."|".$t;
						?>
						<input type="button" value="Sono presente" onclick="presente('<?php echo $presenza; ?>')" /><span id = "<?php echo $presenza; ?>"></span>
						<?php
						}else{
							$presenza1 = $row['user']."|".$row['id_forum']."|".$g."|1";
							$presenza2 = $row['user']."|".$row['id_forum']."|".$g."|2";
							?>
						<input type="button" value="Sono presente prima della ricreazione" onclick="presente('<?php echo $presenza1; ?>')" /><span id = "<?php echo $presenza1; ?>"></span>
						<input type="button" value="Sono presente dopo la ricreazione" onclick="presente('<?php echo $presenza2; ?>')" /><span id = "<?php echo $presenza2; ?>"></span>
						<?php
						}
						?>
						</li>
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