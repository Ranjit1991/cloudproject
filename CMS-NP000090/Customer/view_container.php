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

<!-- Navegation Bar -->
	<div class="navbar ">
		<ul id="myDIV">
			<a class="logo" href="../Customer/Customer_Page.php"><img src="../img/footerlogo1.png"></a>
			<li><a href="../Customer/create_order.php">Order Cargo</a></li>
			<li><a href="../Customer/view_schedule.php">View Schedule</a></li>
			<li class="active"><a href="../Customer/view_container.php">View Container</button></a></li>
			<li><a href="../Customer/view_orders.php">View Orders</button></a></li>
			<li><a href="../login.php">Logout</a></li>
		</ul>
	</div>

 <!--- Show Table-->
 <div  class="show_table">
  <center><h3>View Container</h3></center>
<?php
 //contion establish
 include('../sql/Connection.php');
  //connection check
  if(mysqli_connect_errno($conn))
  {
	die('Connection Failed to MySQL: '.mysqli_connect_error());
  }

  $query = "select * from container_detail";
  $result = mysqli_query($conn,$query);
  static $row_num = 0;

  if(mysqli_num_rows($result)>0){

    echo'<center><table ><tr><th>No.</th><th>Container ID</th><th>Container Model</th><th>Container Description</th><th>Container Status</th></tr>';
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
          $row_num++;
          echo'<tr ><td>'.$row_num.'</td><td>'.$row["Container_ID"].'</td><td>'.$row["Container_Model"].'</td><td>'.$row["Container_Description"].'</td><td>'.$row["Container_Status"].'</td></tr>';}
      echo'</center></table>';

  }else{
    echo "Empty Record!!!";
  }
?>
</div>


</body>

</html>













