<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            background-color: #0d6efd;
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
        }

        .sidebar .brand {
            font-size: 1.4rem;
            font-weight: 600;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 15px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0b5ed7;
            border-left: 4px solid #fff;
        }

        /* Main Content */
        .main-content {
            margin-left: 230px;
            padding: 25px;
        }

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            padding: 10px 20px;
            border-radius: 10px;
        }

        .navbar .nav-item .nav-link {
            color: #333;
            font-weight: 500;
        }

        .navbar .dropdown-menu {
            border-radius: 10px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            border: none;
            border-radius: 15px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            transition: transform 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        footer {
            text-align: center;
            color: #888;
            padding: 20px;
            margin-top: 40px;
        }

        @media (max-width: 991px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                flex-direction: row;
                overflow-x: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <i class="bi bi-hospital"></i> Clinic Admin
        </div>
        <a href="{{ route('admin.dashboard') }}" class="active">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('doctor.show') }}">
            <i class="bi bi-person-badge"></i> Doctors
        </a>
        <a href="{{ route('receptionist.show') }}">
            <i class="bi bi-people"></i> Receptionists
        </a>
        <a href="#">
            <i class="bi bi-calendar-event"></i> Appointments
        </a>
        <a href="#">
            <i class="bi bi-gear"></i> Settings
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <div class="container-fluid">
                <form class="d-flex me-auto">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                </form>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2 fs-5"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            {{-- <li><a class="dropdown-item text-danger" href="{{ route('admin.logout') }}">Logout</a></li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Dashboard Body -->
        @yield('content')

        <footer>
            &copy; {{ date('Y') }} Clinic Management | All Rights Reserved
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
