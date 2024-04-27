<?php
session_start();
include("dbconfig.php");

$employeeUsername = $_POST['employeeUsername'];
$employeePassword = $_POST['employeePassword'];

$query = "SELECT * FROM employee WHERE employeeid='$employeeUsername' AND password='$employeePassword'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['employeeUsername'] = $employeeUsername;
    echo "success";
   
} else {
    echo "employee admin username or password!";
}
?>
