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
				function get(giorno,g){
					t = giorno.split(',');
					document.getElementById("forum"+g).innerHTML = '<a href="index.php?page=admin&w=list_forum&id='+t[0]+'&name='+t[1]+'&g='+g+'&t='+t[2]+'" target="_blank">Visualizza gli iscritti</a>';
				}
			</script>
			<h1 align="center">Didattica alternativa</h1>
			<h2 align="center">Iscritti per forum</h2>
			<br />
			<h3 align="center">Primo giorno</h3>
			<select name = "f1" onChange="get(this.options[this.selectedIndex].value,1);">
				<?php
					$return = mysql_query("SELECT * FROM Giorno1");
					while($row = mysql_fetch_array($return)){
						?>
						<option value="<?php echo $row['id'];?>,<?php echo $row['name']; ?>,<?php echo $row['turno']; ?>"><?php echo base64_decode($row['name']);?>(<?php
						switch($row['turno']){
							case "0":
								echo "unico turno";
							break;
							case "1":
								echo "primo turno";
							break;
							case "2":
								echo "secondo turno";
							break;
						}
						?>)</option>
						<?php
					}
				?>
			</select>
			<br />
			<div id="forum1">
			
			</div>
			<br />
			<h3 align="center">Secondo giorno</h3>
			<select name = "f2" onChange="get(this.options[this.selectedIndex].value,2);">
				<?php
					$return = mysql_query("SELECT * FROM Giorno2");
					while($row = mysql_fetch_array($return)){
						?>
						<option value="<?php echo $row['id'];?>,<?php echo $row['name']; ?>,<?php echo $row['turno']; ?>"><?php echo base64_decode($row['name']);?>(<?php
						switch($row['turno']){
							case "0":
								echo "unico turno";
							break;
							case "1":
								echo "primo turno";
							break;
							case "2":
								echo "secondo turno";
							break;
						}
						?>)</option>
						<?php
					}
				?>
			</select>
			<br />
			<div id="forum2"></div>
			<br />
			<h3 align="center">Terzo giorno</h3>
			<select name = "f3" onChange="get(this.options[this.selectedIndex].value,3);">
				<?php
					$return = mysql_query("SELECT * FROM Giorno3");
					while($row = mysql_fetch_array($return)){
						?>
						<option value="<?php echo $row['id'];?>,<?php echo $row['name']; ?>,<?php echo $row['turno']; ?>"><?php echo base64_decode($row['name']);?>(<?php
						switch($row['turno']){
							case "0":
								echo "unico turno";
							break;
							case "1":
								echo "primo turno";
							break;
							case "2":
								echo "secondo turno";
							break;
						}
						?>)</option>
						<?php
					}
				?>
			</select>
			<br />
			<div id="forum3">
			
			</div>
			<br />
			<br />
			<a href="javascript:history.back()">Torna indietro</a>
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