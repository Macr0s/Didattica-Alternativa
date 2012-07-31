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

<div id="Risultati" title="Risultati" class="panel" selected="true">
	<?php 
		$con = mysql_connect("localhost","stud_10723","MX5vHH88");
		mysql_select_db("stud_liceoblaisepascal_it", $con);
		
		$name = $_POST['nome'];
		$return = mysql_query("SELECT * FROM Account WHERE name LIKE '%$name%'");
		if(mysql_num_rows($return) == "0"){
			?>
	<fieldset>
		<p class="normalText">Nessun Risultato</p>
	</fieldset>
			<?php
		}else{
			?>
	<ul>
		<?php
			while($row = mysql_fetch_array($return)){
				?>
					<li><a href='user.php?id=<?php echo $row['id']; ?>'><?php echo $row['name']; ?> (<?php echo $row['classe']?>)</a></li>
				<?php
			}
		?>
	</ul>
</div>
		<?php
		}
	?>
</div>

</body>
</html>