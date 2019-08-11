<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maersk Line</title>
	<!-- show title icon at tabe bar of browser  -->
	<link rel="shortcut icon" href="img/titlelogo.ico" />
	
	<!-- import icon  -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- import external css file  -->
    <link rel="stylesheet" href="css/forgetpassword.css">
	


</head>

<body style="background-image: url('img/DDAC.jpg'); background-size: 100% 850px;">
   
 
<!-- login page -->
<div class="add_container"> 
  <form  method="post">
	<p class="div_p">Find Forget Password </p>
	<label> Find by Username </label>
	<input class="div_input" type="text" name="username" placeholder="Enter Username" required>
	<br>
	<center><Button class="bttn" type="submit" name="find">Find</button></center><br>
	<p><center>Your Password is :
	 <?php
 			 //contion establish
			 include('sql/Connection.php');
			 if(mysqli_connect_error($conn))
			 {
				die('Connection Failed to MySQL: '.mysqli_connect_error());
			 }
			 
             if(isset($_POST['find'])){
                 if(empty($_POST['username'])){
                  echo'Please insert the Username';
            }else{
             $search_value=$_POST["username"];
             require_once('sql/Connection.php');
             if(mysqli_connect_errno($conn)){
               die('Failed to connect to MySQL: '.mysqli_connect_error());
             }

             $query = "select * from users_account where Username like '%$search_value%'";
             $result = mysqli_query($conn,$query);

             if(mysqli_num_rows($result)>0){
			if($row = mysqli_fetch_assoc($result)){            
				  echo '<p style="color:#ff072d;">'.$row["Password"].' </p>';
			}
				
             }else{
               echo '<p style="color:#ff072d;">Username is not existed. </p>';
             }
           }
           }			 
			 
 
 
    ?>
<a class="left" href="login.php" >Login</a>	
	</p></center>
</form>
</div>



</body>
</html>