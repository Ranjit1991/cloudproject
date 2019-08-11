<?php
$id = $_GET['id'];
//Connect to database
include("../sql/Connection.php");


// connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// get schedule_id
 $query = "select * from users_account where User_ID like '%$id%'";
 $result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
              $_SESSION['update_user_id'] = $id;
  
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


  $username="";
  $email = "";
  $fullname = "";
  if (isset($_POST['update'])) {
	$update_user_id = trim($_SESSION['update_user_id']);
	$Modify_FullName = $_POST['fullname'];
	$Modify_Username = $_POST['username'];
  	$Modify_Email = $_POST['email'];
  	$Modify_Password = $_POST['password'];
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
		$query = "update users_account set FullName='$Modify_FullName', Username = '$Modify_Username', Password = '$Modify_Password' ,
		Email = '$Modify_Email' where User_ID='$update_user_id'";
		
		$results = mysqli_query($conn, $query);
		$success_msg= "An Account has been successfully Updated.";
		
		$Modify_FullName = "";
		$Modify_Username = "";
		$Modify_Email = "";
		$Modify_Password = "";

  	}

	
  }
?>