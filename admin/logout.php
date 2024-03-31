<?php
	session_start();
	$_SESSION["admin_loggedin"]="";
	$_SESSION["admin_loggedin"]=null;
	header('location: ../index.php');
	exit;
?>