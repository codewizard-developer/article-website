<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from mironcoder-classicads.netlify.app/assets/ltr/price by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 06:37:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <!--=====================================
                    META-TAG PART START
        =======================================-->
        <base href="{{ url('/') }}/">
        <!-- REQUIRE META -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- AUTHOR META -->
        <meta name="author" content="Mironcoder">
        <meta name="email" content="mironcoder@gmail.com">
        <meta name="profile" content="https://themeforest.net/user/mironcoder">

        <!-- TEMPLATE META -->
        <meta name="name" content="Classicads">
        <meta name="type" content="Classified Advertising">
        <meta name="title" content="Classicads - Classified Ads HTML Template">
        <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
        <!--=====================================
                    META-TAG PART END
        =======================================-->

        <!-- FOR WEBPAGE TITLE -->
        <title>Pricing Plan - Classicads</title>

        <!--=====================================
                    CSS LINK PART START
        =======================================-->
        <!-- FAVICON -->
        <link rel="icon" href="images/favicon.png">

        <!-- FONTS -->
        <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
        <link rel="stylesheet" href="fonts/font-awesome/fontawesome.css">

        <!-- VENDOR -->
        <link rel="stylesheet" href="css/vendor/bootstrap.min.css">

        <!-- CUSTOM -->
        <link rel="stylesheet" href="css/custom/main.css">
        <link rel="stylesheet" href="css/custom/price.css">
        <!--=====================================
                    CSS LINK PART END
        =======================================-->
    </head>
    <body>
        <!--=====================================
                    HEADER PART START
        =======================================-->
        <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <button type="button" class="header-widget sidebar-btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <a class='header-logo' href='index.html'>
                        <img src="images/logo.png" alt="logo">
                    </a>
                    <!-- If the user is logged in, show the profile and logout button -->
                    @if(Auth::check())
                    <!-- If the user is logged in, show the profile link -->
                    <a class="header-widget header-user" href="{{ url('/user/' . Auth::user()->id) }}">
                        <img src="images/user.png" alt="user">
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    @else
                    @endif
                    <button type="button" class="header-widget search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <form class="header-form">
                    <div class="header-search">
                        <button type="submit" title="Search Submit "><i class="fas fa-search"></i></button>
                        <input type="text" placeholder="Search, Whatever you needs...">
                        <button type="button" title="Search Option" class="option-btn"><i
                                class="fas fa-sliders-h"></i></button>
                    </div>
                    <div class="header-option">
                        <div class="option-grid">
                            <div class="option-group"><input type="text" placeholder="City"></div>
                            <div class="option-group"><input type="text" placeholder="State"></div>
                            <div class="option-group"><input type="text" placeholder="Min Price"></div>
                            <div class="option-group"><input type="text" placeholder="Max Price"></div>
                            <button type="submit"><i class="fas fa-search"></i><span>Search</span></button>
                        </div>
                    </div>
                </form>
                <div class="header-right">
                    @if(Auth::check())
                    <!-- Display the logout button if the user is logged in -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <!-- CSRF Token to prevent cross-site request forgery -->
                        <button type="submit" class="header-widget header-user">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    @endif
                    @if(Auth::check())

                    <a class='btn btn-inline post-btn' href='/article'>
                        <i class="fas fa-plus-circle"></i>
                        <span>Post Article</span>
                    </a>

                    @else
                    <a class='btn btn-inline post-btn' href='/user-login'>
                        <span>Login/Register</span>
                    </a>
                    @endif


                </div>
            </div>
        </div>
    </header>

    <aside class="sidebar-part">
        <div class="sidebar-body">
            <div class="sidebar-header">
                <a class='sidebar-logo' href='index.html'><img src="images/logo.png" alt="logo"></a>
                <button class="sidebar-cross"><i class="fas fa-times"></i></button>
            </div>
            <style>
            .avatar-initial {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                background-color: #4CAF50;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: auto;
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 10px;
            }
            </style>
            <div class="sidebar-content">
                <div class="sidebar-profile">
                    @if(Auth::check())
                    @php
                    $firstLetter = strtoupper(substr(Auth::user()->name, 0, 1));
                    $firstName = explode(' ', Auth::user()->name)[0];
                    @endphp

                    {{-- Avatar letter --}}
                    <div class="sidebar-avatar avatar-initial">
                        {{ $firstLetter }}
                    </div>

                    {{-- User name --}}
                    <h4>
                        <a href="{{ url('/user/edit/' . Auth::user()->id) }}" class="sidebar-name">
                            {{ $firstName }}
                        </a>
                    </h4>
                    @else
                    {{-- Default avatar + login text --}}
                    <div class="sidebar-avatar avatar-initial">?</div>
                    <h4><a href="#" class="sidebar-name">Login First</a></h4>

                    {{-- Show login button --}}
                    <a class='btn btn-inline sidebar-post' href='/user-login'>
                        <i class="fas fa-plus-circle"></i>
                        <span>Login</span>
                    </a>
                    @endif
                </div>
                <div class="sidebar-menu">
                    <ul class="nav nav-tabs">
                        <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a></li>
                    </ul>

                    <div class="tab-pane active" id="main-menu">
                        <ul class="navbar-list">
                            <li class="navbar-item"><a class='navbar-link' href='/'>Home</a></li>
                            @if(Auth::check())
    <li class="navbar-item">
        <a class="navbar-link" href="{{ url('/user/' . Auth::user()->id) }}">Profile</a>
    </li>
@endif

                            <li class="navbar-item"><a class='navbar-link' href='/article'>Post Article</a></li>
                            <li class="navbar-item"><a class='navbar-link' href='/user-articles'>My Article</a></li>
                            <li class="navbar-item"><a class='navbar-link' href='/plans'>Plans</a></li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <!-- CSRF Token to prevent cross-site request forgery -->
                                <button type="submit" class="header-widget header-user">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </button>
                            </form>


                        </ul>
                    </div>


                </div>


            </div>
        </div>
    </aside>

    <nav class="mobile-nav">
        <div class="container">
            <div class="mobile-group">
                <a class='mobile-widget' href='index.html'>
                    <i class="fas fa-home"></i>
                    <span>home</span>
                </a>
                <a class='mobile-widget' href='user-form.html'>
                    <i class="fas fa-user"></i>
                    <span>join me</span>
                </a>
                <a class='mobile-widget plus-btn' href='ad-post.html'>
                    <i class="fas fa-plus"></i>
                    <span>Ad Post</span>
                </a>
                <a class='mobile-widget' href='notification.html'>
                    <i class="fas fa-bell"></i>
                    <span>notify</span>
                    <sup>0</sup>
                </a>
                <a class='mobile-widget' href='message.html'>
                    <i class="fas fa-envelope"></i>
                    <span>message</span>
                    <sup>0</sup>
                </a>
            </div>
        </div>
    </nav>
        <!--=====================================
                    MOBILE-NAV PART END
        =======================================-->


        <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
        <section class="single-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>pricing plan</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">price</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


        <!--=====================================
                     PRICE PART START
        =======================================-->
        <section class="price-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="price-card">
                            <div class="price-head">
                                <i class="flaticon-bicycle"></i>
                                <h3>$00</h3>
                                <h4>Free Plan</h4>
                            </div>
                            <ul class="price-list">
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>1 Regular Ad for 7 days</p>
                                </li>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>No Credit card required</p>
                                </li>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>No Top or Featured Ad</p>
                                </li>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>No Ad will be bumped up</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Limited Support</p>
                                </li>
                            </ul>
                            <div class="price-btn">
                                <a class='btn btn-inline' href='user-form.html'>
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Register Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="price-card price-active">
                            <div class="price-head">
                                <i class="flaticon-car-wash"></i>
                                <h3>$23</h3>
                                <h4>Standard Plan</h4>
                            </div>
                            <ul class="price-list">
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>1 Recom Ad for 30 days</p>
                                </li>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>No Featured Ad Available</p>
                                </li>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>No Ad will be bumped up</p>
                                </li>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>No Top Ad Available</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Basic Support</p>
                                </li>
                            </ul>
                            <div class="price-btn">
                                <a class='btn btn-inline' href='user-form.html'>
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Register Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="price-card">
                            <div class="price-head">
                                <i class="flaticon-airplane"></i>
                                <h3>$49</h3>
                                <h4>Premium Plan</h4>
                            </div>
                            <ul class="price-list">
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>1 Featured Ad for 60 days</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Access to All features</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>With Recommended</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Ad Top Category</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Priority Support</p>
                                </li>
                            </ul>
                            <div class="price-btn">
                                <a class='btn btn-inline' href='user-form.html'>
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Register Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading">
                            <h2>Do you have something to advertise?</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
                            <a class='btn btn-outline' href='ad-post.html'>
                                <i class="fas fa-plus-circle"></i>
                                <span>post your ad</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                     PRICE PART END
        =======================================-->


        <!--=====================================
                    FOOTER PART PART
        =======================================-->
        <footer class="footer-part">
            <div class="container">
                <div class="row newsletter">
                    <div class="col-lg-6">
                        <div class="news-content">
                            <h2>Subscribe for Latest Offers</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, aliquid reiciendis! Exercitationem soluta provident non.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="news-form">
                            <input type="text" placeholder="Enter Your Email Address">
                            <button class="btn btn-inline">
                                <i class="fas fa-envelope"></i>
                                <span>Subscribe</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="footer-content">
                            <h3>Contact Us</h3>
                            <ul class="footer-address">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>1420 West Jalkuri Fatullah, <span>Narayanganj, BD</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <p>support@classicads.com <span>info@classicads.com</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <p>+8801838288389 <span>+8801941101915</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="footer-content">
                            <h3>Quick Links</h3>
                            <ul class="footer-widget">
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Orders Tracking</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Size Guide</a></li>
                                <li><a href="#">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="footer-content">
                            <h3>Information</h3>
                            <ul class="footer-widget">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery System</a></li>
                                <li><a href="#">Secure Payment</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="footer-info">
                            <a href="#"><img src="images/logo.png" alt="logo"></a>
                            <ul class="footer-count">
                                <li>
                                    <h5>929,238</h5>
                                    <p>Registered Users</p>
                                </li>
                                <li>
                                    <h5>242,789</h5>
                                    <p>Community Ads</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-card-content">
                            <div class="footer-payment">
                                <a href="#"><img src="images/pay-card/01.jpg" alt="01"></a>
                                <a href="#"><img src="images/pay-card/02.jpg" alt="02"></a>
                                <a href="#"><img src="images/pay-card/03.jpg" alt="03"></a>
                                <a href="#"><img src="images/pay-card/04.jpg" alt="04"></a>
                            </div>
                            <div class="footer-option">
                                <button type="button" data-toggle="modal" data-target="#language"><i class="fas fa-globe"></i>English</button>
                                <button type="button" data-toggle="modal" data-target="#currency"><i class="fas fa-dollar-sign"></i>USD</button>
                            </div>
                            <div class="footer-app">
                                <a href="#"><img src="images/play-store.png" alt="play-store"></a>
                                <a href="#"><img src="images/app-store.png" alt="app-store"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-end">
                <div class="container">
                    <div class="footer-end-content">
                        <p>All Copyrights Reserved &copy; 2021 - Developed by <a href="#">Mironcoder</a></p>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--=====================================
                    FOOTER PART END
        =======================================-->


        <!--=====================================
                  CURRENCY MODAL PART START
        =======================================-->
        <div class="modal fade" id="currency">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Choose a Currency</h4>
                        <button class="fas fa-times" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <button class="modal-link active">United States Doller (USD) - $</button>
                        <button class="modal-link">Euro (EUR) - €</button>
                        <button class="modal-link">British Pound (GBP) - £</button>
                        <button class="modal-link">Australian Dollar (AUD) - A$</button>
                        <button class="modal-link">Canadian Dollar (CAD) - C$</button>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================
                  CURRENCY MODAL PART END
        =======================================-->


        <!--=====================================
                  LANGUAGE MODAL PART END
        =======================================-->
        <div class="modal fade" id="language">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Choose a Language</h4>
                        <button class="fas fa-times" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <button class="modal-link active">English</button>
                        <button class="modal-link">bangali</button>
                        <button class="modal-link">arabic</button>
                        <button class="modal-link">germany</button>
                        <button class="modal-link">spanish</button>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================
                   LANGUAGE MODAL PART END
        =======================================-->

        
        <!--=====================================
                    JS LINK PART START
        =======================================-->
        <!-- VENDOR -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- CUSTOM -->
        <script src="js/custom/main.js"></script>
        <!--=====================================
                    JS LINK PART END
        =======================================-->
    </body>

<!-- Mirrored from mironcoder-classicads.netlify.app/assets/ltr/price by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 06:37:04 GMT -->
</html>












