<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #343a40;
            padding: 1rem;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #f2e7e5 !important;
        }

        /* Sticky Navbar */
        .navbar.sticky-top {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Banner Section */
        .banner {
            background-image: url('https://source.unsplash.com/1600x600/?clinic,hospital');
            background-size: cover;
            background-position: center;
            height: 500px;
            position: relative;
            text-align: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .banner h1 {
            font-size: 4rem;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 10px;
        }

        /* About Us */
        .about-us {
            padding: 50px 0;
            text-align: center;
        }

        /* Services */
        .services {
            background-color: #f2f2f2;
            padding: 50px 0;
            text-align: center;
        }

        /* Doctors Section */
        
    /* Card Hover Effect */
    .doctor-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .doctor-card:hover {
        transform: scale(1.05); /* Enlarge the card */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
    }
    .card-img-top {
        width: 120px;
        height: 120px;
    }
    /* Styling for the card button */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }



        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        footer .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.5rem;
        }
        footer .social-icons a:hover {
            color: #f2e7e5;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#doctors">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <section class="banner">
        <h1>Welcome to Our Clinic</h1>
    </section>

    <!-- About Us -->
    <section id="about" class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <p>Our clinic is committed to providing exceptional healthcare services to our community. We prioritize patient care and comfort, ensuring that you receive the best treatment possible. With a dedicated team of professionals, we strive to improve your well-being and make your visit as smooth as possible.</p>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="services">
        <div class="container">
            <h2>Our Services</h2>
            <ul class="list-unstyled">
                <li>General Consultation</li>
                <li>Pediatrics</li>
                <li>Cardiology</li>
                <li>Dermatology</li>
                <li>Minor Surgery</li>
            </ul>
        </div>
    </section>

    <!-- Doctors Section -->
<section id="doctors" class="doctors">
    <div class="container">
        <h2 class="text-center">Meet Our Doctors</h2>
        <div class="row justify-content-center">
            <!-- Doctor 1 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card doctor-card h-100 shadow">
                    <img src="https://via.placeholder.com/100" class="card-img-top rounded-circle mx-auto mt-4" alt="Doctor">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dr. John Doe</h5>
                        <p class="card-text">General Physician</p>
                        <a href="{{route('patient.index')}}" class="btn btn-primary">Book Doctor</a>
                    </div>
                </div>
            </div>
            <!-- Doctor 2 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card doctor-card h-100 shadow">
                    <img src="https://via.placeholder.com/100" class="card-img-top rounded-circle mx-auto mt-4" alt="Doctor">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dr. Jane Smith</h5>
                        <p class="card-text">Pediatrician</p>
                        <a href="{{route('patient.index')}}" class="btn btn-primary">Book Doctor</a>
                    </div>
                </div>
            </div>
            <!-- Doctor 3 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card doctor-card h-100 shadow">
                    <img src="https://via.placeholder.com/100" class="card-img-top rounded-circle mx-auto mt-4" alt="Doctor">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dr. Michael Brown</h5>
                        <p class="card-text">Cardiologist</p>
                        <a href="{{route('patient.index')}}" class="btn btn-primary">Book Doctor</a>
                    </div>
                </div>
            </div>
            <!-- Doctor 4 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card doctor-card h-100 shadow">
                    <img src="https://via.placeholder.com/100" class="card-img-top rounded-circle mx-auto mt-4" alt="Doctor">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dr. Emily White</h5>
                        <p class="card-text">Dermatologist</p>
                        <a href="{{route('patient.index')}}" class="btn btn-primary">Book Doctor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Contact -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Phone: +91 7356233174</p>
            <p>Email: Clinic@gmail.com</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Follow Us:</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            <p>&copy; 2024 Clinic Management. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
