<?php 
//connection to database
  include('../sql/Connection.php');

//connection check
  if(mysqli_connect_errno($conn)){
	die('Connection Failed to MySQL: '.mysqli_connect_error());
  }
  
  
  $username="";
  $email = "";
  $fullname = "";
  if (isset($_POST['register'])) {
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
	$actor = 2;	

  	$sql_u = "SELECT * FROM users_account WHERE username='$username'";
  	$sql_e = "SELECT * FROM users_account WHERE email='$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);





	if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['fullname'])){ 		
		$fullname_error="Full Name must be Characters.";
		}
	else if(strlen($_POST ['fullname'])<3){
		$fullname_error="FullName must be more than 3 characters.";
	}
	else if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Username is already existed."; 	
  	}
	else if(strlen($_POST ['username'])<5){
		$name_error="Username must be more than 5 characters.";
	} 
	else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Email is already existed."; 	
  	}
	else if(strlen($_POST ['password'])<8){
		$password_error="Password Requires more than 8 digits. ";
	}
	else{
           $query = "INSERT INTO users_account (FullName,Username,Password, Email, Actor) 
      	    	  VALUES ('$fullname','$username', '$password', '$email', '$actor')";
           $results = mysqli_query($conn, $query);
           $success_msg= "An Account has been successfully Created.";
			$fullname = "";
			$username ="";
			$email = "";
			$password = "";
  	}
  }
?>