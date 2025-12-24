@extends('layout.layout')

@section('title', 'reset password')
<style>
/* Reset padding and margin */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

/* Centered container styling */
.container {
    max-width: 450px;
    margin: 10vh auto;
    padding: 2rem;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Adjust link styling */
a {
    display: block;
    margin-bottom: 1rem;
    text-decoration: none;
    color: #0d6efd;
}

/* Label and input styling */
label {
    font-weight: bold;
    display: block;
    margin-top: 1rem;
    text-align: left;
}

input.form-control {
    margin-bottom: 1rem;
    width: 100%;
}

/* Button styling */
.btn-outline-primary {
    width: 100%;
}

/* Footer text */
.footer-text {
    padding-top: 1.5rem;
    font-style: italic;
}
</style>

@section('content')

    <div class="container">
        <h3>Reset Password</h3>
        <form action="{{ route('doctor.resetedPassword') }}" method="post">
            @csrf
            <input type="hidden" name="doctor_id" value="{{encrypt($doctor->id)}}">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <label for="password">Confirm Passwod</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Enter password" required>
            @error('confirmPassword') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <button type="submit" class="btn btn-outline-primary mt-3">Reset</button>


        </form>
    </div>

@endsection
