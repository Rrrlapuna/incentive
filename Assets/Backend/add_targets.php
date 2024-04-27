<?php
include('dbconfig.php');

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST["employeeId"];
    $sales = $_POST["sales"];

    // Calculate incentives based on predefined targets
    $incentive = 0;
    $bonus = 0;
    $eligibility = "";

    // Assign holiday package based on sales
    $holidayPackage = "";
    if ($sales >= 70000) {
        $holidayPackage = "Diamond";
    } elseif ($sales >= 60000) {
        $holidayPackage = "Gold";
    } elseif ($sales >= 50000) {
        $holidayPackage = "Basic";
    }

    // Calculate incentives based on sales targets
    if ($sales >= 50000) {
        $incentive = 5;
        $eligibility = "Yes";
    } elseif ($sales >= 30000) {
        $incentive = 3.5;
        $bonus = 1000;
    } elseif ($sales >= 20000) {
        $incentive = 3;
    } elseif ($sales >= 10000) {
        $incentive = 1.5;
    }

    // Insert sales data and calculated incentives into the database
    $sql = "UPDATE sales SET total_sale = '$sales', incentive = '$incentive', bonus = '$bonus', holiday = '$eligibility', holiday_package = '$holidayPackage' WHERE employeeid = '$employeeId'";

    if ($conn->query($sql) === TRUE) {
        echo "Incentive calculated and stored successfully for Employee ID: $employeeId";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
