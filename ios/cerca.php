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
</head>
<body onLoad="init();">
<style type="text/css">
.panel p.normalText { text-align: left;  padding: 0 10px 0 10px; }
  </style>

<div id="search" title="Ricerca" class="panel" selected="true">
	<h2>Ricerca</h2>
	<fieldset>
		<div class="row">
			<label></label>
			<input type="text" onChange="document.getElementById('temp').value = this.value;" value=""/>
		</div>
	</fieldset>
	<form method = "POST" action="risultati.php">
		<input type="hidden" name = "nome" id="temp" value=""/>
		<a class="redButton" type="submit" href="risultati.php">Cerca</a>
	</form>
</div>


</body>
</html>