<?php
	session_start();
	$_SESSION["student_loggedin"]="";
	$_SESSION["student_loggedin"]=null;
	header('location: ../index.php');
	exit;
?>