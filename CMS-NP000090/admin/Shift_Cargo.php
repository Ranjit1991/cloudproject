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
			<li class="active"><a href="#">Manage Cargo</a>
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
			<li><a href="#">Manage Container</a>
				<ul>
					<li><a href="Add_Container.php">Add Container</a></li>
					<li><a href="View_Container.php">View Container</a></li>
				</ul>
			</li>			
			<li><a href="../login.php">Logout</a></li>
		</ul>

</div>


<!--Search Order ID -->
<div class="full_div">
<div class="search">
<form  method="post">
	<p class="div_p">Search Order_ID</p>
	<label> Order ID </label>
	<input class="div_input" type="text" name="Order_ID" placeholder="Enter Order ID" required>
	<br>
	<center><Button class="bttn" type="submit" name="search">Search</button></center>
</form>
</div>
    <?php
        session_start();
        include('../sql/Connection.php');

             if(isset($_POST['search'])){
                 if(empty($_POST['Order_ID'])){
                  echo'Please insert the order ID';
            }else{
             $search_value=$_POST["Order_ID"];
             require_once('../sql/Connection.php');
             if(mysqli_connect_errno($conn)){
               die('Failed to connect to MySQL: '.mysqli_connect_error());
             }

             $query = "select * from cargo_orders where Order_ID like '%$search_value%'";
             $result = mysqli_query($conn,$query);
             if(mysqli_num_rows($result)>0){
              $_SESSION['set_Order_ID'] = $search_value;
  
             }else{
               echo "Empty Record";
             }
           }
           }else{
             $_SESSION['set_Order_ID'] = 'Empty Set Yet ';
           }
    ?>

 
<!-- Shift To -->
<div class="shift">
<form  method="post">
	<p class="div_p">Shift To</p>
		<center><p style="color:green; font-weight: bold;">
			<?php
			if(isset($_POST['submit'])){

			  $Modify_DepartureName = trim($_POST['Modify_DepartureName']);
			  $Modify_ArrivalName = trim($_POST['Modify_ArrivalName']);
			  $set_Order_ID = trim($_POST['set_Order_ID']);
			require_once('../sql/Connection.php');
			if(mysqli_connect_errno($conn)){
			  die('Connection Failed to MySQL: '.mysqli_connect_error());
			}

			$query = "update cargo_orders set Departure_Name = '$Modify_DepartureName' , Arrival_Name = '$Modify_ArrivalName' where Order_ID='$set_Order_ID'";

			if(mysqli_query($conn,$query)) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
			}
			?>
			</p></center>
                <label> Order ID </label>
				<input class="div_input" type="text" name="set_Order_ID" value="<?php echo $_SESSION['set_Order_ID'];?>" ><br>
				<label> Departure Name </label><br>
				<input class="div_input" type="text" name="Modify_DepartureName" placeholder="Enter Departure Name" required><br>
				<label > Arrival Name</label><br>
				<input class="div_input" type="text" name="Modify_ArrivalName" placeholder="Enter Arrival Name" required>
				<br>
			<center><Button class="bttn" type="submit" name="submit">Shift</button></center>

</form>

</div>
</div>

<!--- Footer -->

<div class="footer"><p>Maersk Line Container Management System © 2019.</p></div>

</html>













