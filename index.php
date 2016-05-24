<?php
	session_start();

	require_once('AEdb.php');
	require_once('AGAuth.php');

	$foo = new AGAuth;

	$foo->login('kullanici_adi', 'sifre'); //boolean true ise session acar
	$foo->logout(); //boolean true ise session sonlandirilmistir
?>
