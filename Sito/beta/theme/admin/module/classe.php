<?php
	if ($_GET['classe'] != ""){
		$classe = $_GET['classe'];
		$member = array();
		$return = mysql_query("SELECT *  FROM `Account` WHERE `classe` = '$classe'");
		while($row = mysql_fetch_array($return)){
			$tmp = array();
			$tmp['name'] = $row['name'];
			$tmp['id'] = $row['id'];
			$member[$row['id']] = $tmp;
		}
		$giorno = $_GET['g'];
		foreach($member as $value){
			$return = mysql_query("SELECT * FROM Iscritti$giorno WHERE user = ".$value['id']);
			while($row = mysql_fetch_array($return)){
				$member[$row['user']][$row['turno']] = $row['id_forum'];
			}
		}
		
		$classi = array();
		$return = mysql_query("SELECT * FROM Classi$giorno");
		while($row = mysql_fetch_array($return)){
			$classi[$row['id']] = " - ".$row['classe'];
		}
		
		$list_forum = array();
		$return = mysql_query("SELECT * FROM Giorno$giorno");
		while($row = mysql_fetch_array($return)){
			$list_forum[$row['id']] = $row['name'];
		}
		$list_forum['97'] = "UmVsYXRvcmU=";
		$list_forum['98'] = "QXNzZW50ZQ==";
		$list_forum['96'] = "U2VjdXJpdHk=";
		?>
		<table border="1">
				<tr>
					<td>Nome e Cognome</td>
					<td>Un solo turno</td>
					<td>Primo turno</td>
					<td>Secondo turno</td>
				</tr>
				<?php
					foreach($member as $value){
						?>
						<tr>
					<td><a href="index.php?page=admin&w=user&id=<?php echo $value['id']; ?>&name=<?php echo base64_encode($value['name']); ?>"><?php echo $value['name']; ?></a></td>
					<td><?php echo base64_decode($list_forum[$value[0]]); ?><?php echo $classi[$value[0]];?></td>
					<td><?php echo base64_decode($list_forum[$value[1]]); ?><?php echo $classi[$value[1]];?></td>
					<td><?php echo base64_decode($list_forum[$value[2]]); ?><?php echo $classi[$value[2]];?></td>
				</tr>
						<?php
					}
				?>
			</table>
		<?php
		
		exit();
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
			var attuale = 1;
				function get(giorno,g){
					attuale = giorno;
					var xmlhttp;
					if (window.XMLHttpRequest){
						xmlhttp=new XMLHttpRequest();
					}else{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							document.getElementById("div_classi").innerHTML=xmlhttp.responseText;
							document.getElementById("giorno1").style.display = "block";
						}
					}
					xmlhttp.open("GET","http://studenti.liceoblaisepascal.it/beta/index.php?page=admin&w=classe&classe="+giorno+"&g="+g.toString(),true);
					xmlhttp.send();
			}
			</script>
			<h1 align="center">Didattica alternativa</h1>
			<h2 align="center">Forum per classi</h2>
			Seleziona la classe:<br />
			<select name = "f" onChange="get(this.options[this.selectedIndex].value,1);">
				<?php
					$return = mysql_query("SELECT COUNT(*) AS `Righe`, `classe` FROM `Account` GROUP BY `classe` ORDER BY `classe`");
					while($row = mysql_fetch_array($return)){
						?>
						<option value="<?php echo $row['classe'];?>"><?php echo $row['classe'];?></option>
						<?php
					}
				?>
			</select>
			<div id = "giorno1" style = "display: none;">
				Visualizza: <input type="button" value="Primo Giorno" onclick="get(attuale,1);"> | <input type="button" value="Secondo Giorno" onclick="get(attuale,2);"> | <input type="button" value="Terzo Giorno" onclick="get(attuale,3);">
			</div>
			<div id = "div_classi"><b><i>Scegli prima la classe per avere la lista degli iscritti</i></b></div>
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