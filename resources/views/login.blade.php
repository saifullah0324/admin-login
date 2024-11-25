<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
     
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3">Administrative Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" id="loginForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                       
                       
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary" id="loginButton">
                                <span class="spinner-border spinner-border-sm" id="spinner" style="display: none;" role="status" aria-hidden="true"></span>
                                Login
                            </button>
                        </div>
                     
                    </div>
                </form>
                <p class="mb-1 mt-3">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
           
        </div>
       
    </div>
    <div id="errorMessage" style="color:red;"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
     $(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        $('#spinner').show();

        $.ajax({
            url: '{{ route("login") }}',
            method: 'POST',
            data: {
                email: $('input[name="email"]').val(),
                password: $('input[name="password"]').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect_url;
                    toastr.success('Login successful! Redirecting...');
                } else {
                    toastr.error(response.message || 'Login failed. Please try again.');
                    $('#errorMessage').text(response.message);
                }
            },
            error: function(xhr) {
                let error = xhr.responseJSON?.message || 'An error occurred. Please try again.';
                toastr.error(error);
                $('#errorMessage').text(error);
            },
            complete: function() {
                $('#spinner').hide();
                $('#loginButton').prop('disabled', false);
            }
        });
    });
});

    </script>
</body>

</html>