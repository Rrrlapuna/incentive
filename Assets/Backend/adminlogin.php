<?php
session_start();
include("dbconfig.php");

$adminUsername = $_POST['adminUsername'];
$adminPassword = $_POST['adminPassword'];

$query = "SELECT * FROM admins WHERE username='$adminUsername' AND password='$adminPassword'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['adminUsername'] = $adminUsername;
    echo "success";
   
} else {
    echo "Invalid admin username or password!";
}
?>
