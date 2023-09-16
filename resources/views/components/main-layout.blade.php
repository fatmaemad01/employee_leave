<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- plugins:css -->
    <!-- Using Font Awesome via CDN -->
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body style="font-family:'Raleway', sans-serif;">
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"> <img src="{{ asset('img/logo.png') }}"
                        style="margin-left: 20px; " alt="" height="61px" width="100px">
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item">
                        <p class="text-secondary mt-2 fw-bold"> <span
                                style="font-weight: bold;">{{ ucfirst(Auth::user()->type) }} :</span>
                            {{ Auth::user()->first_name }}</p>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="fas fa-user"></i>
                            <span class="count"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-bold float-left dropdown-header">Notifications</p>
                            @foreach (Auth::user()->notifications as $notification)
                                <a class="dropdown-item preview-item" href="{{ $notification->data['link'] }}">
                                    <div class="preview-thumbnail">
                                        @if ($notification->unread())
                                            <div class="preview-icon bg-info">
                                                <i class="ti-info-alt mx-0"></i>
                                            </div>
                                        @else
                                            <div class="preview-icon bg-success">
                                                <i class="ti-info-alt mx-0"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">
                                            {{ $notification->data['body'] }}</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('img/face11.jpg') }}" alt="profile" />
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas " id="sidebar"
                style=" font-family:'Raleway', sans-serif; font-weight:bold;">
                <ul class="nav">
                    <li class="nav-item mb-2">
                        <a class="nav-link"
                            @if (Auth::user()->type == 'administrator') href="{{ route('user.home.admin', Auth::id()) }}"
                            @elseif(Auth::user()->type == 'employee')
                            href="{{ route('user.employee', Auth::id()) }}" @endif>
                            <i class="fas fa-address-book menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leave_request.create') }}">
                            <i class="fas fa-share menu-icon"></i>
                            <span class="menu-title">Send Leave Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-registered menu-icon"></i>
                            <span class="menu-title">Register Person</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leave_type.create') }}">
                            <i class="fas fa-plus menu-icon"></i>
                            <span class="menu-title">Add Leave Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leave_type.index') }}">
                            <i class="fas fa-eye menu-icon"></i>
                            <span class="menu-title">Leave Types</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leave_request.index') }}">
                            <i class="fas fa-bell menu-icon"></i>
                            <span class="menu-title">Leave Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log.index') }}">
                            <i class="fas fa-file menu-icon"></i>
                            <span class="menu-title">Leave Logs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn"
                                style="margin: 0; padding:0 ; font-family:'Raleway', sans-serif; font-weight:bold;">
                                <a class="nav-link">
                                    <i class="fas fa-sign-out-alt menu-icon"></i>
                                    <span class="menu-title">Logout</span>
                                </a>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-center">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Employee Leave
                            Management System Copyright © 2023. </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    </div>

    @stack('scripts')

    <!-- Plugin js for this page -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    @vite('resources/js/app.js')

</body>

</html>
