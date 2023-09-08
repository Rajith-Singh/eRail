<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://kit.fontawesome.com/3923dbcb09.js" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link href="/../../css/index.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/delay_css.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div >
       
        <!-- Header Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 bg-secondary d-none d-lg-block">
                        <a href="" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                            <h1 class="m-0 display-3 text-primary">eRail</h1>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="row bg-dark d-none d-lg-flex">
                            <div class="col-lg-7 text-left text-white">
                                <div class="h-100 d-inline-flex align-items-center border-right border-primary py-2 px-3">
                                    <i class="fa fa-envelope text-primary mr-2"></i>
                                    <small>gmr@railway.gov.lk</small>
                                </div>
                                <div class="h-100 d-inline-flex align-items-center py-2 px-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <small>+94 11 4 600 111</small>
                                </div>
                            </div>
                            <div class="col-lg-5 text-right">
                                <div class="d-inline-flex align-items-center pr-2">
                                    <a class="text-primary p-2" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="text-primary p-2" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="text-primary p-2" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="text-primary p-2" href="">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a class="text-primary p-2" href="">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                            <a href="" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 display-4 text-primary">eRail</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="index.html" class="nav-item nav-link active">Home</a>
                                    <a href="about.html" class="nav-item nav-link">About</a>
                                    <a href="service.html" class="nav-item nav-link">Service</a>
                                    <a href="project.html" class="nav-item nav-link">Project</a>
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                        <div class="dropdown-menu rounded-0 m-0">
                                            <a href="blog.html" class="dropdown-item">Latest Blog</a>
                                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                                        </div>
                                    </div>
                                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                                </div>
                                <a href="" class="btn btn-primary mr-3 d-none d-lg-block">Get A Quote</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        <!-- Header End -->

        <div class="py-4">
            @yield('content')
           
        </div>

        <!-- Footer Start -->
            <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
                <div class="row pt-5">
                    <div class="col-lg-3 col-md-6 mb-5">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 mt-n3 display-4 text-primary">eRail</h1>
                        </a>
                        <p>An Automated Solution for Railway Conceptual Modernization and Expansion System</p>
                        <h5 class="font-weight-semi-bold text-white mb-2">Revolutionizing Railways</h5>
                        <img src="/img/eRail_Logo.png" class="logo" width="80px" height="80px"> &nbsp &nbsp
                        <img src="/img/Sri_Lanka_Railway_logo.png" class="logo" width="80px" height="80px"> &nbsp &nbsp
                        <img src="/img/team_logo.png" class="logo" width="80px" height="80px"> &nbsp &nbsp

                    </div>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <h4 class="font-weight-semi-bold text-primary mb-4">Get In Touch</h4>
                        <p><i class="fa fa-map-marker-alt text-primary mr-2"></i>P.O. Box 355, <br> Railway Head Quarters, <br> Maradana, Colombo 10</p>
                        <p><i class="fa fa-phone-alt text-primary mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope text-primary mr-2"></i>gmr@railway.gov.lk</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <h4 class="font-weight-semi-bold text-primary mb-4">Quick Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Projects</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <h4 class="font-weight-semi-bold text-primary mb-4">Newsletter</h4>
                        <p>Rebum labore lorem dolores kasd est, et ipsum amet et at kasd, ipsum sea tempor magna tempor. Accu kasd sed ea duo ipsum.</p>
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control border-0" style="padding: 25px;" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: #3E3E4E !important;">
                <div class="row">
                    <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                        <p class="m-0 text-white">&copy; <a href="#">eRail</a>. All Rights Reserved. Designed by ZEALOTS
                        </p>
                    </div>
                    <div class="col-lg-6 text-center text-md-right">
                        <ul class="nav d-inline-flex">
                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">Privacy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">Terms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">FAQs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- Footer End -->
     
    </div>
        @yield('page-css')
		
        @yield('page-script')
    
        {{-- <div id="map"></div> --}}
   

    {{-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9xkCZ1dvL1ho6NNLdquof56LM8Jh9wlc&callback=initMap">
</script> --}}
  
          {{-- <script src="/../../js/index.js"></script> --}}
</body>
</html>



