<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HyScaler</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.7.1.min.js"></script>
    <style>
        body {
            background-image: url("Assets/Images/mountain.jpg");
            height: 500px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            font-family: poppins;
        }

        .row {
            margin-top: 200px;
        }

        .btn {
            width: 74px;
        }

        .welcome {
            color: black
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class=" text-center fw-bold welcome">WELCOME TO MY WEBSITE</h1>
                <h2 class="text-white" style="font-size: 40px;">LogIn as</h2>
                <div class="login-section">
                    <button class="btn btn-success"><a href="admin_login.php" class="text-decoration-none text-white">Admin</a></button>
                    <button class="btn btn-warning"><a href="user_login.php" class="text-decoration-none text-white">User</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="Assets/js/bootstrap.bundle.js"></script>
</body>

</html>