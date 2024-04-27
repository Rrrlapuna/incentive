<?php include 'navbar.php' ?>
<?php session_start(); ?>
<style>
.holiday-form{
    border: 3px solid #004274;
    border-radius: 40px;
}
</style>
<h2 class="m-4 text-center">Manage Holiday Packages</h2>
<div class="row d-flex justify-content-center mb-5">
<div class="col-md-6 holiday-form p-5">
    <form id="holidayForm" class="mx-5">
        <div class="mb-3">
            <label for="holidayName" class="form-label">Holiday Name:</label>
            <input type="text" id="holidayName" name="holidayName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (Nights):</label>
            <input type="number" id="duration" name="duration" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination:</label>
            <input type="text" id="destination" name="destination" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" id="location" name="location" class="form-control">
        </div>
        <div class="mb-3">
            <label for="amenities1" class="form-label">Amenities:1</label>
            <input type="text" id="amenities1" name="amenities1" class="form-control">
        </div>
        <div class="mb-3">
            <label for="amenities2" class="form-label">Amenities:2</label>
            <input type="text" id="amenities2" name="amenities2" class="form-control">
        </div>
        <div class="mb-3">
            <label for="amenities3" class="form-label">Amenities:3</label>
            <input type="text" id="amenities3" name="amenities3" class="form-control">
        </div>
        <div class="text-center"><button type="submit" class="btn btn-primary">Add Holiday Package</button></div>
    </form>
</div>
</div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#holidayForm').submit(function(e) {
            e.preventDefault();
           
            var formData = {
                holidayName: $('#holidayName').val(),
                duration: $('#duration').val(),
                destination: $('#destination').val(),
                location: $('#location').val(),
                amenities1: $('#amenities1').val(),
                amenities2: $('#amenities2').val(),
                amenities3: $('#amenities3').val()
            };
          
            $.ajax({
                type: 'POST',
                url: 'Assets/Backend/holiday_package.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    $('#holidayForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>