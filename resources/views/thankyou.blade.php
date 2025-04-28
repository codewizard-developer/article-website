<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Submitted - Thank You</title>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom/main.css">
</head>
<body>
    <section class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-check-circle text-success" style="font-size: 64px;"></i>
                            <h2 class="mt-4">Thank You for Your Payment</h2>
                            
                            @if(session('message'))
                                <div class="alert alert-info mt-3">
                                    {{ session('message') }}
                                </div>
                            @endif
                            
                            <p class="mt-4">Your payment is being processed. Our team will verify the transaction and activate your plan shortly.</p>
                            
                            <div class="mt-5">
                                <a href="/" class="btn btn-inline">Return to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>