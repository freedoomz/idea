<?php
	date_default_timezone_set('Europe/Istanbul');
	session_start();
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);

	$cnf = parse_ini_file('config.ini', true);

	define('SMARTY_DIR', $_SERVER['DOCUMENT_ROOT'].$cnf['smarty']['smarty_dir']);

	require_once(SMARTY_DIR."Smarty.class.php");
	require_once('dbclass.php');

	require_once('classes/Admin.php');

	$admin = new Admin();

	$admin->index();

	unset($admin);
?>
