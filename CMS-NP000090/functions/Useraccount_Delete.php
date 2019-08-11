<html>
<?php
$id = $_GET['id'];
//Connect DB
include("../sql/Connection.php");

// connection Check
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "delete  from users_account where User_ID like '%$id%'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: /admin/View_Account.php');
    exit;
} else {
    echo "Occurs Error.";
    echo "<a class='btn-primary' href='../admin/View_Account.php'>back</a>";
}
?>
</html>
