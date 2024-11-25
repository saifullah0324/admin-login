<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Shop :: Administrative Panel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">


            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                        <img src="{{asset('admin-assets/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        @if(isset($user))
                        <h4 class="h4 mb-0"><strong>{{ $user->name }}</strong></h4>
                        <div class="mb-3">{{ $user->email }}</div>
                        @else
                        <h4 class="h4 mb-0"><strong>Guest</strong></h4>
                        <div class="mb-3">Not logged in</div>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('profile') }}" class="dropdown-item">
                            <i class="bi bi-person-circle" style="margin-right: 10px"></i> Change Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>



                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="#" class="brand-link">
                <img src="{{asset('admin-assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">LARAVEL SHOP</span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="dashboard.html" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categories.html" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="subcategory.html" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="brands.html" class="nav-link">
                                <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p>Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="products.html" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>Products</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">

                                <i class="fas fa-truck nav-icon"></i>
                                <p>Shipping</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="orders.html" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="discount.html" class="nav-link">
                                <i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
                                <p>Discount</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="users.html" class="nav-link">
                                <i class="nav-icon  fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages.html" class="nav-link">
                                <i class="nav-icon  far fa-file-alt"></i>
                                <p>Pages</p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile View</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ Auth::user()->role === 'admin' ? route('dashboard') : route('user.dashboard') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </div>

            </section>

            <section class="content">

                <div class="container-fluid">
                    <form id="profileForm" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="pb-5 pt-3">
                                        <button type="button" id="updateProfile" class="btn btn-primary" style="margin-top: 15px; margin-left: 30px">
                                            <span id="buttonText">Update</span>
                                            <span id="spinner" class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true" style="display:none;"></span>
                                        </button>
                                        <!-- <a href="{{ route('dashboard') }}" class="btn btn-outline-dark ml-3">Cancel</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </section>

        </div>

        <footer class="main-footer">

            <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
        </footer>

    </div>

    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

    </script>

    <script>
        document.getElementById('updateProfile').addEventListener('click', function(e) {
            e.preventDefault();


            document.getElementById('spinner').style.display = 'inline-block';
            document.getElementById('buttonText').style.display = 'none';

            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
            };

            fetch("{{ route('profile.update') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {

                    document.getElementById('spinner').style.display = 'none';
                    document.getElementById('buttonText').style.display = 'inline';

                    if (data.success) {
                        toastr.success(data.message);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(data.message);
                    }
                })
                .catch(error => {

                    document.getElementById('spinner').style.display = 'none';
                    document.getElementById('buttonText').style.display = 'inline';

                    toastr.error('An error occurred while updating the profile.');
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>