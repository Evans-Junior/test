<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: bolder;
        }

        .container {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .radio-group label {
            margin-right: 20px;
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        .radio-group label {
            color: #333;
        }

        .radio-group input[type="radio"]:checked + label {
            color: #853E3E;
            font-weight: bold;
        }
        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            flex: 1;
            margin-right: 10px;
        }

        @media (max-width: 576px) {
            .search-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../view/homepage.php">ASBED</a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Welcome, Admin Name
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="mt-3 mb-3">
                <a href="../admin/dashboard.php" class="btn btn-secondary">< Back</a>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 offset-md-3">
                <form class="search-form">
                    <input type="text" class="form-control search-input" placeholder="Search for a user">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <h2 class="mt-4">User Management</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add New User</h5>
                <form>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <div class="radio-group">
                            <input type="radio" id="role-manager" name="role" value="manager">
                            <label for="role-manager">Manager</label>
                            <input type="radio" id="role-student" name="role" value="student">
                            <label for="role-student">Student</label>
                            <input type="radio" id="role-admin" name="role" value="admin">
                            <label for="role-admin">Admin</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User List</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Akwesi Nyarko</td>
                                <td>akwesi.nyarko@ashesi.edu.gh</td>
                                <td>Admin</td>
                                <td>
                                    <button class="btn btn-success btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
