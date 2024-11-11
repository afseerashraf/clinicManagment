<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
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
</head>

<body>
    <div class="container">
        <h3>Reset Password</h3>
        <form action="{" method="post">
            @csrf
            <input type="hidden" name="agent_id" value="{{encrypt($agent->id)}}">
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