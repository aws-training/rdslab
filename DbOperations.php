<?php 
	/*create table mysqldbinstance.info
	(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	address VARCHAR(100),
	PRIMARY KEY(id) 
	);*/
	
	session_start();
	$db = mysqli_connect('mysqldbinstance.c77bumdcel3e.ap-south-1.rds.amazonaws.com', 'mysqldbinstance', 'mysqldbinstance', 'mysqldbinstance');

	// initialize variables
	$name = "";
	$address = "";
	$id = 1;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		
		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}