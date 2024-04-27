<?php
// Include your database connection file (e.g., dbconfig.php)
include('dbconfig.php');

// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['name'];
    $employeeId = $_POST['employeeId'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $joiningDate = $_POST['joiningDate'];

    // Prepare and execute the SQL query to insert data into the employee table
    $employeeQuery = "INSERT INTO employee(name, employeeid, password, email, joining_date) VALUES ('$name', '$employeeId', '$password', '$email', '$joiningDate')";
    
    // Execute the query to insert data into the employee table
    $employeeResult = mysqli_query($conn, $employeeQuery);

    // Prepare and execute the SQL query to insert data into the sales table
    $salesQuery = "INSERT INTO sales(employeeid) VALUES ('$employeeId')";
    
    // Execute the query to insert data into the sales table
    $salesResult = mysqli_query($conn, $salesQuery);

    // Check if both queries were successful
    if ($employeeResult && $salesResult) {
        // Return a success message
        $response = array('status' => 'success', 'message' => 'Employee and sales data added successfully');
        echo json_encode($response);
    } else {
        // Return an error message
        $response = array('status' => 'error', 'message' => 'Failed to add employee or sales data');
        echo json_encode($response);
    }
} else {
    // If the form data has not been submitted, return an error message
    $response = array('status' => 'error', 'message' => 'Form data not submitted');
    echo json_encode($response);
}
?>
