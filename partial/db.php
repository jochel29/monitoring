<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "monitoring";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if ($conn->connect_error){
	die("connection failed." . $conn->connect_error);
	};
?>