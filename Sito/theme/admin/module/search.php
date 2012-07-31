<?php
	function cerca($nome, $cognome){
		$sql = "SELECT * FROM Account WHERE name LIKE '%$cognome%' AND name LIKE '%$nome%' LIMIT 0 , 30";
		$r = array();
		$return = mysql_query($sql);
		while($row = mysql_fetch_array($return)){
			$r[] = $row; 
		}
		return $r;
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
			<h2 align="center">Ricerca Ragazzi</h2>
			
			<form action="index.php?page=admin&w=search" method="POST">
				Cognome: <input type="text" name="cognome" /><br />
				Nome: <input type="text" name="nome" /><br />
				<input type="submit" value="Cerca">
			</form>
			<br />
			<div>
				<?php 
					if ($_POST['cognome'] != "" ||  $_POST['nome'] != ""){
						$r = cerca($_POST['nome'],$_POST['cognome']);
				?>
					Ecco i risultati: <br />
					<ol>
				<?php
						foreach($r as $value){
						?>
						<li><a href="index.php?page=admin&w=user&id=<?php echo $value['id']; ?>&name=<?php echo base64_encode($value['name']); ?>"><?php echo $value['name']; ?> (<?php echo $value['classe']?>)</a>  <a href="index.php?page=admin&w=mod_user&sid_id=<?php echo $value['id']; ?>&sid_classe=<?php echo $value['classe']?>&name=<?php echo $value['name']; ?>">(Modifica)</a></li>
						<?php
						}
						?>
						</ol>
						<?php
					}
				?>
			</div>
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