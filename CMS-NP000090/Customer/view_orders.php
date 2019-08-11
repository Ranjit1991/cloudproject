<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maersk Line</title>
	<!-- show title icon  -->
	<link rel="shortcut icon" href="../img/titlelogo.ico" />
	
	<!-- import scroll up icon from font-awesome  -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- import customer external css file  -->
	<link href="../css/customer_style.css" rel="stylesheet">

</head>
<body>
<!-- scroll buttm -->
<button onclick="topFunction()" id="scrollUp" title="to go up"><i class="fa fa-arrow-up"></i></button>

<!-- Navegation Bar -->
	<div class="navbar ">
		<ul id="myDIV">
			<a class="logo" href="../Customer/Customer_Page.php"><img src="../img/footerlogo1.png"></a>
			<li><a href="../Customer/create_order.php">Order Cargo</a></li>
			<li><a href="../Customer/view_schedule.php">View Schedule</a></li>
			<li><a href="../Customer/view_container.php">View Container</button></a></li>
			<li class="active"><a href="../Customer/view_orders.php">View Orders</button></a></li>
			<li><a href="../login.php">Logout</a></li>
		</ul>
	</div>

 <!--- Show Table-->
 <div  class="show_table">
  <center><h3>View Completed Orders</h3></center>
<?php
 //contion establish
 include('../sql/Connection.php');
  //connection check
  if(mysqli_connect_errno($conn))
  {
	die('Connection Failed to MySQL: '.mysqli_connect_error());
  }

  $query = "select * from cargo_orders";
  $result = mysqli_query($conn,$query);
  static $row_num = 0;

  if(mysqli_num_rows($result)>0){

    echo'<center><table ><tr><th>No.</th><th>Order ID</th><th>Departure Name</th><th>Arrival</th><th>Sender Name</th><th>Sender Phone</th><th>Receiver Name</th><th>Receiver Phone</th><th>Container</th><th>status</th></tr>';
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
          $row_num++;
          echo'<tr><td>'.$row_num.'</td><td>'.$row["Order_ID"].'</td><td>'.$row["Departure_Name"].'</td><td>'.$row["Arrival_Name"].'</td><td>'.$row["Sender_Name"].'</td><td>'.$row["Sender_Phone"].'</td><td>'.$row["Receiver_Name"].'</td><td>'.$row["Receiver_Phone"].'</td><td>'.$row["Container_Model"].'</td><td>'.$row["Order_Status"].'</td></tr>';}
      echo'</center></table>';

  }else{
    echo "Empty Record!!!";
  }


?>
</div>

 
</body>

</html>

</html>
