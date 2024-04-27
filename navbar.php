

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HyScaler</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .navbar {
            background: #004274;
            color: white;
        }

        .nav-link {
            color: white;
            font-weight: bold;
        }

        .nav-link:hover {
            color: white;
            font-weight: bold;
        }

        .btn {
            background: #004274;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Employee
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add_user.php">Add Employee</a></li>
                            <li><a class="dropdown-item" href="employees.php">Edit Employee</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="holiday_packages.php">Holiday</a>
                    </li>
                </ul>
            </div>
            <form action="logout.php" method="post" class="me-3">
                <button type="submit" class="btn btn-warning">Logout</button>
            </form>

        </div>
    </nav>
    <script src="Assets/js/bootstrap.bundle.js"></script>
</body>

</html>