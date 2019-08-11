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
			<li><a href="../Customer/view_orders.php">View Orders</button></a></li>
			<li><a href="../login.php">Logout</a></li>
		</ul>
	</div>
	
<div class="container">
<img src="../img/customer.png" style="width:100%; padding-top: 15px;">
</div>

<!--- Info Section -->
<div class="div_section">
		<center>
		<h3 >We enable small and large businesses the opportunity to grow</h3>
		<p>Learn more about our shipping services from over 300 ports around the world and how we can connect your business globally and simplify your supply chain end-to-end.</p>
		</center>
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













