<?php include('functions/create_account_fuction.php') ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maersk Line</title>
	
	<!-- show title icon at tabe bar of browser  -->
	<link rel="shortcut icon" href="img/titlelogo.ico" />
	
	<!-- import icon  -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- import external css file  -->
    <link rel="stylesheet" href="css/create_account.css">
</head>
<body  style="background-image: url('img/DDAC.jpg'); background-size: 100% 850px;">


  <form method="post"  id="register_form">
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
		<input type="text" name="fullname" placeholder="Full Name"  required><br>
		<?php if (isset($fullname_error)): ?>
		<span><?php echo $fullname_error; ?></span>
		<?php endif ?>
  	</div>	
	
  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
		<label><i class="fa fa-user fa" aria-hidden="true"></i> Username </label><br>
		<input type="text" name="username" placeholder="Username"  required><br>
		<?php if (isset($name_error)): ?>
		<span><?php echo $name_error; ?></span>
		<?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
		<label  style="padding-top: 10px;"><i class="fa fa-envelope"></i> Email</label><br>
		<input type="email" name="email" placeholder="Email"  required><br>
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
	   <a class="bklogin" href="login.php">Back to Login</a>
  	</div>
  </form>
  </body>
</html>