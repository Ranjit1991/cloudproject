<?php include('../functions/AddSchedule_Fuction.php') ?>
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
	
	<!-- write internal css for add schedule form-->
	<style>
		#register_form {
		  width: 28%;
		  height:auto;
		  margin: 0px auto;
		  margin-top: 100px;
		  padding-bottom: 30px;
		  border: none;
		  background: white;
		  box-shadow: 0 14px 28px rgba(0,0,0, 0.25), 0 10px 10px rgba(0,0,0,0.22);
		}



		#register_form input {
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
		.div_p{
			background: #003e5e;
			color: white;
			text-align: center;
			margin:0;
			padding: 15px 0px;
			margin-bottom: 40px;
		}
		label{
			margin-top: 30px;
			margin-left: 50px;
			padding-left:10px;
			
		}
		.div_select{
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

		.form_error span {
		width: 80%;
		height: 35px;
		margin-left: 50px;
		padding-left:10px;
		font-size: 1em;
		color: #D83D5A;
		}
		.form_error input{
			background-color: #ffcccb;

		}
		.form_success span {
			width: 80%;
			height: 35px;
			margin-left: 50px;
			font-size: 1em;
			color:green;
		}


		.bttn{
			width: 100px;
			height: 40px;
			background: #003e5e;
			border-radius: 5px;
			transition: all 0.3s ease 0s;
			margin: 10px auto;
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
		.bklogin{
			text-decoration: none;
			margin-left: 20px;
			color: rgba(0,136,169,0.8);
		}
		.bklogin:hover{
			color: #000;
		}
	.footer{
		width: 100%;
		background-color: #003e5e;
		color: #fff;
		height: 30px;
		text-align: center;
		font-family: sans-serif;
		font-size:11px;
		padding-top: 5px;
		margin-top: 42px;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);

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
			<li class="active"><a href="#">Manage Schedule</a>
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

<!-- Add Schedule -->

 <form method="post" id="register_form">
	<p class="div_p">Add Schedule</p>
	
	<!-- print success message -->
	<div <?php if (isset($success_msg)): ?> class="form_success" <?php endif ?> >
		<?php if (isset($success_msg)): ?>
		<span><?php echo $success_msg; ?></span>
		<?php endif ?>
		<p></p>
  	</div>

	<!-- validation -->
  	<div <?php if (isset($departure_name_error)): ?> class="form_error" <?php endif ?> >
		<label>Departure Name </label><br>
		<input type="text" name="departure_name" placeholder="Departure Name" value="<?php echo $departure_name; ?>" required><br>
		<?php if (isset($departure_name_error)): ?>
		<span><?php echo $departure_name_error; ?></span>
		<?php endif ?>
  	</div>	
	
  	<div <?php if (isset($arrival_name_error)): ?> class="form_error" <?php endif ?> >
		<label> Arrival Name </label><br>
		<input type="text" name="arrival_name" placeholder="Arrival Name" value="<?php echo $arrival_name; ?>" required><br>
		<?php if (isset($arrival_name_error)): ?>
		<span><?php echo $arrival_name_error; ?></span>
		<?php endif ?>
  	</div>
	
	<div>
		<label>Departure Time </label>
		<input type="text" name="departure_time" placeholder="Departure Time"  required><br>
	</div>
	<div>
		<label>Arrival Time </label>
		<input type="text" name="arrival_time" placeholder="Arrival Time" required><br>
	</div>
	
	
  	<div>
  		<button type="submit" name="add" class="bttn">Create</button>
  	</div>
  </form>

<!--- Footer -->

<div class="footer"><p>Maersk Line Container Management System © 2019.</p></div>
</body>

</html>













