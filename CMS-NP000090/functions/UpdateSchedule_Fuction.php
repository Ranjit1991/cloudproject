<?php
$id = $_GET['id'];
//Connect to database
include("../sql/Connection.php");


// connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// get schedule_id
 $query = "select * from schedule_detail where Schedule_ID like '%$id%'";
 $result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
              $_SESSION['update_schedule_id'] = $id;
  
             }else{
               echo "Empty Record";
             }
 
 
?>

<?php 
//Connect to database
include("../sql/Connection.php");


// connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

  $departure_name = "";
  $arrival_name = "";
  if (isset($_POST['update'])) {
	$modify_departure_name = $_POST['departure_name'];
	$modify_arrival_name = $_POST['arrival_name'];
  	$mdify_departure_time = $_POST['departure_time'];
  	$modify_arrival_time = $_POST['arrival_time'];
	 $update_schedule_id = trim($_SESSION['update_schedule_id']);
	
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
			$query = "update schedule_detail set Departure_Name='$modify_departure_name', Arrival_Name = '$modify_arrival_name', 
			Departure_Time = '$mdify_departure_time' , Arrival_Time = '$modify_arrival_time' where Schedule_ID='$update_schedule_id'";
           $results = mysqli_query($conn, $query);
           $success_msg= "A Schedule has been successfully Updated.";
			$modify_departure_name = "";
			$modify_arrival_name = "";
			$mdify_departure_time = "";
			$modify_arrival_time = "";
  	}
	
  }
?>