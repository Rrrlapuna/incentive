<?php include 'navbar.php' ?>

<h2 class="mb-4 text-center">Employee Form</h2>
<div class="row justify-content-center px-5">
    <div class="col-md-6 pe-3">
        <form id="employeeForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
                <div class="invalid-feedback">Please enter a valid name without numbers.</div>
            </div>
            <div class="mb-3">
                <label for="employeeId" class="form-label">Employee ID</label>
                <input type="text" class="form-control" id="employeeId" placeholder="Enter Employee ID" required>
                <div class="invalid-feedback">Please enter your employee ID.</div>
            </div>
            <div class="mb-3">
                <label for="employeeId" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter employee password" required>
                <div class="invalid-feedback">Please enter your employee passsword</div>
            </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="designation" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
            <div class="invalid-feedback">Please enter user Email.</div>
        </div>
        <div class="mb-3">
            <label for="joiningDate" class="form-label">Joining Date</label>
            <input type="date" class="form-control" id="joiningDate" required>
            <div class="invalid-feedback">Please select User joining date.</div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="width: 10%;" id="submitButton" >Add Employee</button>
    </form>
</div>
</div>
<!-- <script>
    const form = document.getElementById('employeeForm');
    const submitButton = document.getElementById('submitButton');
    form.addEventListener('input', () => {
        const inputs = form.querySelectorAll('input[required]');
        let isValid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });
        // Custom validation for name and phone number
        const nameInput = document.getElementById('name');
        const phoneNumberInput = document.getElementById('phoneNumber');
        const nameRegex = /^[a-zA-Z\s]*$/;
        const phoneRegex = /^\d{10}$/;

        if (!nameRegex.test(nameInput.value.trim())) {
            nameInput.classList.add('is-invalid');
            isValid = false;
        } else {
            nameInput.classList.remove('is-invalid');
        }

        if (!phoneRegex.test(phoneNumberInput.value.trim())) {
            phoneNumberInput.classList.add('is-invalid');
            isValid = false;
        } else {
            phoneNumberInput.classList.remove('is-invalid');
        }
        submitButton.disabled = !isValid;
    });
</script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#employeeForm').submit(function(e) {
            e.preventDefault(); 

            var formData = {
                name: $('#name').val(),
                employeeId: $('#employeeId').val(),
                password: $('#password').val(),
                email: $('#email').val(),
                joiningDate: $('#joiningDate').val()
            };
            console.log('Form Data:', formData);
           
            $.ajax({
                type: 'POST',
                url: 'Assets/Backend/add_user.php', 
                data: formData,
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    $('#employeeForm')[0].reset();
                },
                error: function(xhr, status, error) {
                   
                    console.error(xhr.responseText);
                   
                }
            });
        });
       
        // $('#employeeForm input').on('input', function() {
        //     var isValid = $('#employeeForm')[0].checkValidity();
        //     $('#submitButton').prop('disabled', !isValid);
        // });
    });
</script>