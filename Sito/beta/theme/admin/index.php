<?php
	$filename = '/var/www/virtual/liceoblaisepascal.it/vhosts/studenti/htdocs/beta/theme/admin/module/'.$_GET['w'].'.php';
	if (file_exists($filename)) {
		include("module/".$_GET['w'].".php");
	} else {
		include("module/home.php");
	}
?>