<html>
<?php
$id = $_GET['id'];
//connect to database
include("../sql/Connection.php");


//  connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update to complete order a record

$sql="update container_detail, cargo_orders set container_detail.Container_Status='Delivered', cargo_orders.Order_Status='Delivered' where container_detail. Container_Model='$id' and cargo_orders.Container_Model='$id'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: /admin/View_Order.php'); 
    exit;
} else {
    echo "Occurs updating error.";
    echo "<a href='../admin/Viwe_Order.php'>Back to previous page</a>";
}
?>
</html>
