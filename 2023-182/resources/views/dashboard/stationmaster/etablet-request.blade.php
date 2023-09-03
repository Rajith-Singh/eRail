<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eRail: An Automated Solution for Railway Conceptual Modernization and Expansion System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="/../../favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/../../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/../../css/style.css" rel="stylesheet">

    <style>
    /* Styling for the pop-up overlay */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 999;
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s, opacity 0.5s;
    }

    /* Styling for the pop-up container */
    .popup {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      width: 300px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    /* Styling for the form inside the pop-up */
    .popup form {
      display: flex;
      flex-direction: column;
    }

    /* Styling for the form inputs */
    .popup input[type="text"],
    .popup input[type="email"],
    .popup input[type="submit"] {
      margin-bottom: 10px;
      padding: 5px;
    }

    .station-name {
        background-color: #007bff; /* Set the background color */
        color: #fff; /* Set the text color */
        padding: 20px; /* Add padding for spacing */
        border-radius: 10px; /* Add rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow */
        overflow: hidden; /* Hide overflowing content */
        transition: all 0.3s; /* Smooth transition for size changes */
        white-space: nowrap; /* Prevent text from wrapping */
    }

    .station-name h2 {
        font-size: 18px; /* Customize the font size */
        margin: 0; /* Remove default margin */
        color:#fff
    }

  </style>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f59cb7544bad8b84a40a', {
         cluster: 'ap2'
        });

        var channel = pusher.subscribe('popup-channel');
        channel.bind('etablet', function(data) {
            alert(JSON.stringify(data));
        });
    </script>

    

</head>


<body>
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


        <!-- Page Header Start -->
        <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">e-Tablet Requesting</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn btn-sm btn-outline-light" href="">Home</a>
                        <i class="fas fa-angle-double-right text-light mx-2"></i>
                        <a class="btn btn-sm btn-outline-light disabled" href="">eTablet Requesting</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Content Start -->
    <div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-12">
                <h1 class="section-title mb-3">  {{ Auth::guard('stationmaster')->user()->down_station }} <- {{ Auth::guard('stationmaster')->user()->station }} -> {{ Auth::guard('stationmaster')->user()->up_station }} </h1>
            </div>

            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif

        </div>
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0"> <!-- Use col-lg-12 to take up full width -->
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="form-row">
                            <div class="col-sm-6 control-group">
                                <h5> Status </h5> 
                                <input type="text" class="form-control p-4" id="name" value="Close" readonly/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <h5> Log history </h5> 
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" id="message" readonly>
                            </textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- Down -->

                <div class="container">
                    <div class="row">
                        <!-- Left View: Down Section -->
                        <div class="col-lg-5 mb-4 mb-lg-0" style="min-height: 400px;">
                            <div class="position-relative h-100 rounded overflow-hidden">
                                <form action="/stationmaster/request" method="post">
                            @csrf
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->station }}" name="req" hidden> 
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->down_station }}" name="des" hidden>
                            <input type="text" value="0" name="status" hidden>
                                
                            <button class="btn btn-primary btn-block py-3 px-5" style="margin-top: 20px;" type="submit">Request eTablet from {{ Auth::guard('stationmaster')->user()->down_station }}</button>

                        </form>

                        <form action="/stationmaster/generatetablet" method="post">
                            @csrf
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->station }}" name="t_req" hidden> 
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->down_station }}" name="t_des" hidden>

                            <div style="margin-top:15px;">
                                    <p> Train ID </p>
                                    <input type="text" class="form-control p4" name="train">
                                </div>

                            <button class="btn btn-danger btn-block py-3 px-5" style="margin-top: 20px;" type="submit">Generate eTablet</button>

                        </form>

                        </div>
                    </div>


                    <!-- Station -->

                   
                    <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                        <div class="station-name">
                            <h2>{{ Auth::guard('stationmaster')->user()->station }}</h2>
                        </div>
                    </div>

                        <!-- Up -->
                        
                        <div class="col-lg-5" style="min-height: 400px;">
                        <div class="position-relative h-100 rounded overflow-hidden">
                            <form action="/stationmaster/request" method="post">
                            @csrf
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->station }}" name="req" hidden> 
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->up_station }}" name="des" hidden>
                            <input type="text" value="0" name="status" hidden>
                            

                            <button class="btn btn-success btn-block py-3 px-5" style="margin-top: 20px;" type="submit">Request eTablet from {{ Auth::guard('stationmaster')->user()->up_station }}</button>

                        </form>

                        <form action="/stationmaster/generatetablet" method="post">
                            @csrf
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->station }}" name="t_req" hidden> 
                            <input type="text" value="{{ Auth::guard('stationmaster')->user()->up_station }}" name="t_des" hidden>

                            <div style="margin-top:15px;">
                                    <p> Train ID </p>
                                    <input type="text" class="form-control p4" name="train">
                                </div>
                                

                            <button class="btn btn-danger btn-block py-3 px-5" style="margin-top: 20px;" type="submit">Generate eTablet</button>

                        </form>
                        
                        </div>
                    </div>
                </div>
            </div>

                </div>
                </div></div>


    <!-- Content End -->



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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary px-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/../../lib/easing/easing.min.js"></script>
    <script src="/../../lib/waypoints/waypoints.min.js"></script>
    <script src="/../../lib/counterup/counterup.min.js"></script>
    <script src="/../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/../../lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/../../lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="/../../js/main.js"></script>



</body>

</html>

