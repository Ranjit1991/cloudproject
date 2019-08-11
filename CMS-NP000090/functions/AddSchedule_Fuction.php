<?php 
//connection to database
  include('../sql/Connection.php');

//connection check
  if(mysqli_connect_errno($conn)){
	die('Connection Failed to MySQL: '.mysqli_connect_error());
  }

  $departure_name = "";
  $arrival_name = "";
  if (isset($_POST['add'])) {
	$departure_name = $_POST['departure_name'];
	$arrival_name = $_POST['arrival_name'];
  	$departure_time = $_POST['departure_time'];
  	$arrival_time = $_POST['arrival_time'];

	if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['departure_name'])){ 		
		$departure_name_error="Departure Name must be Characters.";
		}
	else if(strlen($_POST ['departure_name'])<3){
		$departure_name_error="Must be more than 3 characters.";
	}
	else if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['arrival_name'])){ 		
		$arrival_name_error="Arrival Name must be Characters.";
		}
	else if(strlen($_POST ['arrival_name'])<3){
		$arrival_name_error="Must be more than 3 characters.";
	}
	else{
           $query = "insert into schedule_detail (Departure_Name,Departure_Time,Arrival_Name, Arrival_Time) 
      	    	  VALUES ('$departure_name','$departure_time', '$arrival_name', '$arrival_time')";
           $results = mysqli_query($conn, $query);
           $success_msg= "A Schedule has been successfully Added.";
			$departure_name = "";
			$arrival_name ="";
			$departure_time = "";
			$arrival_time = "";
  	}
  }
?>