<?php
// Include your database connection file (e.g., dbconfig.php)
include('Assets/Backend/dbconfig.php');

// Check if package ID is provided in the URL
if (isset($_GET['id'])) {
    $package_id = $_GET['id'];

    // Retrieve package details from the database based on the provided package ID
    $query = "SELECT * FROM holiday_packages WHERE id = $package_id";
    $result = mysqli_query($conn, $query);

    // Fetch the package details
    if ($row = mysqli_fetch_assoc($result)) {
        $holiday_name = $row['holiday_name'];
        $duration = $row['duration'];
        $destination = $row['destination'];
        $location = $row['location'];
        $amenities = $row['amenities'];
    } else {
        // Package with the provided ID does not exist
        echo "Package not found.";
        exit;
    }
} else {
    // No package ID provided in the URL
    echo "Invalid request.";
    exit;
}
?>
<?php session_start(); ?>
<?php include 'navbar.php' ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Holiday Package</h2>
    <form id="editHolidayForm">
        <input type="hidden" name="packageId" value="<?php echo $package_id; ?>">
        <div class="mb-3">
            <label for="holidayName" class="form-label">Holiday Name:</label>
            <input type="text" id="holidayName" name="holidayName" class="form-control" value="<?php echo $holiday_name; ?>" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (Nights):</label>
            <input type="number" id="duration" name="duration" class="form-control" value="<?php echo $duration; ?>" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination:</label>
            <input type="text" id="destination" name="destination" class="form-control" value="<?php echo $destination; ?>" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" id="location" name="location" class="form-control" value="<?php echo $location; ?>">
        </div>
        <div class="mb-3">
            <label for="amenities" class="form-label">Amenities:</label>
            <textarea id="amenities" name="amenities" class="form-control"><?php echo $amenities; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Holiday Package</button>
    </form>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editHolidayForm').submit(function(e) {
            e.preventDefault(); 
           
            var formData = $(this).serialize();
           
            $.ajax({
                type: 'POST',
                url: 'Assets/Backend/update_package.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                  
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>