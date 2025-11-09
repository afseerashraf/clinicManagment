<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Clinic Management')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      overflow-x: hidden;
    }

    /* Navbar */
    .navbar {
      background: #0d6efd;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1050;
    }

    .navbar-brand {
      font-weight: 600;
      color: #fff !important;
      letter-spacing: 0.5px;
    }

    .navbar .dropdown-menu {
      right: 0;
      left: auto;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 230px;
      background: #0d6efd;
      color: #fff;
      padding-top: 70px;
      transition: all 0.3s ease-in-out;
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      color: #f1f1f1;
      padding: 12px 20px;
      text-decoration: none;
      font-size: 15px;
      transition: 0.3s;
      border-left: 4px solid transparent;
    }

    .sidebar a:hover {
      background: rgba(255, 255, 255, 0.1);
      border-left: 4px solid #fff;
    }

    .sidebar i {
      margin-right: 10px;
      font-size: 18px;
    }

    .sidebar.collapsed a span {
      display: none;
    }

    /* Main Content */
    .content {
      margin-left: 230px;
      padding: 30px;
      transition: all 0.3s;
    }

    .sidebar.collapsed~.content {
      margin-left: 70px;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 15px 0;
      color: #999;
      font-size: 14px;
      margin-top: 40px;
    }

    @media (max-width: 992px) {
      .sidebar {
        left: -230px;
      }

      .sidebar.show {
        left: 0;
      }

      .content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid px-4">
      <button class="btn btn-outline-light me-3" id="toggleSidebar">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand" href="#">Clinic Management</a>

      <div class="dropdown ms-auto">
        <a href="#" class="text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
          <i class="fas fa-user-circle fa-lg"></i> Admin
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebarMenu">
    @if(auth()->guard('receptionist')->check() && auth()->guard('receptionist')->user()->can('manage_patients'))
      <a href="{{ route('receptionist.profile') }}"><i class="fas fa-user"></i><span>Profile</span></a>
      <a href="{{ route('patient.index') }}"><i class="fas fa-user-plus"></i><span>Register Patient</span></a>
      <a href="{{ route('patient.show') }}"><i class="fas fa-users"></i><span>Patients</span></a>
      <a href="{{ route('unpaid.patients') }}"><i class="fas fa-file-invoice-dollar"></i><span>Unpaid Patients</span></a>
      <a href="{{ route('show.paidPatients') }}"><i class="fas fa-money-bill"></i><span>Paid Patients</span></a>
    @endif
  </div>

  <!-- Content -->
  <div class="content">
    <div class="container-fluid">
      @yield('content')
    </div>

    <footer>
      <p>&copy; {{ date('Y') }} Clinic Management System. All Rights Reserved.</p>
    </footer>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebarMenu');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
    });

    // Responsive sidebar toggle for mobile
    document.addEventListener('click', (e) => {
      if (window.innerWidth < 992 && !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
        sidebar.classList.remove('show');
      }
    });
  </script>
</body>

</html>
