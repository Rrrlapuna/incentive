<?php
// Include your database connection file (e.g., dbconfig.php)
include('dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $holidayName = $_POST["holidayName"];
    $duration = $_POST["duration"];
    $destination = $_POST["destination"];
    $location = $_POST["location"];
    $amenities = array(); // Create an array to store amenities

    // Retrieve and store amenities from the form
    for ($i = 1; $i <= 3; $i++) {
        $amenity = $_POST["amenities" . $i];
        if (!empty($amenity)) {
            $amenities[] = $amenity;
        }
    }

    // Convert the amenities array to a string separated by commas
    $amenitiesStr = implode(", ", $amenities);

    // Prepare and execute SQL query to insert holiday package details into the database
    $query = "INSERT INTO holiday_packages (holiday_name, duration, destination, location, amenities) 
              VALUES ('$holidayName', '$duration', '$destination', '$location', '$amenitiesStr')";

    if (mysqli_query($conn, $query)) {
        $response = array('status' => 'success', 'message' => 'Holiday package added successfully.');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error: ' . $query . '<br>' . mysqli_error($conn));
        echo json_encode($response);
    }
}
?>
