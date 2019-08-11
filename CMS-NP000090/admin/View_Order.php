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
<!-- scroll buttm -->
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
			<li><a href="#">Manage Cargo</a>
				<ul>
					<li><a href="Order_Cargo.php">Order Cargo</a></li>
					<li><a href="Shift_Cargo.php">Shift Cargo</a></li>
				</ul>
			</li>
			<li class="active"><a href="#">View Order</a>
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

<!--- Show Table-->
 <div  class="show_table">
  <center><h3>View Booked Orders</h3></center>
<?php
 //contion establish
 include('../sql/Connection.php');
 if(mysqli_connect_error($conn))
 {
	die('Connection Failed to MySQL: '.mysqli_connect_error());
 }

  $query = "select *from cargo_orders where Order_Status='Loaded'";
  $result = mysqli_query($conn,$query);
  static $row_num = 0;

  if(mysqli_num_rows($result)>0){

    echo'<center><table><tr><th>No.</th><th>Order ID</th><th>Departure</th><th>Arrival</th><th>Sender Name</th><th>Sender Phone</th><th>Receiver Name</th><th>Receiver Phone</th><th>Container Model</th><th>Order Status</th><th>Function</th></tr>';
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
          $row_num++;
          echo'<tr class="thead-light"><td>'.$row_num.'</td><td>'.$row["Order_ID"].'</td><td>'.$row["Departure_Name"].'</td><td>'.$row["Arrival_Name"].'</td><td>'.$row["Sender_Name"].'</td><td>'.$row["Sender_Phone"].'</td><td>'.$row["Receiver_Name"].'</td><td>'.$row["Receiver_Phone"].'</td><td>'.$row["Container_Model"].'</td><td>'.$row["Order_Status"].'</td><td><a class="accept_btn" href="../functions/Complete_Order.php?id='.$row["Container_Model"].'">Completed</a></td></tr>';}
      echo'</center></table>';

  }else{
    echo "Empty Record!!!";
  }


?>
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













