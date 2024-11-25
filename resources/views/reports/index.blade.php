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
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item"><a href="categories.html">Leads</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>

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
                        <h4 class="h4 mb-0"><strong>Mohit Singh</strong></h4>
                        <div class="mb-3">example@example.com</div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{asset('admin-assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">LARAVEL SHOP</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contacts.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('leads.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Leads</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tasks.index')}}" class="nav-link">
                                <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p>tasks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('reports.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>Reports</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link"> -->
                        <!-- <i class="nav-icon fas fa-tag"></i> -->
                        <!-- <i class="fas fa-truck nav-icon"></i>
                                <p>Shipping</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="orders.html" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Orders</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="discount.html" class="nav-link">
                                <i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
                                <p>Discount</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="users.html" class="nav-link">
                                <i class="nav-icon  fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="pages.html" class="nav-link">
                                <i class="nav-icon  far fa-file-alt"></i>
                                <p>Pages</p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container">
                    <h2 class="mb-4">Reports</h2>



                    <div class="row">
                        <!-- Leads Table -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">Leads Progress</div>
                                <div class="card-body">
                                    <table id="leadsTable" class="table table-striped">
                                        <form method="GET" action="{{ route('reports.index') }}">
                                            <div class="form-group">
                                                <label for="contact_id">Filter by Contact:</label>
                                                <select name="contact_id" id="contact_id" class="form-control " onchange="this.form.submit()">
                                                    <option value="">-- Select Contact --</option>
                                                    @foreach ($contacts as $contact)
                                                    <option value="{{ $contact->id }}" {{ $searchContact == $contact->id ? 'selected' : '' }}>
                                                        {{ $contact->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Contact Name</th>
                                                <th>Status</th>
                                                <th>Value</th>
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($leads as $lead)
                                            <tr>
                                                <td>{{ $lead->id }}</td>
                                                <td>{{ $lead->contact->name }}</td>
                                                <td>{{ $lead->status }}</td>
                                                <td>{{ $lead->value }}</td>
                                                <td>{{ $lead->notes }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Table -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">Tasks Progress</div>
                                <div class="card-body">
                                    <!-- Filter Form -->
                                    <form method="GET" action="{{ route('reports.index') }}" class="mb-3">
                                        <div class="row">
                                            <!-- Start Date -->
                                            <div class="col-md-5">
                                                <label for="start_date">Start Date:</label>
                                                <input type="date" name="start_date" id="start_date" class="form-control"
                                                    value="{{ request('start_date') }}">
                                            </div>

                                            <!-- End Date -->
                                            <div class="col-md-5">
                                                <label for="end_date">End Date:</label>
                                                <input type="date" name="end_date" id="end_date" class="form-control"
                                                    value="{{ request('end_date') }}">
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Tasks Table -->
                                    <table id="tasksTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($tasksProgress as $task)
                                            <tr>
                                                <td>{{ ucfirst($task->status) }}</td>
                                                <td>{{ $task->count }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2" class="text-center">No tasks found for the selected date range.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Contacts Table -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Contacts Growth</div>
                                <div class="card-body">
                                    <table id="contactsTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>New Contacts</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contactsGrowth as $contact)
                                            <tr>
                                                <td>{{ $contact->month }}</td>
                                                <td>{{ $contact->count }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->

                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">

            <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#leadsTable').DataTable();
            $('#tasksTable').DataTable();
            $('#contactsTable').DataTable();
        });
    </script>
</body>

</html>