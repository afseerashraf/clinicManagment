@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Admin Profile</h4>
        </div>
        <div class="card-body p-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-user-circle me-3 text-primary" style="font-size: 1.5rem;"></i>
                    <strong>Name:</strong> <span class="ms-2">{{ session('admin')->name }}</span>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-envelope me-3 text-primary" style="font-size: 1.5rem;"></i>
                    <strong>Email:</strong> <span class="ms-2">{{ session('admin')->email }}</span>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="fas fa-phone-alt me-3 text-primary" style="font-size: 1.5rem;"></i>
                    <strong>Phone:</strong> <span class="ms-2">{{ session('admin')->phone }}</span>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.logout', encrypt(session('admin')->id)) }}" class="btn btn-danger btn-block" style="border-radius: 20px;">
                Logout
            </a>
        </div>
    </div>
</div>

<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMMOr/EO84mr1II2zQU/g0oJqD9d2/0zJ6NT3vq" crossorigin="anonymous">

@endsection
