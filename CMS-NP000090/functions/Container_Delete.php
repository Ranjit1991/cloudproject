<html>

	<?php
		$id = $_GET['id'];
		//Connect to database
		include("../sql/Connection.php");


		//Connection check
		if (mysqli_connect_errno($conn)) {
			die("Connection Failed to MySQL: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "delete  from container_detail where Container_ID like '%$id%'";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			header('Location: /admin/View_Container.php');
			exit;
		} else {
			echo "Error deleting record";
			echo "<a  href='../admin/View_Container.php'>back</a>";
		}
	?>

</html>
