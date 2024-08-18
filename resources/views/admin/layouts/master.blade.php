<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/600x300?text=Logo+1" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('modernize2/css/styles.css') }}" />

    <title>{{ config('app.name2') }} | @yield('title')</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('modernize2/css/owl.carousel.min.css') }}" />

    <!-- Datatables  -->
    <link rel="stylesheet" href="{{ asset('modernize2/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('modernize2/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('modernize2/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('modernize2/css/dropzone2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modernize2/css/select2.min.css') }}">
    @stack('css')

</head>

<body>
    {{-- <div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="polite"
        aria-atomic="false">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-circle fs-6"></i>
            <div>
                <h5 class="text-white fs-3 mb-1">Welcome to Modernize</h5>
                <h6 class="text-white fs-2 mb-0">Easy to costomize the Template!!!</h6>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div> --}}
    <!-- Preloader -->
    {{-- <div class="preloader">
        <img src="{{ asset('modernize2/images/favicon.png') }}" alt="Logo Toko" class="lds-ripple img-fluid" />
    </div> --}}
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @includeIf('admin.layouts.sidebar-vertical')
        <!--  Sidebar End -->

        <div class="page-wrapper">
            <!--  Header Start -->
            @includeIf('admin.layouts.header')
            <!--  Header End -->

            @includeIf('admin.layouts.sidebar-horizontal')

            <!--  Main Container Start -->
            <div class="body-wrapper">
                <div class="container-fluid">
                    <nav class="py-3" style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="fw-bolder">Home</a>
                            </li>
                            @section('breadcrumb')
                            @show
                        </ol>
                    </nav>

                    <!--  Content Start -->
                    @yield('content')
                    <!--  Content End -->

                    <!--  Row 1 -->
                    {{-- <div class="row">
                        <div class="col-lg-8 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                        <div class="mb-3 mb-sm-0">
                                            <h5 class="card-title fw-semibold">Revenue Updates</h5>
                                            <p class="card-subtitle mb-0">Overview of Profit</p>
                                        </div>
                                        <select class="form-select w-auto">
                                            <option value="1">March 2024</option>
                                            <option value="2">April 2024</option>
                                            <option value="3">May 2024</option>
                                            <option value="4">June 2024</option>
                                        </select>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <div id="chart"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="hstack mb-4 pb-1">
                                                <div
                                                    class="p-8 bg-primary-subtle rounded-1 me-3 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-grid-dots text-primary fs-6"></i>
                                                </div>
                                                <div>
                                                    <h4 class="mb-0 fs-7 fw-semibold">$63,489.50</h4>
                                                    <p class="fs-3 mb-0">Total Earnings</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-baseline mb-4">
                                                    <span class="round-8 text-bg-primary rounded-circle me-6"></span>
                                                    <div>
                                                        <p class="fs-3 mb-1">Earnings this month</p>
                                                        <h6 class="fs-5 fw-semibold mb-0">$48,820</h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-baseline mb-4 pb-1">
                                                    <span
                                                        class="round-8 text-bg-secondary rounded-circle me-6"></span>
                                                    <div>
                                                        <p class="fs-3 mb-1">Expense this month</p>
                                                        <h6 class="fs-5 fw-semibold mb-0">$26,498</h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary w-100">
                                                        View Full Report
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <!-- Yearly Breakup -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h5 class="card-title mb-9 fw-semibold">
                                                        Yearly Breakup
                                                    </h5>
                                                    <h4 class="fw-semibold mb-3">$36,358</h4>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span
                                                            class="me-1 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-arrow-up-left text-success"></i>
                                                        </span>
                                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                        <p class="fs-3 mb-0">last year</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-4">
                                                            <span
                                                                class="round-8 text-bg-primary rounded-circle me-2 d-inline-block"></span>
                                                            <span class="fs-2">2024</span>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="round-8 bg-primary-subtle rounded-circle me-2 d-inline-block"></span>
                                                            <span class="fs-2">2024</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-center">
                                                        <div id="breakup"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <!-- Monthly Earnings -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-start">
                                                <div class="col-8">
                                                    <h5 class="card-title mb-9 fw-semibold">
                                                        Monthly Earnings
                                                    </h5>
                                                    <h4 class="fw-semibold mb-3">$6,820</h4>
                                                    <div class="d-flex align-items-center pb-1">
                                                        <span
                                                            class="me-2 rounded-circle bg-danger-subtle round-20 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                                        </span>
                                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                        <p class="fs-3 mb-0">last year</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-end">
                                                        <div
                                                            class="text-white text-bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-currency-dollar fs-6"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="earning"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--  Row 2 -->
                    {{-- <div class="row">
                        <!-- Employee Salary -->
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title fw-semibold mb-1">
                                            Employee Salary
                                        </h5>
                                        <p class="card-subtitle mb-0">Every month</p>
                                        <div id="salary" class="mb-7 pb-8"></div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="bg-primary-subtle rounded me-8 p-8 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-grid-dots text-primary fs-6"></i>
                                                </div>
                                                <div>
                                                    <p class="fs-3 mb-0 fw-normal">Salary</p>
                                                    <h6 class="fw-semibold text-dark fs-4 mb-0">
                                                        $36,358
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="text-bg-light rounded me-8 p-8 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-grid-dots text-muted fs-6"></i>
                                                </div>
                                                <div>
                                                    <p class="fs-3 mb-0 fw-normal">Profit</p>
                                                    <h6 class="fw-semibold text-dark fs-4 mb-0">
                                                        $5,296
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project -->
                        <div class="col-lg-4">
                            <div class="row">
                                <!-- Customers -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body pb-0 mb-xxl-4 pb-1">
                                            <p class="mb-1 fs-3">Customers</p>
                                            <h4 class="fw-semibold fs-7">36,358</h4>
                                            <div class="d-flex align-items-center mb-3">
                                                <span
                                                    class="me-2 rounded-circle bg-danger-subtle round-20 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-arrow-down-right text-danger"></i>
                                                </span>
                                                <p class="text-dark fs-3 mb-0">+9%</p>
                                            </div>
                                        </div>
                                        <div id="customers"></div>
                                    </div>
                                </div>
                                <!-- Projects -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="mb-1 fs-3">Projects</p>
                                            <h4 class="fw-semibold fs-7">78,298</h4>
                                            <div class="d-flex align-items-center mb-3">
                                                <span
                                                    class="me-1 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-arrow-up-left text-success"></i>
                                                </span>
                                                <p class="text-dark fs-3 mb-0">+9%</p>
                                            </div>
                                            <div id="projects"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Comming Soon -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-7 pb-2">
                                        <div class="me-3 pe-1">
                                            <img src="images/user-1.jpg" class="shadow-warning rounded-2"
                                                alt="" width="72" height="72" />
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold fs-5 mb-2">
                                                Super awesome, Vue coming soon!
                                            </h5>
                                            <p class="fs-3 mb-0">22 March, 2024</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <ul class="hstack mb-0">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="images/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white"
                                                        width="44" height="44" alt="" />
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="images/user-3.jpg"
                                                        class="rounded-circle border border-2 border-white"
                                                        width="44" height="44" alt="" />
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="images/user-4.jpg"
                                                        class="rounded-circle border border-2 border-white"
                                                        width="44" height="44" alt="" />
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="images/user-5.jpg"
                                                        class="rounded-circle border border-2 border-white"
                                                        width="44" height="44" alt="" />
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#"
                                            class="text-bg-light rounded py-1 px-8 d-flex align-items-center text-decoration-none">
                                            <i class="ti ti-message-2 fs-6 text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Selling Products -->
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card text-bg-primary border-0 w-100">
                                <div class="card-body pb-0">
                                    <h5 class="fw-semibold mb-1 text-white card-title">
                                        Best Selling Products
                                    </h5>
                                    <p class="fs-3 mb-3 text-white">Overview 2024</p>
                                    <div class="text-center mt-3">
                                        <img src="images/piggy.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                                <div class="card mx-2 mb-2 mt-n2">
                                    <div class="card-body">
                                        <div class="mb-7 pb-1">
                                            <div class="d-flex justify-content-between align-items-center mb-6">
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">MaterialPro</h6>
                                                    <p class="fs-3 mb-0">$23,568</p>
                                                </div>
                                                <div>
                                                    <span
                                                        class="badge bg-primary-subtle text-primary fw-semibold fs-3">55%</span>
                                                </div>
                                            </div>
                                            <div class="progress bg-primary-subtle" style="height: 4px">
                                                <div class="progress-bar w-50" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center mb-6">
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">Flexy Admin</h6>
                                                    <p class="fs-3 mb-0">$23,568</p>
                                                </div>
                                                <div>
                                                    <span
                                                        class="badge bg-secondary-subtle text-secondary fw-bold fs-3">20%</span>
                                                </div>
                                            </div>
                                            <div class="progress bg-secondary-subtle" style="height: 4px">
                                                <div class="progress-bar text-bg-secondary w-25" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--  Row 3 -->
                    {{-- <div class="row">
                        <!-- Weekly Stats -->
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">Weekly Stats</h5>
                                    <p class="card-subtitle mb-0">Average sales</p>
                                    <div id="stats" class="my-4"></div>
                                    <div class="position-relative">
                                        <div class="d-flex align-items-center justify-content-between mb-7">
                                            <div class="d-flex">
                                                <div
                                                    class="p-6 bg-primary-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-grid-dots text-primary fs-6"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">Top Sales</h6>
                                                    <p class="fs-3 mb-0">Johnathan Doe</p>
                                                </div>
                                            </div>
                                            <div class="bg-primary-subtle badge">
                                                <p class="fs-3 text-primary fw-semibold mb-0">+68</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-7">
                                            <div class="d-flex">
                                                <div
                                                    class="p-6 bg-success-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-grid-dots text-success fs-6"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">Best Seller</h6>
                                                    <p class="fs-3 mb-0">MaterialPro Admin</p>
                                                </div>
                                            </div>
                                            <div class="bg-success-subtle badge">
                                                <p class="fs-3 text-success fw-semibold mb-0">+68</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex">
                                                <div
                                                    class="p-6 bg-danger-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-grid-dots text-danger fs-6"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">
                                                        Most Commented
                                                    </h6>
                                                    <p class="fs-3 mb-0">Ample Admin</p>
                                                </div>
                                            </div>
                                            <div class="bg-danger-subtle badge">
                                                <p class="fs-3 text-danger fw-semibold mb-0">+68</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Top Performers -->
                        <div class="col-lg-8 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h5 class="card-title fw-semibold">Top Performers</h5>
                                            <p class="card-subtitle mb-0">Best Employees</p>
                                        </div>
                                        <div>
                                            <select class="form-select">
                                                <option value="1">March 2024</option>
                                                <option value="2">April 2024</option>
                                                <option value="3">May 2024</option>
                                                <option value="4">June 2024</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle text-nowrap mb-0">
                                            <thead>
                                                <tr class="text-muted fw-semibold">
                                                    <th scope="col" class="ps-0">Assigned</th>
                                                    <th scope="col">Project</th>
                                                    <th scope="col">Priority</th>
                                                    <th scope="col">Budget</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border-top">
                                                <tr>
                                                    <td class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2 pe-1">
                                                                <img src="images/user-1.jpg" class="rounded-circle"
                                                                    width="40" height="40"
                                                                    alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                                                <p class="fs-2 mb-0 text-muted">
                                                                    Web Designer
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-3">Elite Admin</p>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge fw-semibold py-1 w-85 bg-primary-subtle text-primary">Low</span>
                                                    </td>
                                                    <td>
                                                        <p class="fs-3 text-dark mb-0">$3.9K</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2 pe-1">
                                                                <img src="images/user-2.jpg" class="rounded-circle"
                                                                    width="40" height="40"
                                                                    alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-semibold mb-1">John Deo</h6>
                                                                <p class="fs-2 mb-0 text-muted">
                                                                    Web Developer
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-3">Flexy Admin</p>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge fw-semibold py-1 w-85 bg-warning-subtle text-warning">Medium</span>
                                                    </td>
                                                    <td>
                                                        <p class="fs-3 text-dark mb-0">$24.5K</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2 pe-1">
                                                                <img src="images/user-3.jpg" class="rounded-circle"
                                                                    width="40" height="40"
                                                                    alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                                                <p class="fs-2 mb-0 text-muted">
                                                                    Web Manager
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-3">Material Pro</p>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge fw-semibold py-1 w-85 bg-info-subtle text-info">High</span>
                                                    </td>
                                                    <td>
                                                        <p class="fs-3 text-dark mb-0">$12.8K</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2 pe-1">
                                                                <img src="images/user-4.jpg" class="rounded-circle"
                                                                    width="40" height="40"
                                                                    alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-semibold mb-1">Yuvraj Sheth</h6>
                                                                <p class="fs-2 mb-0 text-muted">
                                                                    Project Manager
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-3">Xtreme Admin</p>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge fw-semibold py-1 w-85 bg-success-subtle text-success">Low</span>
                                                    </td>
                                                    <td>
                                                        <p class="fs-3 text-dark mb-0">$4.8K</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border-0 ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2 pe-1">
                                                                <img src="images/user-5.jpg" class="rounded-circle"
                                                                    width="40" height="40"
                                                                    alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-semibold mb-1">Micheal Doe</h6>
                                                                <p class="fs-2 mb-0 text-muted">
                                                                    Content Writer
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="border-0">
                                                        <p class="mb-0 fs-3">Helping Hands WP Theme</p>
                                                    </td>
                                                    <td class="border-0">
                                                        <span
                                                            class="badge fw-semibold py-1 w-85 bg-danger-subtle text-danger">High</span>
                                                    </td>
                                                    <td class="border-0">
                                                        <p class="fs-3 text-dark mb-0">$9.3K</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- @includeIf('tes.layouts.footer') --}}
            </div>
            <!--  Main Container End -->

            <script>
                function handleColorTheme(e) {
                    $("html").attr("data-color-theme", e);
                    $(e).prop("checked", !0);
                }
            </script>

            <!--  Setting Button -->
            <button
                class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7"></i>
            </button>
            <!--  Setting Button -->

            <!--  Setting Content Start -->
            <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                        Settings
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" data-simplebar style="height: calc(100vh - 80px)">
                    <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="theme-layout" id="light-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="light-layout"><i
                                class="icon ti ti-brightness-up fs-7 me-2"></i>Light</label>

                        <input type="radio" class="btn-check" name="theme-layout" id="dark-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="dark-layout"><i
                                class="icon ti ti-moon fs-7 me-2"></i>Dark</label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="ltr-layout"><i
                                class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR</label>

                        <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="rtl-layout"><i
                                class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL</label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                    <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                        <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="BLUE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="AQUA_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="PURPLE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Green_Theme')" for="green-theme-layout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="CYAN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="red-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Red_Theme')" for="red-theme-layout" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="RED_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="vertical-layout"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="vertical-layout"><i
                                    class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><i
                                    class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal</label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="layout" id="boxed-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="boxed-layout"><i
                                class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed</label>

                        <input type="radio" class="btn-check" name="layout" id="full-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="full-layout"><i
                                class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full</label>
                    </div>

                    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <a href="javascript:void(0)" class="fullsidebar">
                            <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="full-sidebar"><i
                                    class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full</label>
                        </a>
                        <div>
                            <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><i
                                    class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse</label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="card-layout" id="card-with-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-with-border"><i
                                class="icon ti ti-border-outer fs-7 me-2"></i>Border</label>

                        <input type="radio" class="btn-check" name="card-layout" id="card-without-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-without-border"><i
                                class="icon ti ti-border-none fs-7 me-2"></i>Shadow</label>
                    </div>
                </div>
            </div>
            <!--  Setting Content End -->
        </div>

        <!--  Search Bar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                    <span
                                        class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                    <span
                                        class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--  Shopping Cart -->
        {{-- <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header py-4">
                <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">
                    Shopping Cart
                </h5>
                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
            </div>
            <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
                <ul class="mb-0">
                    <li class="pb-7">
                        <div class="d-flex align-items-center">
                            <img src="images/product-1.jpg" width="95" height="75"
                                class="rounded-1 me-9 flex-shrink-0" alt="" />
                            <div>
                                <h6 class="mb-1">Supreme toys cooker</h6>
                                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                    <div class="input-group input-group-sm w-50">
                                        <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success"
                                            type="button" id="add1">
                                            -
                                        </button>
                                        <input type="text"
                                            class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="add1" value="1" />
                                        <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add"
                                            type="button" id="addo2">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pb-7">
                        <div class="d-flex align-items-center">
                            <img src="images/product-2.jpg" width="95" height="75"
                                class="rounded-1 me-9 flex-shrink-0" alt="" />
                            <div>
                                <h6 class="mb-1">Supreme toys cooker</h6>
                                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                    <div class="input-group input-group-sm w-50">
                                        <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success"
                                            type="button" id="add2">
                                            -
                                        </button>
                                        <input type="text"
                                            class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="add2" value="1" />
                                        <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add"
                                            type="button" id="addon34">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pb-7">
                        <div class="d-flex align-items-center">
                            <img src="images/product-3.jpg" width="95" height="75"
                                class="rounded-1 me-9 flex-shrink-0" alt="" />
                            <div>
                                <h6 class="mb-1">Supreme toys cooker</h6>
                                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                    <div class="input-group input-group-sm w-50">
                                        <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success"
                                            type="button" id="add3">
                                            -
                                        </button>
                                        <input type="text"
                                            class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="add3" value="1" />
                                        <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add"
                                            type="button" id="addon3">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="align-bottom">
                    <div class="d-flex align-items-center pb-7">
                        <span class="text-dark fs-3">Sub Total</span>
                        <div class="ms-auto">
                            <span class="text-dark fw-semibold fs-3">$2530</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pb-7">
                        <span class="text-dark fs-3">Total</span>
                        <div class="ms-auto">
                            <span class="text-dark fw-semibold fs-3">$6830</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-primary w-100">Go to shopping cart</a>
                </div>
            </div>
        </div> --}}

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
    <script src="{{ asset('modernize2/js/vendor.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/app.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/app.init.js') }}"></script>
    <script src="{{ asset('modernize2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/simplebar.min.js') }}"></script>

    <script src="{{ asset('modernize2/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('modernize2/js/theme.js') }}"></script>

    <script src="{{ asset('modernize2/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('modernize2/js/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('modernize2/js/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('modernize2/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/quill.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/quill-init.js') }}"></script>
    <script src="{{ asset('modernize2/js/dropzone2.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/select2-full.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/select2.init.js') }}"></script>
    <script src="{{ asset('modernize2/js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('modernize2/js/repeater-init.js') }}"></script>
    <script src="{{ asset('modernize2/js/custom.js') }}"></script>
    <script src="{{ asset('modernize2/js/owl.carousel.init.js') }}"></script>
    @stack('scripts')
</body>

</html>
