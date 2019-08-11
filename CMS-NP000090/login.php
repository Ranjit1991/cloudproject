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
	
<style type="text/css">
	.add_container{
		background: #fff;
		width: 380px;
		height:430px;
		margin: 0 auto;
		margin-top: 150px;
		margin-bottom: 120px;
		box-shadow: 0 14px 28px rgba(0,0,0, 0.50), 0 10px 10px rgba(0,0,0,0.44);

	}
	.add_container:hover{
		box-shadow: 0 10px 15px rgba(0,0,0, 0.80), 0 10px 10px rgba(0,0,0,0.60);
	}
	.div_p{
		background: #003e5e;
		color: white;
		text-align: center;
		padding: 15px 0px 15px 0px;
		margin-bottom: 20px;
	}
	label{
		margin-top: 30px;
		margin-left: 50px;
		padding-left:10px;
		
	}
	.div_input{
		width: 250px;
		height: 25px;
		border-radius: 5px;
		border: none;
		border: 1px solid #003e5e;
		margin-top: 10px;
		margin-bottom: 10px;
		margin-left: 60px;
		padding-left: 5px;
		border-left: 3px solid #003e5e;
	}
	.div_select{
		width: 260px;
		height: 25px;
		border-radius: 5px;
		border: none;
		border: 1px solid #003e5e;
		margin-top: 10px;
		margin-bottom: 10px;
		margin-left: 60px;
		padding-left: 5px;
		border-left: 3px solid #003e5e;
	}
	.bttn{
		width: 100px;
		height: 40px;
		background: #003e5e;
		border-radius: 5px;
		transition: all 0.3s ease 0s;
		margin: 0px auto;
		margin-top:20px;
		margin-bottom:10px;
		display: block;
		font-family: 'Josefin Sans', sans-serif;
		font-size: 16px;
		color: white;
		border:none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		
	}
	.bttn:hover{
		background-color: #00acc1;
	}
	.left{
		float: left;
		margin-top: 10px;
		margin-left: 10px;
		padding-left:10px;

	}
	.right{
		float: right;
		margin-top: 10px;
		margin-right: 10px;
		padding-right:10px;

	}
	
	
	a{
		color: rgba(0,136,169,0.8);
		text-decoration: none;
		margin-bottom: 5px;
	}
	a:hover{
		color: #000;
	
	}
</style>
	


</head>

<body style="background-image: url('img/DDAC.jpg'); background-size: 100% 850px;">
   
 
<!-- login page -->
<div class="add_container"> 
  <form  method="post" >
	<p class="div_p">PLease Log In your account</p>
    
                <label ><i class="fa fa-user fa" aria-hidden="true"></i> Username </label><br>
				<input class="div_input" type="text" name="username"  placeholder="Enter Username" required><br>
				 <label style="padding-top: 10px;"><i class="fa fa-key" ></i> Password</label><br>
				 <input class="div_input" type="password"  name="password" placeholder=" Enter Password" required><br>
				<label ><i class="fa fa-users" ></i> Actor </label><br>
				<select class="div_select" name="status"><br>
				  <option value="1">Admin</option>
				  <option value="2">Customer</option>
				</select>
				<label><a  href="Forget_Password.php" >Forget Password</a></label>
        <button type="submit" name="submit" class="bttn" >Login</button>
		<div style="text-align:center;">
		
		</div>
         <center> <p><?php
		 
			 //contion establish
			 include('sql/Connection.php');
			 if(mysqli_connect_error($conn))
			 {
				die('Connection Failed to MySQL: '.mysqli_connect_error());
			 }
		 
			//data from input
            if(isset ($_POST['submit'])){
             $Username = $_POST['username'];
             $Password = $_POST['password'];
             $Status = $_POST['status'];


             $row = array();
             $query = "select * from users_account where Username = '$Username' and Password = '$Password' and Actor='$Status'";
             $getID= mysqli_fetch_assoc(mysqli_query($conn,$query));

			// data from database table
             $row [1]= $getID['Username']; 
             $row [2]= $getID['Password'];
			//condition check
            if($row[1] == $Username && $row[2]== $Password){
			    if($Status == 1){
			    header("Location:admin/admin_page.php");
				}
				else{
				   header("Location:Customer/Customer_Page.php");
				}
            }else{
           		echo '<p style="color:red;">Invalid!!,Identification</p>';
           	}
           }

          ?>
        </p>
       <a class="left" href="Create_Account.php" >Create a new Account</a>
	   <a class="right" href="index.php">Back to Home</a>
	   </center>

	  </form>
</div>

</body>

</html>
