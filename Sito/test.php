<?php
$g = "8";
$m = "12";
$y = "2011";
$h = "9";
$h1 = "21";

$ga = date("j");
$ma = date("n");
$ya = date("Y");
$ha = date("G");

if ($ga > $g && $ma >= $m && $ya >= $y){
	$limit = "1";
}else{
	if ($ga == $g && $ma == $m && $ya == $y && $ha >= $h1){
		$limit = "2";
	}else{
		$limit = " AND lvl = 2";
	}
}
echo $limit;
?>