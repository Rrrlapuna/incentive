<?php
// Include your database connection file (e.g., dbconfig.php)
include('dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $package_id = $_POST["packageId"];
    $holiday_name = $_POST["holidayName"];
    $duration = $_POST["duration"];
    $destination = $_POST["destination"];
    $location = $_POST["location"];
    $amenities = $_POST["amenities"];

    // Update the holiday package details in the database
    $sql = "UPDATE holiday_packages SET holiday_name = '$holiday_name', duration = '$duration', destination = '$destination', location = '$location', amenities = '$amenities' WHERE id = $package_id";

    if ($conn->query($sql) === TRUE) {
        // Return success response
        $response = array('status' => 'success', 'message' => 'Holiday package updated successfully');
        echo json_encode($response);
    } else {
        // Return error response
        $response = array('status' => 'error', 'message' => 'Failed to update holiday package');
        echo json_encode($response);
    }
} else {
    // If the request method is not POST, return an error response
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    echo json_encode($response);
}
?>
