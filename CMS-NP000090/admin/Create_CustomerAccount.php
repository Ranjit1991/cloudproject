<?php include('create_account_fuction.php') ?>
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
	<style>
		#create_userAc {
			width: 28%;
			margin: 0px auto;
			margin-top: 100px;
			margin-bottom: 20px;
			padding-bottom: 30px;
			border: none;
			background: white;
			box-shadow: 0 14px 28px rgba(0,0,0, 0.25), 0 10px 10px rgba(0,0,0,0.22);
		}

		#create_userAc input {
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
	</style>

</head>
<body >
<!-- scroll button -->
<button onclick="topFunction()" id="scrollUp" title="to go up"><i class="fa fa-arrow-up"></i></button>

<!-- Navegation Bar -->
<div class="navbar ">
		<ul id="myDIV">
			<a class="logo" href="../admin/admin_page.php"><img src="../img/footerlogo1.png"></a>
			<li ><a href="../admin/admin_page.php" >Home</a></li>
			<li class="active"><a href="#">Manage Account</a>
				<ul>
					<li><a href="Create_CustomerAccount.php">Create Account</a></li>
					<li><a href="View_Account.php">View Account</a></li>
				</ul>
			</li>			
			<li ><a href="#">Manage Cargo</a>
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


 <form method="post" id="create_userAc">
	<p class="div_p">Create Account</p>
	
	<!-- print success message -->
	<div <?php if (isset($success_msg)): ?> class="form_success" <?php endif ?> >
		<?php if (isset($success_msg)): ?>
		<span><?php echo $success_msg; ?></span>
		<?php endif ?>
		<p></p>
  	</div>

	<!-- validation -->
  	<div <?php if (isset($fullname_error)): ?> class="form_error" <?php endif ?> >
		<label><i class="fa fa-user-circle-o" aria-hidden="true"></i> Full Name </label><br>
		<input type="text" name="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>" required><br>
		<?php if (isset($fullname_error)): ?>
		<span><?php echo $fullname_error; ?></span>
		<?php endif ?>
  	</div>	
	
  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
		<label><i class="fa fa-user fa" aria-hidden="true"></i> Username </label><br>
		<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required><br>
		<?php if (isset($name_error)): ?>
		<span><?php echo $name_error; ?></span>
		<?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
		<label  style="padding-top: 10px;"><i class="fa fa-envelope"></i> Email</label><br>
		<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required><br>
		<?php if (isset($email_error)): ?>
		<span><?php echo $email_error; ?></span>
		<?php endif ?>
  	</div>
	
	
  	<div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
		<label style="padding-top: 10px;"><i class="fa fa-key" ></i> Password</label><br>
  		<input type="password"  placeholder="Password" name="password" required><br>
		<?php if (isset($password_error)): ?>
      	<span><?php echo $password_error; ?></span>
		<?php endif ?>
  	</div>
	
	
	
	<div>
		<label><i class="fa fa-users" ></i> Actor </label><br>
		<select class="div_select" name="status"><br>
		<!-- only for customer account-->
		<option value="2">Customer</option>
		</select>
	</div>
	
	
  	<div>
  		<button type="submit" name="register" class="bttn">Register</button>
  	</div>
  </form>




<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.getElementById("scrollUp").style.display = "block";
	  } else {
		document.getElementById("scrollUp").style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
</script>

</body>

</html>













