<?php
	session_start();
	$_SESSION["faculty_loggedin"]="";
	$_SESSION["faculty_loggedin"]=null;
	header('location: ../index.php');
	exit;
?>