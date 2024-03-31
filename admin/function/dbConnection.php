<?php  
	$conn = new mysqli("localhost", "root", "", "topscorer_db");
	if($conn->connect_error) {
		die("Failed to connect to database " . $conn->connect_error);
	}
?>
