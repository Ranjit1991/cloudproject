<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maersk Line</title>
	<!-- show title icon   -->
	<link rel="shortcut icon" href="../img/titlelogo.ico" />
	
	<!-- import icon for scrollup -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- import admin_laout css file-->
	<link href="../css/admin.css" rel="stylesheet">

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
					<li ><a href="Add_Container.php">Add Container</a></li>
					<li><a href="View_Container.php">View Container</a></li>
				</ul>
			</li>			
			<li><a href="../login.php">Logout</a></li>
		</ul>

</div>

<!-- Add Container -->
<div class="add_con">
	<form action="" method="post">
		<p class="div_p">Create Container</p>
			<center><p  style="color:#2ecc71; font-weight:bold;">
				<?php
					//connection to database
					  include('../sql/Connection.php');

					//connection check
					  if(mysqli_connect_errno($conn)){
						die('Connection Failed to MySQL: '.mysqli_connect_error());
					  }

					  if(isset($_POST['submit'])){
						//validation 
						$empty_data_validate = array();
						
						if(empty($_POST ['Container_Model'])){
						  $empty_data_validate[]=" Container Model is Empty.";

						}else {
							$Container_Model=trim($_POST ['Container_Model']);
						}
						
						if(empty($_POST ['Container_Description'])){				  
						  $empty_data_validate[]="Container description is Empty.";

						}else {
							$Container_Description=trim($_POST ['Container_Description']);
						}
						
						if(empty($empty_data_validate)){
						  echo "";
						}else{
						  foreach($empty_data_validate as $empty){
								echo '<p  style="color:#e74c3c; font-weight:bold;">'.$empty.'</p>';
						}
						}
						
						$Container_ID='';
						$Container_Status='Available';


					  

					  if(empty($empty_data_validate)){
						if($stmt = mysqli_prepare($conn,"insert into container_detail(Container_ID,Container_Model,Container_Description,Container_Status)VALUES(?,?,?,?)")){
						  mysqli_stmt_bind_param($stmt,'ssss',$Container_ID,$Container_Model,$Container_Description,$Container_Status);
						  mysqli_stmt_execute($stmt);
						  printf("A Container has been Succefully Added.", mysqli_stmt_affected_rows($stmt));
						  mysqli_stmt_close($stmt);
						}
					  }
					  }
				?>
		</p></center>		
		
		<label>Container Model</label><br>
		<input class="div_input" type="text" placeholder="Enter Container Model" name="Container_Model" required><br>
		
        <label> Container Description </label>
		<input class="div_input" type="text" placeholder="Enter Container Description" name="Container_Description" required>				
		<br>
		<center><Button class='bttn' type="submit" name="submit">Add</button></center>
		

</form>
</div>



<!--- Footer -->

<div class="footer"><p>Maersk Line Container Management System © 2019.</p></div>
</body>
</html>













