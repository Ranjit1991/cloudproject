
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maersk Line</title>
	<!-- show title icon   -->
	<link rel="shortcut icon" href="../img/titlelogo.ico" />
		
	<!-- import admin_laout css file-->
	<link href="../css/admin.css" rel="stylesheet">
	<!-- write internal css file-->
	<style>
		.design{
			text-decoration: none;
			margin-left: 20px;
			color: rgba(0,136,169,0.8);
		}
		.design:hover{
			color: #000;
		}
	</style>
	
</head>
<body >

<!-- Navegation Bar -->
<div class="navbar ">
		<ul id="myDIV">
			<a class="logo" href="../admin/admin_page.php"><img src="../img/footerlogo1.png"></a>
			<li ><a href="../admin/admin_page.php" >Home</a></li>
			<li><a href="#">Manage Account</a>
				<ul>
					<li><a href="Create_CustomerAccount.php">Create Account</a></li>
					<li><a href="View_Account.php">View Account</a></li>
				</ul>
			</li>
			<li><a href="#">Manage Cargo</a>
				<ul>
					<li><a href="Order_Cargo.php">Order Cargo</a></li>
					<li><a href="Shift_Cargo.php">Shift Cargo</a></li>
				</ul>
			</li>
			<li><a href="#">View Order</a>
				<ul>
					<li><a href="View_Order_Process.php">Order Process</a></li>
					<li><a href="View_Order.php">Order Booked</a></li>
					<li><a href="View_Completed_Order.php">Order Completed</a></li>
				</ul>
			</li>			
			<li><a href="#">Manage Schedule</a>
				<ul>
					<li><a href="Add_Schedule.php">Add Schedule</a></li>
					<li><a href="View_Schedule.php">View Schedule</a></li>
				</ul>
			</li>			
			<li class="active"><a href="#">Manage Container</a>
				<ul>
					<li><a href="Add_Container.php">Add Container</a></li>
					<li><a href="View_Container.php">View Container</a></li>
				</ul>
			</li>			
			<li><a href="../login.php">Logout</a></li>
		</ul>

</div>

<?php
$id = $_GET['id'];
//Connect to database
include("../sql/Connection.php");


// connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// get schedule_id
 $query = "select * from container_detail where Container_ID like '%$id%'";
 $result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
              $_SESSION['update_Container_id'] = $id;
  
             }else{
               echo "Empty Record";
             }
 
?>

 
<!-- Update container form -->
<div class="add_con">
<form  method="post">
	<p class="div_p">Update Container</p>
			<?php
			if(isset($_POST['submit'])){

			  $update_Container_Model = trim($_POST['update_Container_Model']);
			  $update_Container_Description = trim($_POST['update_Container_Description']);
			  $update_Container_id = trim($_SESSION['update_Container_id']);
			  
			require_once('../sql/Connection.php');
			if(mysqli_connect_errno($conn)){
			  die('Connection Failed to MySQL: '.mysqli_connect_error());
			}

			$query = "update container_detail set Container_Model = '$update_Container_Model', Container_Description = '$update_Container_Description'  where Container_ID='$update_Container_id'";

			if(mysqli_query($conn,$query)) {
			    mysqli_close($conn);
				header('Location: /admin/View_Container.php'); 
				exit;
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
			}
			?>
				<label> Contianer Model </label><br>
				<input class="div_input" type="text" name="update_Container_Model" placeholder="Enter Container Model" required><br>
				<label style="padding-top: 10px;">Container Description</label><br>
				<input class="div_input" type="text" name="update_Container_Description" placeholder="Enter Container Description" required><br>				

					
			<center><Button class="bttn" type="submit" name="submit">Update</button></center>
			<a class="design" href="View_Container.php">View Container</a>

</form>

</div>

<!--- Footer -->

<div class="footer"><p>Maersk Line Container Management System © 2019.</p></div>

</html>














