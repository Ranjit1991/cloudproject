<html>
<?php
$id = $_GET['id'];
//Connect to database
include("../sql/Connection.php");


// connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// update a record

$sql="update container_detail,cargo_orders set container_detail.Container_Status='Available', cargo_orders.Order_Status='Rejected, Try again' where container_detail.Container_Model='$id' and cargo_orders.Container_Model='$id'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: /admin/View_Order_Process.php'); 
    exit;
} else {
    echo "Error updating record";
    echo "<a href='../admin/View_Order_Process.php'>press here to go back previous page</a>";
}
?>
</html>
