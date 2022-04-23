<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    @yield('after__css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    @php
        $notifications = Auth::user()->unreadNotifications;
    @endphp
    <!--Begin::wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">{{ $notifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{ $notifications->count() }}
                            Notifications</span>
                        <div class="dropdown-divider"></div>
                        @foreach ($notifications as $notification)
                            <a href="{{ route('admin.markAsRead', $notification->id) }}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>{{ $notification->data['msg'] }}
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info" style="margin:auto">
                        <a href="#" class="d-block" style="text-align: center; text-decoration: none;">
                            <h4>{{ Auth::user()->name }}</h4>
                        </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item menu-open">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->role === 'manager' || Auth::user()->role === 'admin')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-tree"></i>
                                        <p>
                                            User Activity
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('manage.order') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Orders</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('table.show') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Bookings</p>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="{{ route('show.inquery') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Inquiries</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('list.category') }}" class="nav-link"><i
                                            class="nav-icon fas fa-th"></i>
                                        <p>Product Category</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.get_vendor_request') }}" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Vendor Request
                                        </p>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->role == 'vendor')
                                <li class="nav-item">
                                    <a href="{{ route('index.product') }}" class="nav-link"><i
                                            class="nav-icon fas fa-th"></i>
                                        <p>Add Products</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('show.product') }}" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Products List
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                            @endif
                            {{-- @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            Inventory
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('show.inventory') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Stock</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.getProfile') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    {{ __('Profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="far fa-circle nav-icon"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $heading_title ?? 'Dashboard' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @if (isset($breadcrum))
                                    <li class="breadcrumb-item"><a href="#">{{ $breadcrum }}</a></li>
                                @else
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                @endif
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <!-- /.row -->
                    <!-- Main row -->
                    <!-- /.row (main row) -->
                </div>
                {{-- begin::User_datatable --}}
                @yield('content')

                @if (Auth::user()->role == 'admin')
                    @if (request()->segment('2') == 'dashboard')
                        @php
                            $user = \App\Models\User::paginate(15);
                            $order = \App\Models\UserOrder::all();
                            $total = \App\Models\UserOrder::pluck('total');
                        @endphp
                        <div class="container d-cont">
                            <div class="row">
                                <div class="col-4 dashboard ml-5">
                                    <h4>{{ count($user) }}</h4>
                                    <p>All User</p>
                                </div>
                                <div class="col-3 dashboard">
                                    <h4>{{ count($order) }}</h4>
                                    <p>Total Order</p>
                                </div>
                                <div class="col-4 dashboard">
                                    <?php $input = 0; ?>
                                    @foreach ($total as $item)
                                        <?php $input += (int) $item; ?>
                                    @endforeach
                                    <h4>Rs {{ $input }}.00</h4>
                                    <p>Total sells Amount</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="container">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th style="text-align: center; width: 210px">Action</th>
                                </thead>
                                @foreach ($user as $key => $data)
                                    <tbody>

                                        <td>{{ ++$key }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->role }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td class="d-flex">
                                                {{-- <form action="{{ route('change.role', $data->id) }}" method="GET">
                                                    <input type="hidden" name="role" value="role">
                                                    <button class="btn btn-primary ml-2"
                                                        onclick="javascript:this.form.submit();">Change Role</button>
                                                </form> --}}

                                                <a href="{{ route('remove.user', $data->id) }}"
                                                    class="btn btn-danger ml-2"> <i class="fa fa-trash"></i> </a>
                                            </td>
                                        @else
                                            <td>
                                                <p style="text-align: center; color:red">Permission Denied</p>
                                            </td>
                                        @endif

                                    </tbody>
                                @endforeach
                            </table>

                            <div class="d-flex justify-content-center">
                                {!! $user->links() !!}
                            </div>
                        </div>

                        {{-- @endif --}}

                        <style>
                            .dashboard {
                                background: red;
                                padding: 10px;
                                margin: 3px;
                                border-radius: 3px;
                            }

                            .d-cont h4,
                            p {
                                color: white;
                                text-align: center;
                            }

                        </style>
                    @endif
                @elseif(Auth::user()->role == 'vendor' && Request::is('admin/dashboard'))
                    <div class="row">
                        <div class="container d-cont">
                            <h4>Welcome {{ Auth::user()->name }}</h4>
                        </div>
                    </div>
                @endif

                {{-- end::User_datatable --}}
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="#">Helmetsss</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!--End::wrapper -->

    @yield('after__js')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</body>

</html>
