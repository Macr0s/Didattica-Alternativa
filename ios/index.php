<?php
$date = date("j");
switch ($date){
	case 21: //secondo giorno
		$n=2;
	break;
	case 22: //terzo giorno
		$n=3;
	break;
	default: //primo giorno
		$n=1;
}
?>
<!DOCTYPE html>
<?php
//<html manifest="app.php">
?>
<html>
<head>
<title>iSid</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="icon" type="image/png" href="iui/iui-favicon.png">
<link rel="apple-touch-icon" href="iui/iui-logo-touch-icon.png" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="stylesheet" href="iui/iui.css" type="text/css" />
<link rel="stylesheet" title="Default" href="iui/t/ipdc/ipdc-theme.css" type="text/css"/>
<link rel="stylesheet" href="css/iui-panel-list.css" type="text/css" />
<script type="application/x-javascript" src="iui/iui.js"></script>
<script type="application/x-javascript" src="js/base64.js"></script>
<script type="application/x-javascript" src="js/JSON.js"></script>
<script type="application/x-javascript" src="js/sgrigol.js"></script>
<link rel="apple-touch-startup-image" href="startup.png">
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
</head>
<body onLoad="init();">
<style type="text/css">
.panel p.normalText { text-align: left;  padding: 0 10px 0 10px; }
  </style>
<div class="toolbar">
	<h1 id="pageTitle"></h1>
	<a id="backButton" class="button" href="#"></a>
	<a class="button" href="cerca.php">Ricerca</a>
</div>

<ul id="home" title="iSid" selected="true">
	<li class="group">Funzioni</li>
	<li><a href="cerca.php">Ricerca Persone</a></li>
	<li><a href="#assenze">Assenze</a></li>
	<li class="group">Sistema</li>
	<li>Stato: <span id = "status">Pronto</span></li>
	<li>Stato di Internet: <span id = "online1"></span></li>
	<li><a href="#version">Versione: 0.7</a></li>
</ul>


<ul id="version" title="ChangeLog">
	<li class="group">0.7</li>
	<li>Funzione cerca funzionante completamente</li>
	<li class="group">0.7beta1</li>
	<li>Aggiunta compatibilità con altri browser</li>
	<li class="group">0.6beta2</li>
	<li>Sync Database function</li>
	<li class="group">0.6beta1</li>
	<li>Bug fix errore database 5</li>
	<li>Set up motore php</li>
	<li>Definizione Ajax</li>
	<li>Set up Pagina di ricerca, risultati e dettagli</li>
	<li>Riscritto pagina Impostazione</li>
	<li class="group">0.6alpha</li>
	<li>Inserimento funzione list_forum per definire la lista generale dei forum</li>
	<li>|-> Test di funzionamento: OK</li>
	<li>Inserimento funzione list_iscritti per definire la visualizzazione degli iscritti dei singoli forum</li>
	<li>|-> Test di funzionamento</li>
	<li class="group">0.5</li>
	<li>Definizione grafica di base</li>
</ul>

<?php
	$con = mysql_connect("localhost","stud_10723","MX5vHH88");
	mysql_select_db("stud_liceoblaisepascal_it", $con);
	
	$return = mysql_query("SELECT * FROM Account");
	$name = array();
	while ($row = mysql_fetch_array($return)){
		$name[$row['id']] = $row;
	}
	
	$return = mysql_query("SELECT * FROM Giorno$n ");
	$forum = array();
	while ($row = mysql_fetch_array($return)){
		$forum[$row['turno']][]=$row;
	}
	
	if (count($forum[0]) == "0"){
		?>
<div id="turno0" title="Assenza" class="panel">
	<h2>Unico Turno</h2>
	<fieldset>
		<p class="normalText">Nessun Forum</p>
	</fieldset>
</div>

		<?php
	}else{
		?>
<div id="turno0" title="Assenza" class="panel">
	<h2>Unico Turno</h2>
	<ul>
		<?php
			foreach ($forum[0] as $value){
				$id = $value['id'];
				$name2 = base64_decode($value['name']);
				echo "<li><a href='#forum$id'>$name2</a></li>";
			}
		?>
	</ul>
</div>
		<?php
		foreach ($forum[0] as $value){
			?>
<div id="forum<? echo $value['id'];?>" title="<? echo base64_decode($value['name']);?>" class="panel">
	<h2><? echo base64_decode($value['name']);?></h2>
	<ul>
			<?php
				$id = $value['id'];
				$return = mysql_query("SELECT * FROM Iscritti$n WHERE id_forum = '$id'");
				while($row = mysql_fetch_array($return)){
					?>
			<li><div class="row">
                <label><?php echo $name[$row['user']]['name']; ?></label>
                <div class="toggle" onclick="" toggled="false"><span class="thumb"></span><span class="toggleOn">S</span><span class="toggleOff">N</span></div>
            </div></li>
					<?php
				}
			?>
    </ul>
</div>
			<?php
		}
	}
	
	if (count($forum[1]) == "0"){
		?>
<div id="turno1" title="Assenza" class="panel">
	<h2>Primo Turno</h2>
	<fieldset>
		<p class="normalText">Nessun Forum</p>
	</fieldset>
</div>

		<?php
	}else{
		?>
<div id="turno1" title="Assenza" class="panel">
	<h2>Primo Turno</h2>
	<ul>
		<?php
			foreach ($forum[1] as $value){
				$id = $value['id'];
				$name2 = base64_decode($value['name']);
				echo "<li><a href='#forum$id'>$name2</a></li>";
			}
		?>
	</ul>
</div>
		<?php
		foreach ($forum[1] as $value){
			?>
			<div id="forum<? echo $value['id'];?>" title="<? echo base64_decode($value['name']);?>" class="panel">
	<h2><? echo base64_decode($value['name']);?></h2>
	<ul>
			<?php
				$id = $value['id'];
				$return = mysql_query("SELECT * FROM Iscritti$n WHERE id_forum = '$id'");
				while($row = mysql_fetch_array($return)){
					?>
			<li><div class="row">
                <label><?php echo $name[$row['user']]['name']; ?></label>
                <div class="toggle" onclick="" toggled="false"><span class="thumb"></span><span class="toggleOn">S</span><span class="toggleOff">N</span></div>
            </div></li>
					<?php
				}
			?>
    </ul>
</div>
			<?php
		}
	}
	
	if (count($forum[2]) == "0"){
		?>
<div id="turno2" title="Assenza" class="panel">
	<h2>Unico Turno</h2>
	<fieldset>
		<p class="normalText">Nessun Forum</p>
	</fieldset>
</div>

		<?php
	}else{
		?>
<div id="turno2" title="Assenza" class="panel">
	<h2>Secondo Turno</h2>
	<ul>
		<?php
			foreach ($forum[2] as $value){
				$id = $value['id'];
				$name2 = base64_decode($value['name']);
				echo "<li><a href='#forum$id'>$name2</a></li>";
			}
		?>
	</ul>
</div>
		<?php
		foreach ($forum[2] as $value){
			?>
			<div id="forum<? echo $value['id'];?>" title="<? echo base64_decode($value['name']);?>" class="panel">
	<h2><? echo base64_decode($value['name']);?></h2>
	<ul>
			<?php
				$id = $value['id'];
				$return = mysql_query("SELECT * FROM Iscritti$n WHERE id_forum = '$id'");
				while($row = mysql_fetch_array($return)){
					?>
			<li><div class="row">
                <label><?php echo $name[$row['user']]['name']; ?></label>
                <div class="toggle" onclick="" toggled="false"><span class="thumb"></span><span class="toggleOn">S</span><span class="toggleOff">N</span></div>
            </div></li>
					<?php
				}
			?>
    </ul>
</div>
			<?php
		}
	}
?>

</body>
</html>