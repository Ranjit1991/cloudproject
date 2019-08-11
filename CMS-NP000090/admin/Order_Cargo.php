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
<!-- scroll button -->
<button onclick="topFunction()" id="scrollUp" title="to go up"><i class="fa fa-arrow-up"></i></button>

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



<!-- Create order cargo -->
<div class="order" style="height:630px;">
<form  method="post">
	<p class="div_p">Make Order Cargo</p>
		<center><p style="color:#2ecc71; font-weight: bold;">
			<?php
			 //contion establish
			 include('../sql/Connection.php');
			  //connection check
			  if(mysqli_connect_errno($conn))
			  {
				die('Connection Failed to MySQL: '.mysqli_connect_error());
			  }
				
			  if(isset($_POST['submit'])){
				$Data_Empty = array();
				// validation
				if(empty($_POST ['Departure_Name'])){
				  $Data_Empty[]="Depature is Empty";

				}else if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['Departure_Name'])){ 		//Depature is only character
				   $Data_Empty[]="Departure should be Characters.";
				}
				else{
				  $Departure_Name = trim($_POST ['Departure_Name']);
				}

				if(empty($_POST ['arrival_name'])){
				  $Data_Empty[]="Arrival is missing";
				}
				else if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['arrival_name'])){ 		//Arrival is only character
				   $Data_Empty[]="Arrival should be Characters.";
				}
				else{
				  $Arrival_Name = trim($_POST ['arrival_name']);
				}

				if(empty($_POST ['sender_name'])){
				$Data_Empty[] = "Sender name is missing.";
				}else if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['sender_name'])){ 		//Sender name is only character
				   $Data_Empty[]="Sender name should be Characters.";
				}else{
				  $Sender_Name = trim($_POST ['sender_name']);

				}

				if(empty($_POST ['sender_phone'])){
				  $Data_Empty[]="Sender Phone is missing.";
				}else if(!PREG_MATCH('/^[0-9]*$/',$_POST ['sender_phone'])){ 		//Sender phone is only number
				   $Data_Empty[]="Sender phone should be Number.";
				}else if(strlen($_POST ['sender_phone'])<10){							// phone should be more than 10 digits
					$Data_Empty[]="Please enter proper Mobile number.";
				}
				else{
				  $Sender_Phone = trim($_POST ['sender_phone']);
				}

				if(empty($_POST ['receiver_name'])){
				 $Data_Empty[] = "Receiver name is missing.";
				}else if(!PREG_MATCH('/^[a-zA-Z\s]+$/',$_POST ['receiver_name'])){ 		//Receiver name is only character
				   $Data_Empty[]="Sender name should be Characters.";
				}
				else{
				  $Receiver_Name = trim($_POST ['receiver_name']);
				}

				if(empty($_POST ['receiver_phone'])){
				  $Data_Empty[]="Receiver Phone is missing.";
				}else if(!PREG_MATCH('/^[0-9]*$/',$_POST ['receiver_phone'])){ 		//Receiver Phone is only number
				   $Data_Empty[]="Receiver Phone should be Number.";
				}else if(strlen($_POST ['receiver_phone'])<10){						// phone should be more than 10 digits
					$Data_Empty[]="Please enter proper Mobile number.";
				}
				else{
				  $Receiver_Phone = trim($_POST ['receiver_phone']);

				}

				if(empty($_POST ['container_model'])){
				  $Data_Empty[]="container_model";
				}else{
				  $Container_Model = trim($_POST ['container_model']);

				}

				//print error message
				if(empty($Data_Empty)){
				  echo "";
				}else{
				  foreach($Data_Empty as $missing){
						echo '<p style="color:#e74c3c;">'.$missing.'</p>';
				}

			  }
			  $status='Process';
			  

			  if(empty($Data_Empty)){
				if($stmt = mysqli_prepare($conn,"insert into cargo_orders(Departure_Name,Arrival_Name,Sender_Name,Sender_Phone,Receiver_Name,Receiver_Phone,Container_Model,Order_Status)VALUES(?,?,?,?,?,?,?,?)")){
				  mysqli_stmt_bind_param($stmt,'ssssssss',$Departure_Name,$Arrival_Name,$Sender_Name,$Sender_Phone,$Receiver_Name,$Receiver_Phone,$Container_Model,$status);
				  mysqli_stmt_execute($stmt);
				  printf("A Cargo has been Successfully Ordered.", mysqli_stmt_affected_rows($stmt));
				  mysqli_stmt_close($stmt);

				}

				

				$query=" update container_detail set Container_Status='Process' where Container_Model='$Container_Model'";

				if(mysqli_query($conn,$query)) {
				echo '';
			} else {
				echo "Update record failed: " . mysqli_error($conn);
			}
			  }

			  }
			?>
			</P></center>
         
		<label> Container Model </label>
		<select class="div_input" name="container_model" >
				<?php 
				//connect to database
				require_once('../sql/Connection.php');
				// import Container model from database
				$sql = mysqli_query($conn,"select Container_Model from container_detail where Container_Status='available'");
				while ($row = $sql->fetch_assoc()){
                unset($Container_Model);
                $Container_Model = $row['Container_Model'];
				echo '<option value="'.$Container_Model.'">'.$Container_Model.'</option>';

				  }
				  
				?>
		</select>
				
		<label style="padding-top: 10px;"> Departure Name </label><br>
		<input class="div_input" type="text" name="Departure_Name" placeholder="Enter Departure Name" required><br>
		<label style="padding-top: 10px;">Arrival Name</label><br>
		<input class="div_input" type="text"  name="arrival_name" placeholder=" Enter Arrival Name" required><br>
		<label style="padding-top: 10px;">Sender Name</label><br>
		<input class="div_input" type="text" name="sender_name" placeholder="Enter Sender Name" required><br>
		<label style="padding-top: 10px;">Sender Phone</label><br>
		<input class="div_input" type="text" name="sender_phone" placeholder="Enter Receiver Phone" required><br>				 
		<label style="padding-top: 10px;">Receiver Name</label><br>
		<input class="div_input" type="text"  name="receiver_name" placeholder=" Enter Receiver Name" required><br>
		<label  style="padding-top: 10px;">Receiver Phone</label><br>
		<input class="div_input" type="text" name="receiver_phone" placeholder="Enter Receiver Phone" required>
				 


        
		<p></p><center>
        <Button class="bttn" type="submit" name="submit">Submit</button></center>


</form>
</div>

<!--- Footer -->

<div class="footer"><p>Maersk Line Container Management System © 2019.</p></div>




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













