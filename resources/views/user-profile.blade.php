
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <title>Bootstrap Basic | Dashonic - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Pichforest" name="author" />
        <!-- App favicon -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Pichforest" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    
    </head>
<body>
   
    <div class="container">
        <h2>Edit User</h2>
    
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label>ID</label>
                <input type="text" class="form-control" value="{{ $user->id }}" disabled>
            </div>
    
            <div class="mb-3">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
    
            <div class="mb-3">
                <label>Username *</label>
                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            </div>
    
            <div class="mb-3">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
    
            <div class="mb-3">
                <label>Email Verified At</label>
                <input type="datetime-local" name="email_verified_at" class="form-control" value="{{ old('email_verified_at', optional($user->email_verified_at)->format('Y-m-d\TH:i')) }}">
            </div>
    
            <div class="mb-3">
                <label>Email Code</label>
                <input type="text" name="email_code" class="form-control" value="{{ old('email_code', $user->email_code) }}">
            </div>
    
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
            </div>
    
            <div class="mb-3">
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="{{ old('country', $user->country) }}">
            </div>
    
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
            </div>
    
            <div class="mb-3">
                <label>Article Stock</label>
                <input type="number" name="article_stock" class="form-control" value="{{ old('article_stock', $user->article_stock) }}">
            </div>
    
            <div class="mb-3">
                <label>About</label>
                <textarea name="about" class="form-control">{{ old('about', $user->about) }}</textarea>
            </div>
    
            <div class="mb-3">
                <label>New Password (leave blank if not changing)</label>
                <input type="password" name="password" class="form-control">
            </div>
    
            <div class="mb-3">
                <label>Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
    
            <div class="mb-3">
                <label>User Verified</label>
                <select name="userverify" class="form-select">
                    <option value="0" {{ $user->userverify == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $user->userverify == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label>Plan</label>
                <select name="plan" class="form-select">
                    <option value="basic" {{ $user->plan == 'basic' ? 'selected' : '' }}>Basic</option>
                    <option value="premium" {{ $user->plan == 'premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label>Remember Token</label>
                <input type="text" name="remember_token" class="form-control" value="{{ old('remember_token', $user->remember_token) }}">
            </div>
    
            <div class="mb-3">
                <label>Created At</label>
                <input type="text" class="form-control" value="{{ $user->created_at }}" disabled>
            </div>
    
            <div class="mb-3">
                <label>Updated At</label>
                <input type="text" class="form-control" value="{{ $user->updated_at }}" disabled>
            </div>
    
            <button class="btn btn-success">Update User</button>
            <a href="{{ route('dashboard.dashboard') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
