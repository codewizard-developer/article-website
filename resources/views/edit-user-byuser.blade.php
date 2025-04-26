<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home - Classicads</title>

    <link rel="icon" href="images/favicon.png">

    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="fonts/font-awesome/fontawesome.css">

    <link rel="stylesheet" href="css/vendor/slick.min.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">

    <link rel="stylesheet" href="css/custom/main.css">
    <link rel="stylesheet" href="css/custom/index.css">

</head>
@extends('header')
@section('content')
<section class="single-banner dashboard-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>profile</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dash-header-part">
    <div class="container">
        <div class="dash-header-card">
            <div class="row">
                <div class="col-lg-5">
                    <div class="dash-header-left">
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
                        <div class="dash-avatar">
                            @php
                            $firstLetter = strtoupper(substr($user->name, 0, 1));
                            $firstName = explode(' ', $user->name)[0];
                            @endphp
                            <div class="sidebar-avatar avatar-initial">
                                {{ $firstLetter }}
                            </div>
                        </div>
                        <div class="dash-intro">
                            <h4><a href="#">{{$user->name}}</a></h4>
                            <h5>User</h5>
                            <ul class="dash-meta">
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <span>{{$user->phone}}</span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span>{{$user->email}}</span>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{$user->address}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                            <h2>{{$user->article_stock}}</h2>
                            <p>Article Stock</p>
                        </div>
                        <div class="dash-focus dash-list">
                            <h2>{{$articleCount}}</h2>
                            <p>total Post</p>
                        </div>
                        <div class="dash-focus dash-book">
                            <h2>{{$verifiedCount}}</h2>
                            <p>total Post</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dash-header-alert alert fade show">
                        <p>From your account dashboard. you can easily check & view your recent orders, manage your
                            shipping and billing addresses and Edit your password and account details.</p>
                        <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection