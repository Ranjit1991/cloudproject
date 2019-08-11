<?php
	//declaration of host and username...
	$host = 'ranjitdatabase.mysql.database.azure.com';
	$username = 'ranjit_stha1991@ranjitdatabase';
	$password = 'R9815339431s';
	$db_name = 'cmsdb';

	//Connect to database
	$conn = mysqli_init();
	mysqli_real_connect($conn, $host, $username, $password, $db_name);

?>
