<?php
session_start();

include('Assets/Backend/dbconfig.php');

if (isset($_SESSION['employeeUsername'])) {
    $employeeid = $_SESSION['employeeUsername'];

    $query = "SELECT employee.*, sales.holiday_package
              FROM employee 
              LEFT JOIN sales ON employee.employeeid = sales.employeeid
              WHERE employee.employeeid = '$employeeid'";
    $result = mysqli_query($conn, $query);

    if (!$result) {

        echo "Error: " . mysqli_error($conn);
    } else {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $holiday_package = $row['holiday_package'];
            $query = "SELECT * FROM holiday_packages WHERE holiday_name = '$holiday_package'";
            $result = mysqli_query($conn, $query);

            if (!$result) {

                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "No results found for employee with ID: " . $employeeid;
        }
    }
}
?>
<?php include 'user_navbar.php'; ?>
    <style>
        .hol-card {
            max-width: 40%;
            margin: 0 auto;
        }

        .card.mb-4.mx-3.shadow-sm {
            height: 500px;
            width: 500px;
            max-width: 500px;
            margin: 0 auto;
        }

        .text-center.mb-4 {
            text-align: center;
        }

        .card-body {
            background: whitesmoke;
            border-radius: 20px;
            padding: 20px;
        }

        .card-img {
            height: 300px;
            border-radius: 20px;
            overflow: hidden;
        }

        .card-text {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: space-between;
        }

        .card-text p {
            margin: 5px 0px;
            font-size: 18px;
        }

        .card-title.text-center {
            font-size: 34px;
            margin: 20px 0px;
        }

        .card-img img:hover {
            transform: scale(1.2);
        }

        .card-img img {
            transition: all 0.5s ease-in-out;
            cursor: pointer;
        }
    </style>

    <div class="container mt-5">
        <div class="hol-card">
            <h2 class="text-center mb-4">Holiday Package</h2>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 mx-3 shadow-sm">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="Assets/Images/travel.jpg" alt="" style="width: 100%; height:100%;">
                                </div>
                                <div class="content">
                                    <h3 class="card-title text-center"><?php echo $row['holiday_name']; ?></h3>
                                    <div class="card-text">
                                        <p>
                                            <strong>Duration:</strong> <?php echo $row['duration']; ?> Nights
                                        </p>
                                        <p>
                                            <strong>Destination:</strong> <?php echo $row['destination']; ?>
                                        </p>
                                        <?php if (!empty($row['location'])) { ?>
                                            <p>
                                                <strong>Location:</strong> <?php echo $row['location']; ?>
                                            </p>
                                        <?php } ?>
                                        <?php if (!empty($row['amenities'])) { ?>
                                            <p>
                                                <strong>Amenities:</strong> <?php echo $row['amenities']; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
