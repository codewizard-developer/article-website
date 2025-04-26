<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Classicads - User Form</title>

    <link rel="icon" href="images/favicon.png">

    <!-- FOR FONTAWESOME -->
    <link rel="stylesheet" href="fonts/font-awesome/fontawesome.css">

    <!-- FOR BOOTSTRAP -->
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">

    <!-- FOR COMMON STYLE -->
    <link rel="stylesheet" href="css/custom/main.css">

    <!-- FOR USER FORM PAGE STYLE -->
    <link rel="stylesheet" href="css/custom/user-form.css">
    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    <!--=====================================
                    USER-FORM PART START
        =======================================-->
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content">
                <a href="#"><img src="images/logo.png" alt="logo"></a>
                <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
                <p>Biggest Online Advertising Marketplace in the World.</p>
            </div>
        </div>

        <div class="user-form-category">
            <div class="user-form-header">
                <a href="#"><img src="images/logo.png" alt="logo"></a>
                <a href='/'><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>

                </ul>
            </div>

            <div class="tab-pane active" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use credentials to access your account.</p>
                </div>
                <form action="/user-login" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Enter your Email">
                                <small class="form-alert">Please Enter Your Mail</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="pass"
                                    placeholder="Password">
                                <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Password must be correct</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group text-right">
                                <a href="#" class="form-forgot">Forgot password?</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline">
                                    <i class="fas fa-unlock"></i>
                                    <span>Enter your account</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Don't have an account? click on <span><a href="/signup-user"> sign up </a></span></p>
                </div>
            </div>


        </div>
    </section>


    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/custom/main.js"></script>
  
</body>
</html>