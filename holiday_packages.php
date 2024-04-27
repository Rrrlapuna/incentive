<?php

include('Assets/Backend/dbconfig.php');

$query = "SELECT * FROM holiday_packages";
$result = mysqli_query($conn, $query);
?>
<?php session_start(); ?>
<?php include 'navbar.php' ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Holiday Packages</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <div class="card mb-4 mx-3 shadow-sm">
                    <div class="card-body">
                        <img src="Assets/Images/travel.jpg" alt="" style="width: 100%;">
                        <h3 class="card-title text-center"><?php echo $row['holiday_name']; ?></h3>
                        <p class="card-text">
                            <strong>Duration:</strong> <?php echo $row['duration']; ?> Nights<br>
                            <strong>Destination:</strong> <?php echo $row['destination']; ?><br>
                            <?php if (!empty($row['location'])) { ?>
                                <strong>Location:</strong> <?php echo $row['location']; ?><br>
                            <?php } ?>
                            <?php if (!empty($row['amenities'])) { ?>
                                <strong>Amenities:</strong> <?php echo $row['amenities']; ?><br>
                            <?php } ?>
                        </p>
                        <div class="text-center"> <a href="edit_package.php?id=<?php echo $row['id']; ?>" class="btn btn-primary text-center">Edit</a></div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="text-center"><button class="btn btn-success"><a href="holiday.php" class="text-decoration-none text-white">Add New Package</a></button></div>
    </div>
</div>