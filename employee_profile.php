<?php

include('Assets/Backend/dbconfig.php');

session_start();

$employeeId = $_SESSION['employeeUsername'];

$query = "SELECT employee.*, sales.incentive, sales.bonus, sales.holiday, sales.total_sale, sales.holiday_package
          FROM employee
          LEFT JOIN sales ON employee.employeeid = sales.employeeid
          WHERE employee.employeeid = '$employeeId'";

$result = mysqli_query($conn, $query);
?>

<?php include 'user_navbar.php' ?>

<div class="row mx-5">
    <div class="col-md-12">
        <h1 class="mb-4 text-center">Employee Record</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Email</th>
                    <th>Joining Date</th>
                    <th>Password</th>
                    <th>Sale</th>
                    <th>Incentive</th>
                    <th>Bonus</th>
                    <th>Holiday</th>
                    <th>Holiday Package</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['employeeid']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['joining_date']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['total_sale']; ?></td>
                        <td><?php echo $row['incentive']; ?></td>
                        <td><?php echo $row['bonus']; ?></td>
                        <td><?php echo $row['holiday']; ?></td>
                        <td><?php echo $row['holiday_package']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>