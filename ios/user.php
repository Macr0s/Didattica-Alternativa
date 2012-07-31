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
$con = mysql_connect("localhost","stud_10723","MX5vHH88");
		mysql_select_db("stud_liceoblaisepascal_it", $con);
		$id = $_GET['id'];
		$return = mysql_query("SELECT * FROM Iscritti$n WHERE user = $id");
		$r = array();
		while($row = mysql_fetch_array($return)){
			$r[$row['turno']] = $row['id_forum'];
		}
		$return = mysql_query("SELECT * FROM Giorno$n");
		$name = array();
		while($row = mysql_fetch_array($return)){
			$name[$row['id']] = $row['name'];
		}
		$name['97'] = "UmVsYXRvcmU=";
		$name['98'] = "QXNzZW50ZQ==";
		$name['96'] = "U2VjdXJpdHk=";
		$return = mysql_query("SELECT * FROM Classi$n");
		$classi = array();
		while($row = mysql_fetch_array($return)){
			$classi[$row['id']] = $row['classe'];
		}
	$return = mysql_query("SELECT * FROM Account WHERE id = $id");
	while($row = mysql_fetch_array($return)){
		$user = $row['name'];
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
</head>
<body onLoad="init();">
<style type="text/css">
.panel p.normalText { text-align: left;  padding: 0 10px 0 10px; }
  </style>

<div id="dettagli" title="<?php echo $user; ?>" class="panel" selected="true">
	<?php
		if ($r[0] != ""){
			?>
			<h2>Unico turno</h2>
	<fieldset>
		<p class="normalText"><?php echo base64_decode($name[$r[0]]);?></p>
		<p class="normalText"><?php echo $classi[$r[0]];?></p>
	</fieldset>
			<?php
		}
		if ($r[1] != ""){
			?>
			<h2>Primo turno</h2>
	<fieldset>
		<p class="normalText"><?php echo base64_decode($name[$r[1]]);?></p>
		<p class="normalText"><?php echo $classi[$r[1]];?></p>
	</fieldset>
			<?php
		}
		if ($r[2] != ""){
			?>
			<h2>Secondo turno</h2>
	<fieldset>
		<p class="normalText"><?php echo base64_decode($name[$r[2]]);?></p>
		<p class="normalText"><?php echo $classi[$r[2]];?></p>
	</fieldset>
			<?php
		}
	?>
</div>

</body>
</html>