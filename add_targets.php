<?php

include('Assets/Backend/dbconfig.php');

if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];

    $query = "SELECT * FROM employee WHERE id = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $employee = mysqli_fetch_assoc($result);
} else {

    header("Location: employees.php");
    exit();
}
?>
<?php session_start(); ?>
<?php include 'navbar.php' ?>

<div class="container mt-5">
    <h2 class="text-center">Sales Performance Form for <span style="color: green;"> <?php echo $employee['name']; ?></span></h2>
    <form id="salesForm" class="mt-4">
        <div class="mb-3">
            <label for="employeeId" class="form-label">Enter Employee ID:</label>
            <input type="text" id="employeeId" name="employeeId" class="form-control" value="<?php echo $employee['employeeid']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="sales" class="form-label">Enter Sales Results:</label>
            <input type="number" id="sales" name="sales" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate and Store Incentive</button>
    </form>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZWVHfQoE4l797TftmX2zj0s0V5V5CGpG3goPf6br5BZHFLF1+b4NRVp4w+1c9B" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#salesForm').submit(function(e) {
            e.preventDefault();

            var formData = {
                employeeId: $('#employeeId').val(),
                sales: $('#sales').val()
            };

            $.ajax({
                type: 'POST',
                url: 'Assets/Backend/add_targets.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    alert(response.message);

                },
                error: function(xhr, status, error) {

                    alert(xhr.responseText);
                    $('#salesForm')[0].reset();

                }
            });
        });
    });
</script>