<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maersk Line</title>
	<!-- show title icon at tabe bar of browser  -->
	<link rel="shortcut icon" href="../img/titlelogo.ico" />
	
	<!-- import icon  -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- import css file for only create account  -->
	<link href="css/index.css" rel="stylesheet">
</head>
<body>
<!-- scroll buttm -->
<button onclick="topFunction()" id="scrollUp" title="to go up"><i class="fa fa-arrow-up"></i></button>
<!-- Navegation Bar -->
	<div class="navbar ">
		<ul id="myDIV">
			<a class="logo" href="index.php"><img src="img/footerlogo1.png"></a>
			<li class="active"><a href="index.php" >Home</a></li>			
			<li><a href="login.php">Login</a></li>
		</ul>

	</div>
<div class="container">
<img src="img/agentimg.jpg" style="width:100%; padding-top: 15px;">
</div>

<!--- Welcome Section -->
<div class="div_section">
		<center>
		<h3 >Welcome Maersk Inc.</h3>
		<p>Regardless of your industry, your commodity, or your key markets, Maersk has solutions that offer both small and large businesses the opportunity to grow. We serve our customers with frequent departures on all major trade lanes and inland services for a true end-to-end experience.</p>
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













