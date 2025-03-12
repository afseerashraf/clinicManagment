<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Rceptionist Mail</title>
    <link rel="stylesheet" href="{{ asset('receptionist/css/mail_id.css') }}">
</head>

<body>
<main class="login-form">

<div class="cotainer">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Reset Password</div>

                <div class="card-body">



                  @if (Session::has('message'))

                       <div class="alert alert-success" role="alert">

                          {{ Session::get('message') }}

                      </div>

                  @endif



                    <form action="{{ route('receptionist.sendLink') }}" method="POST">

                        @csrf

                        <div class="form-group row">

                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">

                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>

                                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror

                            </div>

                        </div>

                        <div class="col-md-6 offset-md-4">

                            <button type="submit" class="btn btn-primary">

                                Send Password Reset Link

                            </button>

                        </div>

                    </form>

                      

                </div>

            </div>

        </div>

    </div>

</div>

</main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>