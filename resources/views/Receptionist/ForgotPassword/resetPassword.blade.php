
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('receptionist/css/resetPassword.css') }}">
</head>

<body>
    <div class="container">
        <h3>Reset Password</h3>
        <form action="{{ route('receptionist.resetedPassword') }}" method="POST">
            @csrf
            <input type="hidden" name="receptionist_id" value="{{encrypt($receptionist->id)}}">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            
            <label for="password">Confirm Passwod</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Enter password" required>
            @error('confirmPassword') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <button type="submit" class="btn btn-outline-primary mt-3">Reset</button>


        </form>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
