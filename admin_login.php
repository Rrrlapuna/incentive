<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HyScaler</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .container-fluid {
            height: 700px;
            margin-top: 150px;
            background-color: rgb(237 250 255 / var(--tw-bg-opacity));
        }

        .submit-btn {
            background-color: #004274;
            color: white;
        }

        .loginform {
            border: 3px solid #004274;
            border-radius: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 loginform">
                <h2 class="text-center pt-3">Admin Login</h2>
                <form id="adminLoginForm" method="post" class="px-5 py-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Username</label>
                        <input type="text" class="form-control" id="adminUsername" placeholder="Enter Username" required>
                        <div class="invalid-feedback">Please enter a valid username without numbers.</div>
                    </div>
                    <div class="mb-3">
                        <label for="employeeId" class="form-label">Employee ID</label>
                        <input type="password" class="form-control" id="adminPassword" placeholder="Enter Password" required>
                        <div class="invalid-feedback">Please enter your password</div>
                    </div>
                    <div class="mb-3 text-center"><input class="submit-btn px-3 py-1" type="submit" value="Login"></div>

                </form>

                <div id="message" class="text-center" style="color: red;"></div>
            </div>
        </div>
    </div>
    <script src="Assets/js/bootstrap.bundle.js"></script>
    <script>
    $(document).ready(function() {
        $("#adminLoginForm").submit(function(e) {
            e.preventDefault();
            var adminUsername = $("#adminUsername").val();
            var adminPassword = $("#adminPassword").val();
            console.log(adminUsername);
            console.log(adminPassword);
            $.ajax({
                type: "POST",
                url: "Assets/Backend/adminlogin.php",
                data: {
                    adminUsername: adminUsername,
                    adminPassword: adminPassword
                },
                success: function(response) {
                    if(response === "success") {
                        window.location.href = "admin_dashboard.php";
                    } else {
                        $("#message").html(response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $("#message").html("An error occurred while processing your request. Please try again later.");
                }
            });
        });
    });
</script>

</body>

</html>