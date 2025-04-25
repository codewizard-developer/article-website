
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Multi-Step Registration Form</title>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            
            
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                        font-family: 'Poppins', sans-serif;
                    }
            
                    :root {
                        --primary: #6366f1;
                        --primary-dark: #4f46e5;
                        --primary-light: #e0e7ff;
                        --success: #10b981;
                        --danger: #ef4444;
                        --warning: #f59e0b;
                        --dark: #1e293b;
                        --light: #f8fafc;
                        --gray: #64748b;
                        --gray-light: #e2e8f0;
                    }
            
                    body {
                        background: linear-gradient(135deg, #f9fafb 0%, #e4e9f2 100%);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                        padding: 20px;
                    }
            
                    .container {
                        width: 100%;
                        max-width: 700px;
                        background: white;
                        border-radius: 16px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                        overflow: hidden;
                        position: relative;
                    }
            
                    .form-header {
                        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                        color: white;
                        padding: 30px;
                        text-align: center;
                        position: relative;
                        overflow: hidden;
                    }
            
                    .form-header::before {
                        content: '';
                        position: absolute;
                        top: -50%;
                        left: -50%;
                        width: 200%;
                        height: 200%;
                        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
                        transform: rotate(45deg);
                    }
            
                    .form-header h2 {
                        margin-bottom: 10px;
                        font-weight: 600;
                        font-size: 28px;
                        position: relative;
                    }
            
                    .form-header p {
                        opacity: 0.85;
                        font-size: 16px;
                        position: relative;
                    }
            
                    .step-indicator {
                        display: flex;
                        justify-content: space-between;
                        margin: 30px 50px;
                        position: relative;
                    }
            
                    .step-indicator::before {
                        content: '';
                        position: absolute;
                        top: 50%;
                        left: 0;
                        transform: translateY(-50%);
                        height: 3px;
                        width: 100%;
                        background: var(--gray-light);
                        z-index: 1;
                    }
            
                    .progress-line {
                        position: absolute;
                        top: 50%;
                        left: 0;
                        transform: translateY(-50%);
                        height: 3px;
                        background: var(--primary);
                        z-index: 2;
                        transition: width 0.5s ease;
                    }
            
                    .step {
                        width: 35px;
                        height: 35px;
                        background: white;
                        border: 3px solid var(--gray-light);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 600;
                        color: var(--gray);
                        position: relative;
                        z-index: 3;
                        transition: all 0.3s ease;
                    }
            
                    .step.active {
                        border-color: var(--primary);
                        color: var(--primary);
                        transform: scale(1.1);
                    }
            
                    .step.completed {
                        background: var(--primary);
                        border-color: var(--primary);
                        color: white;
                    }
            
                    .step-label {
                        position: absolute;
                        top: 45px;
                        left: 50%;
                        transform: translateX(-50%);
                        font-size: 12px;
                        color: var(--gray);
                        font-weight: 500;
                        white-space: nowrap;
                    }
            
                    .step.active .step-label {
                        color: var(--primary);
                        font-weight: 600;
                    }
            
                    .form-content {
                        padding: 30px 40px;
                    }
            
                    .tab-pane {
                        display: none;
                        animation: fadeIn 0.5s;
                    }
            
                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                            transform: translateY(20px);
                        }
            
                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }
            
                    .tab-pane.active {
                        display: block;
                    }
            
                    .user-form-title {
                        margin-bottom: 25px;
                    }
            
                    .user-form-title h3 {
                        font-size: 22px;
                        color: var(--dark);
                        margin-bottom: 8px;
                        font-weight: 600;
                    }
            
                    .user-form-title p {
                        color: var(--gray);
                        font-size: 14px;
                    }
            
                    .form-group {
                        margin-bottom: 25px;
                        position: relative;
                    }
            
                    .form-label {
                        display: block;
                        font-size: 14px;
                        color: var(--dark);
                        margin-bottom: 8px;
                        font-weight: 500;
                    }
            
                    .form-control {
                        width: 100%;
                        padding: 14px 16px;
                        border: 2px solid var(--gray-light);
                        border-radius: 8px;
                        font-size: 15px;
                        transition: all 0.3s;
                        background: var(--light);
                    }
            
                    .form-control:hover {
                        border-color: #cbd5e1;
                    }
            
                    .form-control:focus {
                        border-color: var(--primary);
                        outline: none;
                        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
                        background: white;
                    }
            
                    .form-icon {
                        position: absolute;
                        right: 15px;
                        top: 41px;
                        transform: translateY(-50%);
                        background: transparent;
                        border: none;
                        cursor: pointer;
                        color: var(--gray);
                        transition: all 0.3s;
                    }
            
                    .form-icon:hover {
                        color: var(--primary);
                    }
            
                    .input-with-icon {
                        position: relative;
                    }
            
                    .input-with-icon .form-control {
                        padding-left: 45px;
                    }
            
                    .input-icon {
                        position: absolute;
                        left: 16px;
                        top: 50%;
                        transform: translateY(-50%);
                        color: var(--gray);
                    }
            
                    .form-alert {
                        display: block;
                        color: var(--danger);
                        font-size: 13px;
                        margin-top: 8px;
                        display: none;
                        opacity: 0;
                        transition: opacity 0.3s;
                    }
            
                    .form-alert.show {
                        display: block;
                        opacity: 1;
                    }
            
                    .custom-control {
                        display: flex;
                        align-items: center;
                        margin: 8px 0;
                        cursor: pointer;
                    }
            
                    .custom-checkbox {
                        position: relative;
                        display: inline-block;
                        width: 18px;
                        height: 18px;
                        margin-right: 10px;
                        border: 2px solid var(--gray-light);
                        border-radius: 4px;
                        transition: all 0.3s;
                    }
            
                    .custom-checkbox-input {
                        position: absolute;
                        opacity: 0;
                        cursor: pointer;
                        height: 0;
                        width: 0;
                    }
            
                    .custom-checkbox-input:checked~.custom-checkbox {
                        background-color: var(--primary);
                        border-color: var(--primary);
                    }
            
                    .custom-checkbox-input:checked~.custom-checkbox:after {
                        content: '';
                        position: absolute;
                        top: 2px;
                        left: 5px;
                        width: 5px;
                        height: 10px;
                        border: solid white;
                        border-width: 0 2px 2px 0;
                        transform: rotate(45deg);
                    }
            
                    .custom-control-label {
                        font-size: 14px;
                        color: var(--dark);
                    }
            
                    .custom-control-label a {
                        color: var(--primary);
                        text-decoration: none;
                        font-weight: 500;
                    }
            
                    .custom-control-label a:hover {
                        text-decoration: underline;
                    }
            
                    .btn {
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        padding: 14px 24px;
                        background: var(--primary);
                        color: white;
                        border: none;
                        border-radius: 8px;
                        cursor: pointer;
                        font-size: 16px;
                        font-weight: 500;
                        transition: all 0.3s;
                        box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25);
                    }
            
                    .btn:hover {
                        background: var(--primary-dark);
                        transform: translateY(-2px);
                        box-shadow: 0 6px 15px rgba(99, 102, 241, 0.35);
                    }
            
                    .btn:active {
                        transform: translateY(0);
                        box-shadow: 0 2px 5px rgba(99, 102, 241, 0.25);
                    }
            
                    .btn i,
                    .btn span {
                        margin: 0 5px;
                    }
            
                    .btn-outline {
                        background: transparent;
                        border: 2px solid var(--primary);
                        color: var(--primary);
                        box-shadow: none;
                    }
            
                    .btn-outline:hover {
                        background: var(--primary-light);
                        color: var(--primary);
                        box-shadow: 0 4px 10px rgba(99, 102, 241, 0.15);
                    }
            
                    .form-buttons {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 40px;
                    }
            
                    .plan-options {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                        gap: 20px;
                        margin-bottom: 30px;
                    }
            
                    .plan-option {
                        border: 2px solid var(--gray-light);
                        border-radius: 12px;
                        padding: 20px;
                        cursor: pointer;
                        text-align: center;
                        transition: all 0.3s;
                        position: relative;
                        overflow: hidden;
                    }
            
                    .plan-option:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
                    }
            
                    .plan-option.selected {
                        border-color: var(--primary);
                        background-color: rgba(99, 102, 241, 0.05);
                        transform: translateY(-5px);
                        box-shadow: 0 10px 15px rgba(99, 102, 241, 0.1);
                    }
            
                    .plan-option.selected::before {
                        content: '✓';
                        position: absolute;
                        top: -10px;
                        right: -10px;
                        width: 40px;
                        height: 40px;
                        background: var(--primary);
                        color: white;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                        font-weight: bold;
                        transform: translate(-5px, 5px);
                    }
            
                    .plan-option h3 {
                        margin-bottom: 15px;
                        color: var(--dark);
                        font-weight: 600;
                    }
            
                    .plan-icon {
                        font-size: 32px;
                        color: var(--primary);
                        margin-bottom: 15px;
                    }
            
                    .plan-price {
                        font-size: 22px;
                        color: var(--dark);
                        font-weight: 600;
                        margin-bottom: 10px;
                    }
            
                    .plan-price span {
                        font-size: 14px;
                        color: var(--gray);
                        font-weight: normal;
                    }
            
                    .plan-features {
                        margin-top: 15px;
                        text-align: left;
                    }
            
                    .plan-feature {
                        display: flex;
                        align-items: center;
                        margin-bottom: 8px;
                        font-size: 14px;
                        color: var(--gray);
                    }
            
                    .plan-feature i {
                        color: var(--success);
                        margin-right: 8px;
                        flex-shrink: 0;
                    }
            
                    .conditional-fields {
                        display: none;
                        margin-top: 30px;
                        padding-top: 30px;
                        border-top: 1px solid var(--gray-light);
                        animation: fadeIn 0.5s;
                    }
            
                    .qr-code {
                        text-align: center;
                        margin: 30px 0;
                    }
            
                    .qr-image {
                        width: 200px;
                        height: 200px;
                        margin: 20px auto;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        position: relative;
                    }
            
                    .qr-image img {
                        border-radius: 10px;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                    }
            
                    .verification-input {
                        display: flex;
                        justify-content: space-between;
                        max-width: 360px;
                        margin: 0 auto;
                        gap: 10px;
                    }
            
                    .verification-input input {
                        width: 50px;
                        height: 55px;
                        text-align: center;
                        font-size: 20px;
                        font-weight: 600;
                        border-radius: 8px;
                        border: 2px solid var(--gray-light);
                        transition: all 0.3s;
                    }
            
                    .verification-input input:focus {
                        border-color: var(--primary);
                        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
                        outline: none;
                    }
            
                    .social-input {
                        position: relative;
                    }
            
                    .social-input .input-icon {
                        font-size: 18px;
                    }
            
                    .country-select {
                        width: 100%;
                        padding: 14px 16px;
                        border: 2px solid var(--gray-light);
                        border-radius: 8px;
                        font-size: 15px;
                        transition: all 0.3s;
                        background: var(--light);
                        color: var(--dark);
                    }
            
                    .country-select:focus {
                        border-color: var(--primary);
                        outline: none;
                        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
                    }
            
                    .success-message,
                    .error-message {
                        display: none;
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: white;
                        z-index: 100;
                        align-items: center;
                        justify-content: center;
                        flex-direction: column;
                        text-align: center;
                        padding: 40px;
                        animation: fadeIn 0.5s;
                    }
            
                    .success-icon,
                    .error-icon {
                        font-size: 80px;
                        margin-bottom: 20px;
                    }
            
                    .success-icon {
                        color: var(--success);
                    }
            
                    .error-icon {
                        color: var(--danger);
                    }
            
                    .success-title,
                    .error-title {
                        font-size: 24px;
                        font-weight: 600;
                        margin-bottom: 10px;
                    }
            
                    .success-message p,
                    .error-message p {
                        color: var(--gray);
                        margin-bottom: 30px;
                        max-width: 400px;
                    }
            
                    .loader {
                        display: inline-block;
                        width: 24px;
                        height: 24px;
                        border: 3px solid rgba(255, 255, 255, .3);
                        border-radius: 50%;
                        border-top-color: white;
                        animation: spin 1s ease-in-out infinite;
                        margin-left: 8px;
                    }
            
                    @keyframes spin {
                        to {
                            transform: rotate(360deg);
                        }
                    }
            
                    .btn.loading {
                        pointer-events: none;
                        opacity: 0.8;
                        position: relative;
                    }
            
                    .btn.loading span {
                        visibility: hidden;
                    }
            
                    .btn.loading::after {
                        content: '';
                        position: absolute;
                        width: 20px;
                        height: 20px;
                        border: 2px solid rgba(255, 255, 255, .3);
                        border-radius: 50%;
                        border-top-color: white;
                        animation: spin 1s ease-in-out infinite;
                    }
            
                    .plan-specific-fields {
                        display: none;
                        animation: fadeIn 0.5s;
                    }
            
                    /* Media Queries */
                    @media (max-width: 768px) {
                        .form-content {
                            padding: 20px;
                        }
            
                        .step-indicator {
                            margin: 30px 20px;
                        }
            
                        .step-label {
                            display: none;
                        }
            
                        .verification-input {
                            gap: 5px;
                        }
            
                        .verification-input input {
                            width: 40px;
                            height: 45px;
                            font-size: 16px;
                        }
            
                        .plan-options {
                            grid-template-columns: 1fr;
                        }
                    }
            
                    @media (max-width: 480px) {
                        .form-header {
                            padding: 20px;
                        }
            
                        .form-buttons {
                            flex-direction: column;
                            gap: 15px;
                        }
            
                        .form-buttons button {
                            width: 100%;
                        }
            
                        .form-buttons button:first-child {
                            order: 2;
                        }
            
                        .form-buttons button:last-child {
                            order: 1;
                        }
                    }
                </style>
                <!-- Add Font Awesome for icons -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                <!-- Add Google Font -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
            </head>
            
            <body>
                <div class="container">
                    <div class="form-header">
                        <h2>Create Your Account</h2>
                        <p>Complete your registration in just a few steps</p>
                    </div>
            
                    <div class="step-indicator">
                        <div class="progress-line" id="progress-line"></div>
                        <div class="step active" id="step-1">
                            1
                            <span class="step-label">Account</span>
                        </div>
                        <div class="step" id="step-2">
                            2
                            <span class="step-label">Verify</span>
                        </div>
                        <div class="step" id="step-3">
                            3
                            <span class="step-label">Details</span>
                        </div>
                        <div class="step" id="step-4">
                            4
                            <span class="step-label">Complete</span>
                        </div>
                    </div>
            
                    <div class="form-content">
                        <!-- Step 1: Email and Password -->
                        <form id="step1-form" class="tab-pane active">
            
                            @csrf
                            <div class="user-form-title">
                                <h3>Create Your Account</h3>
                                <p>Enter your email and create a strong password</p>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <div class="input-with-icon">
                                    <i class="input-icon fa-regular fa-envelope"></i>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Your email address" required>
                                </div>
                                <small class="form-alert" id="email-alert">Please enter a valid email address</small>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-with-icon">
                                    <i class="input-icon fa-regular fa-lock"></i>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Create a strong password" required>
                                    <button type="button" class="form-icon toggle-password"><i class="fas fa-eye"></i></button>
                                </div>
                                <small class="form-alert" id="password-alert">Password must be at least 8 characters with at least
                                    one uppercase letter, one number, and one special character</small>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="repeat-password">Confirm Password</label>
                                <div class="input-with-icon">
                                    <i class="input-icon fa-regular fa-lock"></i>
                                    <input type="password" id="repeat-password" name="repeat-password" class="form-control"
                                        placeholder="Confirm your password" required>
                                    <button type="button" class="form-icon toggle-password"><i class="fas fa-eye"></i></button>
                                </div>
                                <small class="form-alert" id="repeat-password-alert">Passwords must match</small>
                            </div>
            
                            <div class="form-group">
                                <label class="custom-control">
                                    <input type="checkbox" class="custom-checkbox-input" id="terms-check" name="terms-check"
                                        required>
                                    <span class="custom-checkbox"></span>
                                    <span class="custom-control-label">I agree to the <a href="#">Terms of Service</a> and <a
                                            href="#">Privacy Policy</a></span>
                                </label>
                            </div>
            
                            <div class="form-buttons">
                                <div></div> <!-- Empty div for flex spacing -->
                                <button type="submit" class="btn" id="step1-next">
                                    <span>Continue to Verification</span> <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
            
                            <input type="hidden" name="form_step" value="1">
                        </form>
            
                        <!-- Step 2: Verification Code -->
                        <form id="step2-form" class="tab-pane">
                            @csrf
                            <div class="user-form-title">
                                <h3>Verify Your Email</h3>
                                <p>We've sent a 6-digit verification code to your email</p>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label">Verification Code</label>
                                <div class="verification-input">
                                    <input type="text" class="verification-digit" maxlength="1" data-index="1" required>
                                    <input type="text" class="verification-digit" maxlength="1" data-index="2" required>
                                    <input type="text" class="verification-digit" maxlength="1" data-index="3" required>
                                    <input type="text" class="verification-digit" maxlength="1" data-index="4" required>
                                    <input type="text" class="verification-digit" maxlength="1" data-index="5" required>
                                    <input type="text" class="verification-digit" maxlength="1" data-index="6" required>
                                </div>
                                <input type="hidden" id="verification-code" name="verification-code">
                                <small class="form-alert" id="code-alert">Please enter the complete 6-digit code</small>
                            </div>
            
                            <div style="text-align: center; margin-top: 20px;">
                                <p style="font-size: 14px; color: var(--gray);">
                                    Didn't receive a code? <a href="#" id="resend-code"
                                        style="color: var(--primary); text-decoration: none; font-weight: 500;">Resend Code</a>
                                </p>
                                <p id="resend-timer" style="font-size: 14px; color: var(--gray); margin-top: 5px; display: none;">
                                    You can request a new code in <span id="timer-count">60</span> seconds
                                </p>
                            </div>
            
                            <div class="form-buttons">
                                <button type="button" class="btn btn-outline" id="step2-prev">
                                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                                </button>
                                <button type="submit" class="btn" id="step2-next">
                                    <span>Verify & Continue</span> <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
            
                            <input type="hidden" name="form_step" value="2">
                            <input type="hidden" name="email" id="step2-email">
                        </form>
            
                        <!-- Step 3: User Details and Plan Selection -->
                        <form id="step3-form" class="tab-pane">
                            @csrf
                            <div class="user-form-title">
                                <h3>Personal Information</h3>
                                <p>Tell us a bit about yourself</p>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="username">Full Name</label>
                                <div class="input-with-icon">
                                    <i class="input-icon fa-regular fa-user"></i>
                                    <input type="text" id="username" name="username" class="form-control"
                                        placeholder="Your full name" required>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <div class="input-with-icon">
                                    <i class="input-icon fa-regular fa-phone"></i>
                                    <input type="tel" id="phone" name="phone" class="form-control"
                                        placeholder="Your phone number" required>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="address">Address</label>
                                <div class="input-with-icon">
                                    <i class="input-icon fa-regular fa-location-dot"></i>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Your address" required>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label class="form-label" for="country">Country</label>
                                <select id="country" name="country" class="country-select" required>
                                    <option value="">Select your country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="IN">India</option>
                                    <option value="DE">Germany</option>
                                    <option value="FR">France</option>
                                    <option value="JP">Japan</option>
                                    <option value="BR">Brazil</option>
                                    <option value="OTHER">Other</option>
                                </select>
                            </div>
            
                            <div class="user-form-title">
                                <h3>Choose a Plan</h3>
                                <p>Select the plan that best suits your needs</p>
                            </div>
            
                            <div class="plan-options">
                                <div class="plan-option" data-plan="free">
                                    <div class="plan-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <h3>Free Plan</h3>
                                    <div class="plan-price">$0 <span>/month</span></div>
                                    <div class="plan-features">
                                        <div class="plan-feature"><i class="fas fa-check"></i> Basic features</div>
                                        <div class="plan-feature"><i class="fas fa-check"></i> 1 project</div>
                                        <div class="plan-feature"><i class="fas fa-check"></i> Community support</div>
                                    </div>
                                </div>
                                <div class="plan-option" data-plan="premium">
                                    <div class="plan-icon">
                                        <i class="fas fa-crown"></i>
                                    </div>
                                    <h3>Premium</h3>
                                    <div class="plan-price">$9.99 <span>/month</span></div>
                                    <div class="plan-features">
                                        <div class="plan-feature"><i class="fas fa-check"></i> All features</div>
                                        <div class="plan-feature"><i class="fas fa-check"></i> Unlimited projects</div>
                                        <div class="plan-feature"><i class="fas fa-check"></i> Priority support</div>
                                        <div class="plan-feature"><i class="fas fa-check"></i> Advanced analytics</div>
                                    </div>
                                </div>
                            </div>
            
                            <input type="hidden" id="selected-plan" name="selected-plan">
                            
                            <div class="form-buttons">
                                <button type="button" class="btn btn-outline" id="step3-prev">
                                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                                </button>
                                <button type="submit" class="btn" id="step3-next">
                                    <span>Continue to Final Step</span> <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                        
                        <!-- Step 4: Complete Registration -->
                       <!-- Step 4: Complete Registration -->
<form id="step4-form" class="tab-pane">
    @csrf
    <div class="user-form-title">
        <h3>Final Step</h3>
        <p id="plan-specific-title">Complete your registration</p>
    </div>

    <!-- Free Plan Specific Fields -->
    <div id="free-plan-fields" class="plan-specific-fields">
        <div class="form-group">
            <label class="form-label" for="twitter">Twitter Profile</label>
            <div class="input-with-icon social-input">
                <i class="input-icon fab fa-twitter"></i>
                <input type="text" id="twitter" name="twitter" class="form-control" placeholder="Your Twitter username">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="facebook">Facebook Profile</label>
            <div class="input-with-icon social-input">
                <i class="input-icon fab fa-facebook"></i>
                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Your Facebook profile URL">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="instagram">Instagram Profile</label>
            <div class="input-with-icon social-input">
                <i class="input-icon fab fa-instagram"></i>
                <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Your Instagram username">
            </div>
        </div>
    </div>

    <!-- Premium Plan Specific Fields -->
    <div id="premium-plan-fields" class="plan-specific-fields">
        <div class="qr-code">
            <h4>Scan the QR code to make payment</h4>
            <div class="qr-image">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=YourPaymentInfo" alt="Payment QR Code">
            </div>
            <p>Or use our payment reference: <strong>REF-89456231</strong></p>
        </div>

        <div class="form-group">
            <label class="form-label" for="utr">UTR Number / Transaction ID</label>
            <div class="input-with-icon">
                <i class="input-icon fa-regular fa-credit-card"></i>
                <input type="text" id="utr" name="utr" class="form-control" placeholder="Enter your transaction reference">
            </div>
        </div>
    </div>

    <div class="form-buttons">
        <button type="button" class="btn btn-outline" id="step4-prev">
            <i class="fas fa-arrow-left"></i> <span>Back</span>
        </button>
        <button type="submit" class="btn" id="step4-submit">
            <span>Complete Registration</span> <i class="fas fa-check"></i>
        </button>
    </div>
</form>

<!-- Success Message -->
<div class="success-message" id="success-message">
    <div class="success-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <h3 class="success-title">Registration Successful!</h3>
    <p>Your account has been created successfully. You can now login to your account.</p>
    <a href="/login" class="btn">
        <span>Login to Your Account</span> <i class="fas fa-arrow-right"></i>
    </a>
</div>

<!-- Error Message -->
<div class="error-message" id="error-message">
    <div class="error-icon">
        <i class="fas fa-exclamation-circle"></i>
    </div>
    <h3 class="error-title">Registration Failed</h3>
    <p id="error-text">Something went wrong. Please try again later.</p>
    <button type="button" class="btn" id="try-again-btn">
        <span>Try Again</span> <i class="fas fa-redo"></i>
    </button>
</div>
<script>
    // DOM Elements
const container = document.querySelector('.container');
const progressLine = document.getElementById('progress-line');
const steps = document.querySelectorAll('.step');
const forms = document.querySelectorAll('.tab-pane');
const step1Form = document.getElementById('step1-form');
const step2Form = document.getElementById('step2-form');
const step3Form = document.getElementById('step3-form');
const step4Form = document.getElementById('step4-form');

// Step navigation buttons
const step1Next = document.getElementById('step1-next');
const step2Prev = document.getElementById('step2-prev');
const step2Next = document.getElementById('step2-next');
const step3Prev = document.getElementById('step3-prev');
const step3Next = document.getElementById('step3-next');
const step4Prev = document.getElementById('step4-prev');
const step4Submit = document.getElementById('step4-submit');

// Form elements
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const repeatPasswordInput = document.getElementById('repeat-password');
const termsCheck = document.getElementById('terms-check');
const verificationDigits = document.querySelectorAll('.verification-digit');
const verificationCode = document.getElementById('verification-code');
const step2Email = document.getElementById('step2-email');
const resendCodeBtn = document.getElementById('resend-code');
const resendTimer = document.getElementById('resend-timer');
const timerCount = document.getElementById('timer-count');
const planOptions = document.querySelectorAll('.plan-option');
const selectedPlanInput = document.getElementById('selected-plan');
const freePlanFields = document.getElementById('free-plan-fields');
const premiumPlanFields = document.getElementById('premium-plan-fields');
const planSpecificTitle = document.getElementById('plan-specific-title');
const successMessage = document.getElementById('success-message');
const errorMessage = document.getElementById('error-message');
const errorText = document.getElementById('error-text');
const tryAgainBtn = document.getElementById('try-again-btn');

// Alert Elements
const emailAlert = document.getElementById('email-alert');
const passwordAlert = document.getElementById('password-alert');
const repeatPasswordAlert = document.getElementById('repeat-password-alert');
const codeAlert = document.getElementById('code-alert');

// Current Step Tracker
let currentStep = 1;

// Initialize form submissions
step1Form.addEventListener('submit', async function(e) {
    e.preventDefault(); // prevent normal submit
    if (validateStep1()) {
        try {
            step1Next.classList.add('loading');
            await sendStep1Data();
            showStep(2);
            // Set email in step 2 form
            step2Email.value = emailInput.value;
            // Start resend timer
            startResendTimer();
        } catch (error) {
            alert(error.message);
        } finally {
            step1Next.classList.remove('loading');
        }
    }
});

step2Form.addEventListener('submit', async function(e) {
    e.preventDefault();
    if (validateStep2()) {
        try {
            step2Next.classList.add('loading');
            await verifyCode();
            showStep(3);
        } catch (error) {
            alert(error.message);
        } finally {
            step2Next.classList.remove('loading');
        }
    }
});

step3Form.addEventListener('submit', async function(e) {
    e.preventDefault();
    if (validateStep3()) {
        try {
            step3Next.classList.add('loading');
            await updateProfile();
            showStep(4);
            showPlanSpecificFields();
        } catch (error) {
            alert(error.message);
        } finally {
            step3Next.classList.remove('loading');
        }
    }
});

step4Form.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        step4Submit.classList.add('loading');
        
        const formData = {
            plan: selectedPlanInput.value
        };
        
        // Add social media links if free plan
        if (selectedPlanInput.value === 'free') {
            formData.twitter = document.getElementById('twitter').value;
            formData.facebook = document.getElementById('facebook').value;
            formData.instagram = document.getElementById('instagram').value;
        }
        
        // Add UTR if premium plan
        if (selectedPlanInput.value === 'premium') {
            formData.utr = document.getElementById('utr').value;
            
            // Validate UTR for premium plan
            if (!formData.utr.trim()) {
                throw new Error('Please enter your transaction reference');
            }
        }
        
        // Submit final registration data
        await completeRegistration(formData);
        
        // Show success message
        successMessage.style.display = 'flex';
        step4Form.style.display = 'none';
        
    } catch (error) {
        errorText.textContent = error?.message || 'Something went wrong. Please try again.';
        errorMessage.style.display = 'flex';
    } finally {
        step4Submit.classList.remove('loading');
    }
});

// Initial Setup
updateProgressBar();

// Validate Functions
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function validatePassword(password) {
    const re = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return re.test(String(password));
}

function validateStep1() {
    let isValid = true;

    if (!validateEmail(emailInput.value)) {
        emailAlert.classList.add('show');
        emailInput.style.borderColor = 'var(--danger)';
        isValid = false;
    } else {
        emailAlert.classList.remove('show');
        emailInput.style.borderColor = 'var(--primary)';
    }

    if (!validatePassword(passwordInput.value)) {
        passwordAlert.classList.add('show');
        passwordInput.style.borderColor = 'var(--danger)';
        isValid = false;
    } else {
        passwordAlert.classList.remove('show');
        passwordInput.style.borderColor = 'var(--primary)';
    }

    if (passwordInput.value !== repeatPasswordInput.value) {
        repeatPasswordAlert.classList.add('show');
        repeatPasswordInput.style.borderColor = 'var(--danger)';
        isValid = false;
    } else {
        repeatPasswordAlert.classList.remove('show');
        repeatPasswordInput.style.borderColor = 'var(--primary)';
    }

    if (!termsCheck.checked) {
        termsCheck.parentElement.style.color = 'var(--danger)';
        isValid = false;
    } else {
        termsCheck.parentElement.style.color = 'var(--dark)';
    }

    return isValid;
}

function validateStep2() {
    let code = '';
    verificationDigits.forEach(digit => {
        code += digit.value;
    });

    if (code.length !== 6) {
        codeAlert.classList.add('show');
        verificationDigits.forEach(digit => digit.style.borderColor = 'var(--danger)');
        return false;
    } else {
        codeAlert.classList.remove('show');
        verificationDigits.forEach(digit => digit.style.borderColor = 'var(--primary)');
        verificationCode.value = code;
        return true;
    }
}

function validateStep3() {
    const requiredFields = ['username', 'phone', 'address', 'country'];
    let isValid = true;

    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            input.style.borderColor = 'var(--danger)';
            isValid = false;
        } else {
            input.style.borderColor = 'var(--primary)';
        }
    });

    if (!selectedPlanInput.value) {
        planOptions.forEach(plan => plan.style.borderColor = 'var(--danger)');
        isValid = false;
    }
    return isValid;
}

// Update Progress
function updateProgressBar() {
    const progressPercentage = ((currentStep - 1) / (steps.length - 1)) * 100;
    progressLine.style.width = `${progressPercentage}%`;

    steps.forEach((step, index) => {
        const stepNum = index + 1;
        if (stepNum < currentStep) {
            step.classList.add('completed');
            step.classList.remove('active');
        } else if (stepNum === currentStep) {
            step.classList.add('active');
            step.classList.remove('completed');
        } else {
            step.classList.remove('active', 'completed');
        }
    });
}

// Show Specific Step
function showStep(step) {
    forms.forEach(form => form.classList.remove('active'));
    document.getElementById(`step${step}-form`).classList.add('active');
    currentStep = step;
    updateProgressBar();
    
    // If moving to step 4, show appropriate fields
    if (step === 4) {
        showPlanSpecificFields();
    }
    
    // Hide success and error messages when changing steps
    if (successMessage) successMessage.style.display = 'none';
    if (errorMessage) errorMessage.style.display = 'none';
}

// Handle step navigation buttons
step2Prev.addEventListener('click', () => showStep(1));
step3Prev.addEventListener('click', () => showStep(2));
step4Prev.addEventListener('click', () => showStep(3));

// Try again button
if (tryAgainBtn) {
    tryAgainBtn.addEventListener('click', () => {
        errorMessage.style.display = 'none';
    });
}

// Show the appropriate fields based on the selected plan
function showPlanSpecificFields() {
    const selectedPlan = selectedPlanInput.value;
    
    if (selectedPlan === 'free') {
        freePlanFields.style.display = 'block';
        premiumPlanFields.style.display = 'none';
        planSpecificTitle.textContent = 'Share your social profiles (Optional)';
    } else if (selectedPlan === 'premium') {
        freePlanFields.style.display = 'none';
        premiumPlanFields.style.display = 'block';
        planSpecificTitle.textContent = 'Complete payment to activate Premium';
    }
}

// Verification Code Auto Movement
verificationDigits.forEach((input, index) => {
    input.addEventListener('input', () => {
        input.value = input.value.replace(/\D/g, '');
        if (input.value.length === 1 && index < verificationDigits.length - 1) {
            verificationDigits[index + 1].focus();
        }
    });

    input.addEventListener('keydown', e => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
            verificationDigits[index - 1].focus();
        }
    });
});

// Resend Timer
let timerInterval;

function startResendTimer() {
    resendCodeBtn.style.opacity = '0.5';
    resendCodeBtn.style.pointerEvents = 'none';
    resendTimer.style.display = 'block';
    let seconds = 60;
    timerCount.textContent = seconds;

    clearInterval(timerInterval);
    timerInterval = setInterval(() => {
        seconds--;
        timerCount.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(timerInterval);
            resendCodeBtn.style.opacity = '1';
            resendCodeBtn.style.pointerEvents = 'auto';
            resendTimer.style.display = 'none';
        }
    }, 1000);
}

// Resend code button
resendCodeBtn.addEventListener('click', async function() {
    try {
        // Perform resend code operation
        await resendVerificationCode();
        startResendTimer();
    } catch (error) {
        alert(error.message || 'Failed to resend code. Please try again.');
    }
});

// Toggle Password
const togglePasswordBtns = document.querySelectorAll('.toggle-password');
togglePasswordBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const input = btn.parentElement.querySelector('input');
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});

// Plan Selection
planOptions.forEach(plan => {
    plan.addEventListener('click', () => {
        planOptions.forEach(p => p.classList.remove('selected'));
        plan.classList.add('selected');
        selectedPlanInput.value = plan.getAttribute('data-plan');
        planOptions.forEach(p => p.style.borderColor = 'var(--gray-light)');
    });
});

// --- API CALL FUNCTIONS ---
// These functions communicate with the backend
async function sendStep1Data() {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const response = await fetch('/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                email: emailInput.value,
                password: passwordInput.value
            })
        });

        const data = await response.json();

        if (!response.ok) {
            if (data.errors) {
                const firstError = Object.values(data.errors)[0][0];
                throw new Error(firstError);
            } else {
                throw new Error(data.message || 'Unknown server error');
            }
        }

        return data;

    } catch (error) {
        console.error('Error:', error.message);
        throw error;
    }
}

async function verifyCode() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const response = await fetch('/verify-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            email: emailInput.value,
            code: verificationCode.value
        })
    });
    const data = await response.json();
    if (!response.ok) throw new Error(data.message || 'Failed to verify code');
    return data;
}

async function resendVerificationCode() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const response = await fetch('/resend-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            email: emailInput.value
        })
    });
    const data = await response.json();
    if (!response.ok) throw new Error(data.message || 'Failed to resend code');
    return data;
}

async function updateProfile() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Gather form data
    const data = {
        email: emailInput.value,
        name: document.getElementById('username').value,
        phone: document.getElementById('phone').value,
        address: document.getElementById('address').value,
        country: document.getElementById('country').value,
        plan: selectedPlanInput.value,
        _token: csrfToken
    };
    
    const response = await fetch('/updateprofile', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(data)
    });
    
    const result = await response.json();
    
    if (!response.ok) throw new Error(result.message || 'Failed to update profile');
    return result;
}

async function completeRegistration(formData) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Add email to form data
    formData.email = emailInput.value;
    formData._token = csrfToken;
    
    const response = await fetch('/complete-registration', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(formData)
    });
    
    const result = await response.json();
    
    if (!response.ok) throw new Error(result.message || 'Failed to complete registration');
    return result;
}
</script>
</body>