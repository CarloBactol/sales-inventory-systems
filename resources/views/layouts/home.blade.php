<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cagayan Appliance Center</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('./css/styles.css') }}" rel="stylesheet" />
    <style>
        #navbarResponsive li a:hover {
            color: red !important;
            transition: 0.5ms ease-in-out !important;
        }

        #carouselExampleControls {
            display: grid;
            place-items: center;
            height: 80%;
            min-height: 600px;
            width: 90%;
            margin: 0 auto;
            border: 1px solid red;
        }

        .carousel-item img {
            min-height: 700px;
            height: 700px !important;
            width: 100% !important;
            max-width: 100% !important;
            /* object-fit: contain !important; */
        }

        header {
            background-color: #fff !important;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg  text-uppercase fixed-top" id="mainNav" style="background-color: yellow">
        <div class="container">
            <a href="" class="navbar-brand">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" height="80px">
            </a>
            <a class="navbar-brand" href="#page-top">
                <span class="text-danger">Cagayan</span> <span class="text-primary">Appliance Center</span></a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3  px-0 px-lg-3 rounded"
                            style="color: black" href="{{ url('/') }}">Home</a></li>
                    @guest
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            style="color: black; " href="{{ route('login') }}">Login</a></li>
                    {{-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href=" {{route('register') }}">Register</a></li> --}}
                    @else
                    @if (Auth::check())
                    @if (Auth::user()->role_as == '1')
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 text-dark px-0 px-lg-3 rounded"
                            href=" {{url('/dashboard') }}">Dashboard</a></li>
                    @else
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link text-dark py-3 px-0 px-lg-3 rounded"
                            href=" {{url('/cashier') }}">Cashier</a></li>
                    @endif

                    @endif
                    @endguest


                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <!-- Footer-->
    <footer class="footer text-center" style="background-color: red">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        Cagayan State University
                        <br />
                        Piat Campus
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Social Media</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Company</h4>
                    <p class="lead mb-0">
                        Good customers want good quality service.
                        Great customers want it even more.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Cagayan State University - Piat Campus 2022</small></div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('./js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>