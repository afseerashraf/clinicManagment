<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sidebar/sidebar.css') }}">
    <script src="{{ asset('sidebar/sidebar.js') }}"></script>
    <title>@yield('title')</title>

    <style>
        /* General Layout */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
        }

        .navbar {
            background-color: #0d6efd;
        }

        .navbar-brand h4 {
            color: white;
            font-weight: bold;
            margin-left: 176px;
            
        }

        .navbar-light .navbar-toggler {
            color: white;
            border-color: white;
        }

        .navbar-light .navbar-toggler-icon {
            color: white;
        }

        .btn-outline-success {
            color: white;
            border-color: white;
        }

        .btn-outline-success:hover {
            background-color: white;
            color: #0d6efd;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 183px;
            top: 0;
            left: 0;
            background-color: #0d6efd;
            padding-top: 20px;
            color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
            color: #fff;
        }

        /* Main Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color:#f4f6f9;
        }

        .container-fluid {
            margin-top: 10px;
        }

        .search-bar {
            width: 300px;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            color: #999;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h4>Clinic Management</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('doctor.show') }}">Doctors</a>
        <a href="{{ route('patient.show') }}">Patients</a>
        <a href="{{ route('unpaid.patients') }}">Unpaid Patients</a>
        <a href="{{ route('receptionist.show') }}">Receptionists</a>
        <a href="{{ route('show.paidPatients') }}">Paid Patients</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Clinic Management. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
