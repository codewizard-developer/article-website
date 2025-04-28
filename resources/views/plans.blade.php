<!DOCTYPE html>
<html lang="en">

<head>
    <!-- REQUIRE META -->
    <base href="{{ url('/') }}/">
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
    <meta name="keywords"
        content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">

    <!-- FOR WEBPAGE TITLE -->
    <title>Pricing Plan - Classicads</title>

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
    
    <!-- Add QR code library with integrity check -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" 
            integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer"></script>
    
    <!-- Additional CSS for payment modal -->
    <style>
        /* Add this to your CSS file (main.css or in a style tag in the head) */

/* Sidebar active state */
.sidebar-part {
    position: fixed;
    top: 0;
    left: -100%;
    width: 280px;
    height: 100vh;
    z-index: 999;
    background: #ffffff;
    transition: all 0.5s ease-in-out;
    box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
}

.sidebar-part.active {
    left: 0;
}

/* Body state when sidebar is active (prevents scrolling) */
body.sidebar-active {
    overflow: hidden;
}

/* Mobile nav states */
.mobile-nav {
    display: none;
}

@media (max-width: 991px) {
    .mobile-nav {
        display: block;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #ffffff;
        box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.1);
        z-index: 990;
    }
    
    .mobile-nav.active {
        transform: translateY(0);
    }
}
        .payment-qr {
            text-align: center;
            margin-bottom: 20px;
        }
        
        #qrcode-container {
            margin: 20px auto;
            max-width: 200px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 10px;
        }
        
        #qrcode-container img {
            max-width: 100%;
            height: auto;
        }
        
        .payment-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .payment-details h5 {
            margin-bottom: 10px;
            color: #555;
        }
        
        .payment-details h6 {
            font-weight: bold;
            color: #28a745;
        }
        
        .upi-info {
            margin-top: 15px;
            font-size: 14px;
            color: #6c757d;
        }
        
        .plan-selector {
            margin-bottom: 20px;
        }
        
        .plan-selector select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
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
                <form class="header-form" method="GET" action="{{ route('search.results') }}">
                <div class="header-search">
    <form id="search-form" action="{{ route('search.results') }}" method="GET">
        <button type="submit" title="Search Submit"><i class="fas fa-search"></i></button>
        <input type="text" name="query" placeholder="Search, Whatever you need..."
            value="{{ request('query') }}" required>
        <button type="button" title="Search Option" class="option-btn"><i class="fas fa-sliders-h"></i></button>
    </form>
</div>

<script>
    // Get the form and input element
    const searchForm = document.getElementById('search-form');
    const searchInput = searchForm.querySelector('input[name="query"]');

    // Add event listener for form submission
    searchForm.addEventListener('submit', function (event) {
        // Check if the input is empty
        if (!searchInput.value.trim()) {
            // Prevent form submission
            event.preventDefault();
            alert('Please enter a search term.');
        }
    });
</script>

                    <div class="header-option">
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
                        <a href="{{ url('/user/' . Auth::user()->id) }}" class="sidebar-name">
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
                            @endif <li class="navbar-item"><a class='navbar-link' href='/article'>Post Article</a></li>
                            <li class="navbar-item"><a class='navbar-link' href='/user-articles'>My Article</a></li>
                            <li class="navbar-item"><a class='navbar-link' href='/user/plans'>Plans</a></li>
                            <li class="navbar-item"><a class='navbar-link' href='/contactus'>Contact Us</a></li>
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
                            <h3>₹60</h3>
                            <h4>Basic Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>1 Regular Ad for 7 days</p>
                            </li>
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Basic Features</p>
                            </li>
                            <li>
                                <i class="fas fa-times"></i>
                                <p>No Featured Ads</p>
                            </li>
                            <li>
                                <i class="fas fa-times"></i>
                                <p>No Priority Support</p>
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a class='btn btn-inline select-plan' href='javascript:void(0)' data-plan="Basic" data-amount="60">
                                <i class="fas fa-check-circle"></i>
                                <span>Select Plan</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card price-active">
                        <div class="price-head">
                            <i class="flaticon-car-wash"></i>
                            <h3>₹150</h3>
                            <h4>Standard Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>5 Regular Ads for 30 days</p>
                            </li>
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Featured Ads</p>
                            </li>
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Email Support</p>
                            </li>
                            <li>
                                <i class="fas fa-times"></i>
                                <p>No Priority Listing</p>
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a class='btn btn-inline select-plan' href='javascript:void(0)' data-plan="Standard" data-amount="150">
                                <i class="fas fa-check-circle"></i>
                                <span>Select Plan</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div class="price-head">
                            <i class="flaticon-airplane"></i>
                            <h3>₹200</h3>
                            <h4>Premium Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Unlimited Ads for 60 days</p>
                            </li>
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Featured & Highlighted Ads</p>
                            </li>
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Priority Support</p>
                            </li>
                            <li>
                                <i class="fas fa-plus"></i>
                                <p>Top Listing Position</p>
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a class='btn btn-inline select-plan' href='javascript:void(0)' data-plan="Premium" data-amount="200">
                                <i class="fas fa-check-circle"></i>
                                <span>Select Plan</span>
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

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Complete Your Payment</h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="payment-details text-center mb-4">
                        <h5>Selected Plan: <span id="selected-plan-name">Standard</span></h5>
                        <h6>Amount: ₹<span id="selected-plan-amount">150</span></h6>
                    </div>
                    
                    <div class="plan-selector">
                        <label for="plan-select">Select Plan:</label>
                        <select id="plan-select" class="form-control">
                            <option value="Basic" data-amount="60">Basic Plan - ₹60</option>
                            <option value="Standard" data-amount="150" selected>Standard Plan - ₹150</option>
                            <option value="Premium" data-amount="200">Premium Plan - ₹200</option>
                        </select>
                    </div>
                    
                    <div class="payment-qr text-center mb-4">
                        <h5>Scan QR Code to Pay</h5>
                        <div id="qrcode-container">
                            <!-- QR code will be generated here -->
                        </div>
                        <p class="text-muted mt-2">Or pay using UPI directly</p>
                        <div class="upi-info">
                            <p>UPI ID: <strong>yourmerchant@upi</strong></p>
                        </div>
                    </div>
                    
                    <form id="payment-form" action="{{ route('process.payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan_name" id="plan-name-input" value="Standard">
                        <input type="hidden" name="amount" id="amount-input" value="150">
                        
                        <div class="form-group">
                            <label for="utr-id">UTR ID (Transaction Reference)</label>
                            <input type="text" class="form-control" id="utr-id" name="utr_id" placeholder="Enter UTR ID" required>
                            <small class="form-text text-muted">You'll receive this after completing the payment</small>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-inline">
                                <i class="fas fa-check-circle"></i>
                                <span>Confirm Payment</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                            <button type="button" data-toggle="modal" data-target="#currency"><i class="fas fa-rupee-sign"></i>INR</button>
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
                    <p>All Copyrights Reserved &copy; 2025 - Developed by <a href="#">Mironcoder</a></p>
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
                    <button class="modal-link active">Indian Rupee (INR) - ₹</button>
                    <button class="modal-link">United States Dollar (USD) - $</button>
                    <button class="modal-link">Euro (EUR) - €</button>
                    <button class="modal-link">British Pound (GBP) - £</button>
                    <button class="modal-link">Australian Dollar (AUD) - A$</button>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================
                  CURRENCY MODAL PART END
        =======================================-->

    <!--=====================================
                  LANGUAGE MODAL PART START
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
                    <button class="modal-link">Hindi</button>
                    <button class="modal-link">Bengali</button>
                    <button class="modal-link">Arabic</button>
                    <button class="modal-link">Spanish</button>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================
                   LANGUAGE MODAL PART END
        =======================================-->
<!-- Updated QR code library and implementation -->

<!-- Make sure the library is properly loaded first -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<!-- Update the JavaScript section -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Check if QRCode is available globally
    if (typeof QRCode === 'undefined') {
        console.error("QRCode library not loaded! Loading it now...");
        loadQRCodeLibrary();
    } else {
        initQRCodeFunctionality();
    }
    
    // Function to dynamically load the QRCode library if needed
    function loadQRCodeLibrary() {
        const script = document.createElement('script');
        script.src = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js";
        script.onload = function() {
            console.log("QRCode library loaded successfully!");
            initQRCodeFunctionality();
        };
        script.onerror = function() {
            console.error("Failed to load QRCode library!");
            handleQRCodeFailure();
        };
        document.head.appendChild(script);
    }
    
    // Main QR code initialization
    function initQRCodeFunctionality() {
        // When a plan is selected from the pricing cards
        document.querySelectorAll('.select-plan').forEach(function(button) {
            button.addEventListener('click', function() {
                const planName = this.getAttribute('data-plan');
                const amount = this.getAttribute('data-amount');
                
                // Set the values in the modal
                document.getElementById('selected-plan-name').textContent = planName;
                document.getElementById('selected-plan-amount').textContent = amount;
                document.getElementById('plan-select').value = planName;
                
                // Set hidden form values
                document.getElementById('plan-name-input').value = planName;
                document.getElementById('amount-input').value = amount;
                
                // Generate QR code
                generateQRCode(planName, amount);
                
                // Show the modal
                $('#paymentModal').modal('show');
            });
        });
        
        // When plan is changed in the dropdown
        document.getElementById('plan-select').addEventListener('change', function() {
            const planName = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const amount = selectedOption.getAttribute('data-amount');
            
            // Update displayed values
            document.getElementById('selected-plan-name').textContent = planName;
            document.getElementById('selected-plan-amount').textContent = amount;
            
            // Update hidden form values
            document.getElementById('plan-name-input').value = planName;
            document.getElementById('amount-input').value = amount;
            
            // Regenerate QR code
            generateQRCode(planName, amount);
        });
        
        // Generate initial QR code when page loads
        generateQRCode('Standard', 150);
    }
    
    // Function to generate QR code
    function generateQRCode(planName, amount) {
        try {
            // Clear previous QR code
            const qrContainer = document.getElementById("qrcode-container");
            qrContainer.innerHTML = '';
            
            // Using the UPI ID
            const upiId = "9103917535@ibl";
            const upiPaymentUrl = `upi://pay?pa=${upiId}&pn=ClassicadsPayment&am=${amount}&cu=INR&tn=Payment for ${planName} plan`;
            
            // Create new QR code with error handling
            try {
                new QRCode(qrContainer, {
                    text: upiPaymentUrl,
                    width: 180,
                    height: 180,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });
                console.log("QR code generated successfully!");
            } catch (qrError) {
                console.error("Error in QRCode constructor:", qrError);
                createFallbackQRCode(qrContainer, upiPaymentUrl);
            }
            
            // Update UPI ID display
            const upiInfoElements = document.querySelectorAll('.upi-info p strong');
            if (upiInfoElements.length > 0) {
                upiInfoElements.forEach(el => el.textContent = upiId);
            }
        } catch (error) {
            console.error("QR Code generation error:", error);
            handleQRCodeFailure();
        }
    }
    
    // Alternative QR code generation as fallback
    function createFallbackQRCode(container, data) {
        try {
            // Try another method to create QR code
            const qr = new QRCode(container, {
                text: data,
                width: 180,
                height: 180
            });
        } catch (error) {
            console.error("Fallback QR code generation failed:", error);
            handleQRCodeFailure();
        }
    }
    
    // Function to handle QR code generation failure
    function handleQRCodeFailure() {
        const upiId = "9103917535@ibl";
        const qrContainer = document.getElementById("qrcode-container");
        if (qrContainer) {
            qrContainer.innerHTML = `
                <div style="padding: 15px; text-align: center;">
                    <p>Unable to generate QR code. Please use the UPI ID directly:</p>
                    <p><strong>${upiId}</strong></p>
                </div>
            `;
        }
    }
    
    // Form validation before submission
    document.getElementById('payment-form').addEventListener('submit', function(e) {
        // Check if UTR ID is provided
        const utrInput = document.getElementById('utr-id').value.trim();
        if (!utrInput) {
            e.preventDefault();
            alert('Please enter the UTR ID to confirm your payment');
            return false;
        }
    });
});
</script>
<!-- Required JS for Bootstrap and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
    // Add this to the bottom of your HTML file, before the closing </body> tag
// Make sure jQuery is loaded before this script

$(document).ready(function() {
    // Sidebar toggle functionality
    $('.sidebar-btn').on('click', function() {
        $('.sidebar-part').addClass('active');
        $('body').addClass('sidebar-active');
    });

    $('.sidebar-cross').on('click', function() {
        $('.sidebar-part').removeClass('active');
        $('body').removeClass('sidebar-active');
    });

    // Close sidebar when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.sidebar-part, .sidebar-btn').length) {
            $('.sidebar-part').removeClass('active');
            $('body').removeClass('sidebar-active');
        }
    });

    // Mobile menu toggle functionality (if needed)
    $('.menu-bar').on('click', function() {
        $('.mobile-nav').toggleClass('active');
        $('body').toggleClass('mobile-nav-active');
    });

    // Dropdown toggle in sidebar navigation
    $('.navbar-dropdown > .navbar-link').on('click', function(e) {
        e.preventDefault();
        $(this).next('.dropdown-list').slideToggle(300);
        $(this).children('.fas').toggleClass('fa-plus fa-minus');
    });
});
</script>

</body>
</html>