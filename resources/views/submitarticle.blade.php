@extends('header')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordCraft - Article Submission Portal</title>
    <style>
    :root {
        --main-color: #2563eb;
        --secondary-color: #0f172a;
        --accent-color: #f59e0b;
        --light-color: #f0f9ff;
        --text-color: #334155;
        --error-color: #ef4444;
        --success-color: #10b981;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8fafc;
        color: var(--text-color);
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }

    .header {
        background: linear-gradient(135deg, var(--main-color), #1e40af);
        color: white;
        padding: 25px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('/api/placeholder/1200/300');
        background-size: cover;
        opacity: 0.1;
        z-index: 0;
    }

    .header-content {
        position: relative;
        z-index: 1;
    }

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo-text {
        font-size: 28px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .header h1 {
        font-size: 36px;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header p {
        font-size: 18px;
        margin: 10px 0 0;
        opacity: 0.9;
    }



    .form-header {
        color: var(--secondary-color);
        text-align: center;
        font-size: 24px;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }

    .form-header::after {
        content: "";
        display: block;
        width: 60px;
        height: 4px;
        background-color: var(--accent-color);
        margin: 15px auto 0;
        border-radius: 2px;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .icon-input {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-color);
        opacity: 0.6;
        pointer-events: none;
    }

    .icon-padding {
        padding-left: 40px !important;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 16px;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
        width: 100%;
        padding: 14px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        box-sizing: border-box;
        font-family: inherit;
        font-size: 16px;
        transition: all 0.3s ease;
        color: var(--text-color);
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-card {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
    }

    .form-card:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .form-card-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .form-card-icon {
        background-color: rgba(37, 99, 235, 0.1);
        width: 36px;
        height: 36px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: var(--main-color);
    }

    .form-card-title {
        font-weight: 600;
        font-size: 18px;
        color: var(--secondary-color);
        margin: 0;
    }

    .tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 12px;
    }

    .tag-input-wrapper {
        display: flex;
        gap: 10px;
    }

    .tag-input-wrapper input {
        flex-grow: 1;
    }

    .tag {
        background-color: rgba(37, 99, 235, 0.08);
        color: var(--main-color);
        padding: 8px 14px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        font-size: 14px;
        border: 1px solid rgba(37, 99, 235, 0.2);
    }

    .tag span {
        margin-right: 8px;
    }

    .tag button {
        background: none;
        border: none;
        color: var(--main-color);
        cursor: pointer;
        font-size: 18px;
        line-height: 1;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .add-tag-btn {
        background-color: var(--main-color);
        color: white;
        border: none;
        padding: 12px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-tag-btn:hover {
        background-color: #1d4ed8;
        transform: translateY(-1px);
    }

    .add-tag-btn svg {
        margin-right: 8px;
    }

    #editor-container {
        height: 250px;
        margin-bottom: 20px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        overflow: hidden;
    }

    .ql-toolbar {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        background-color: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .ql-container {
        font-size: 16px;
        height: calc(100% - 43px);
    }

    .submit-btn {
        background-color: var(--accent-color);
        color: var(--secondary-color);
        border: none;
        padding: 16px 32px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 30px auto 0;
        transition: all 0.3s;
        box-shadow: 0 4px 10px rgba(245, 158, 11, 0.3);
    }

    .submit-btn:hover {
        background-color: #d97706;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(245, 158, 11, 0.4);
    }

    .submit-btn svg {
        margin-right: 8px;
    }

    .file-upload {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .file-upload-label {
        background-color: rgba(37, 99, 235, 0.08);
        color: var(--main-color);
        padding: 14px 20px;
        border-radius: 8px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        font-weight: 600;
        transition: all 0.3s;
        border: 1px solid rgba(37, 99, 235, 0.2);
    }

    .file-upload-label:hover {
        background-color: rgba(37, 99, 235, 0.12);
    }

    .file-upload-label svg {
        margin-right: 8px;
    }

    .file-name {
        margin-left: 12px;
        font-style: italic;
        color: #64748b;
    }

    input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .required::after {
        content: "*";
        color: var(--error-color);
        margin-left: 4px;
    }

    .success-message {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: var(--success-color);
        color: white;
        padding: 16px 28px;
        border-radius: 8px;
        font-weight: 600;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        opacity: 0;
        transition: all 0.3s;
        z-index: 1000;
        display: flex;
        align-items: center;
    }

    .success-message svg {
        margin-right: 10px;
    }

    .show {
        opacity: 1;
        transform: translate(-50%, 0);
    }

    .info-text {
        color: #64748b;
        font-size: 14px;
        margin-top: 8px;
    }

    .status-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
        position: relative;
    }

    .status-indicator::before {
        content: '';
        position: absolute;
        top: 15px;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #e2e8f0;
        z-index: 0;
    }

    .status-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .step-number {
        width: 32px;
        height: 32px;
        border-radius: 16px;
        background-color: white;
        border: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-bottom: 8px;
        transition: all 0.3s;
    }

    .step-active .step-number {
        background-color: var(--main-color);
        color: white;
        border-color: var(--main-color);
    }

    .step-label {
        font-size: 14px;
        font-weight: 500;
        color: #64748b;
    }

    .step-active .step-label {
        color: var(--main-color);
        font-weight: 600;
    }

    .footer {
        text-align: center;
        padding: 30px 0;
        margin-top: 40px;
        color: #64748b;
        font-size: 14px;
        background-color: #f8fafc;
        border-top: 1px solid #e2e8f0;
    }

    /* Alert styling */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    /* Animation for success message */
    @keyframes fadeInOut {
        0% {
            opacity: 0;
        }

        20% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    #success-message.show {
        display: block;
        animation: fadeInOut 3s forwards;
    }

    /* File name display */
    .file-name {
        margin-top: 8px;
        font-size: 0.9em;
        color: #666;
    }

    /* Tag styling */
    .tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 8px;
    }

    .tag {
        display: inline-flex;
        align-items: center;
        background-color: #e9ecef;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.9em;
    }

    .tag button {
        background: none;
        border: none;
        color: #666;
        margin-left: 5px;
        cursor: pointer;
        padding: 0 2px;
        font-size: 1.2em;
        line-height: 1;
    }

    .tag button:hover {
        color: #dc3545;
    }

    @media (max-width: 768px) {
        .container {
            padding: 20px;
            margin: -40px auto 20px;
        }

        .header {
            padding: 20px 0;
        }

        .header h1 {
            font-size: 28px;
        }

        .header p {
            font-size: 16px;
        }

        .form-header {
            font-size: 22px;
        }

        .status-indicator {
            margin-bottom: 30px;
        }

        .step-label {
            font-size: 12px;
        }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.min.css">
</head>

<body>


    <div class="container">


        <h2 class="form-header">Article Details</h2>

        <form id="article-form" method="POST" action="/submit-article" enctype="multipart/form-data">
            @csrf
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </div>
                    <h3 class="form-card-title">Basic Information</h3>
                </div>

                <div class="form-group">
                    <label class="required" for="title">Article Title</label>
                    <div class="icon-input">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        <input type="text" id="title" name="title" class="icon-padding"
                            placeholder="A captivating title for your article" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required" for="abstract">Brief Summary</label>
                    <textarea id="abstract" name="abstract" rows="3"
                        placeholder="Write a compelling summary to attract readers" required></textarea>
                    <div class="info-text">A good summary increases reader engagement by 70%</div>
                </div>

                <div class="form-group">
                    <label class="required" for="category">Category</label>
                    <div class="icon-input">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <select id="category" name="category" class="icon-padding" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                            </path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                    </div>
                    <h3 class="form-card-title">Tags & Metadata</h3>
                </div>

                <div class="form-group">
                    <label for="tags">Tags (helps with discovery)</label>
                    <div class="tag-input-wrapper">
                        <div class="icon-input" style="flex-grow: 1;">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                </path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                            <input type="text" id="tag-input" class="icon-padding"
                                placeholder="Add relevant tags (press Enter after each tag)">
                        </div>
                        <button type="button" class="add-tag-btn" id="add-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add
                        </button>
                    </div>
                    <div class="tag-container" id="tag-container"></div>
                    <div class="info-text">Articles with 3-5 tags get 30% more views</div>
                </div>
            </div>

            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h3 class="form-card-title">Author Information</h3>
                </div>

                <div class="form-group">
                    <label class="required" for="name">Your Name</label>
                    <div class="icon-input">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input type="text" id="name" name="name" class="icon-padding"
                            placeholder="Your full name as you want it to appear" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required" for="email">Email Address</label>
                    <div class="icon-input">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <input type="email" id="email" name="email" class="icon-padding"
                            placeholder="Your contact email (not publicly displayed)" required>
                    </div>
                </div>
            </div>

            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h3 class="form-card-title">Article Content</h3>
                </div>
                <div class="form-group">
                    <label class="required" for="link">Back Link of Website</label>
                    <div class="icon-input">
                        <input type="url" id="link" name="link" class="icon-padding"
                            placeholder="Enter the back link of the website" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required" for="editor">Write Your Article</label>
                    <div id="editor-container"></div>
                    <div class="info-text">Articles between 700-1500 words perform best</div>
                </div>

                <div class="form-group">
                    <label for="supporting-docs">Enter Thumnail Image</label>
                    <div class="file-upload">
                        <label class="file-upload-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 10 12 15 7 10"></polyline>
                            </svg>
                            <span>Choose files</span>
                            <input type="file" id="supporting-docs" name="supporting-docs[]">
                        </label>
                    </div>
                    <div id="file-name" class="file-name">No files selected</div>
                </div>

                <!-- Hidden input to store Quill content -->
                <input type="hidden" id="editor-content" name="content">
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">
                    Submit Article
                </button>
            </div>
        </form>
    </div>

    <div class="success-message" id="success-message">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        Article submitted successfully!
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill editor if the element exists
        if (document.getElementById('editor-container')) {
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': '1'
                        }, {
                            'header': '2'
                        }, {
                            'font': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link', 'image'],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        ['blockquote', 'code-block'],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        ['clean'] // clear formatting
                    ]
                }
            });
        }

        // Handle tag functionality
        const tagInput = document.getElementById('tag-input');
        const addTagBtn = document.getElementById('add-tag');
        const tagContainer = document.getElementById('tag-container');
        const tagsArray = [];

        // Only set up tag functionality if elements exist
        if (tagInput && addTagBtn && tagContainer) {
            function addTag() {
                const tagText = tagInput.value.trim();

                if (tagText !== '' && !tagsArray.includes(tagText)) {
                    tagsArray.push(tagText);

                    const tagElement = document.createElement('div');
                    tagElement.className = 'tag';

                    const tagSpan = document.createElement('span');
                    tagSpan.textContent = tagText;

                    const removeBtn = document.createElement('button');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.onclick = function() {
                        tagContainer.removeChild(tagElement);
                        const index = tagsArray.indexOf(tagText);
                        if (index > -1) {
                            tagsArray.splice(index, 1);
                        }
                    };

                    tagElement.appendChild(tagSpan);
                    tagElement.appendChild(removeBtn);
                    tagContainer.appendChild(tagElement);

                    tagInput.value = '';
                }
            }

            // Add tag when clicking the add button
            addTagBtn.addEventListener('click', addTag);

            // Add tag when pressing Enter
            tagInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addTag();
                }
            });
        }

        // Handle file upload display
        const fileInput = document.getElementById('supporting-docs');
        const fileNameDisplay = document.getElementById('file-name');

        if (fileInput && fileNameDisplay) {
            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    if (fileInput.files.length === 1) {
                        fileNameDisplay.textContent = fileInput.files[0].name;
                    } else {
                        fileNameDisplay.textContent = `${fileInput.files.length} files selected`;
                    }
                } else {
                    fileNameDisplay.textContent = 'No files selected';
                }
            });
        }

        // Form submission
        // Form submission
        const form = document.getElementById('article-form');
        const successMessage = document.getElementById('success-message');

        // Create success message element if it doesn't exist
        if (!successMessage && form) {
            const messageDiv = document.createElement('div');
            messageDiv.id = 'success-message';
            messageDiv.className = 'alert alert-success';
            messageDiv.style.display = 'none';
            messageDiv.textContent = 'Article submitted successfully!';
            form.parentNode.insertBefore(messageDiv, form.nextSibling);
        }

        // Create error message container if it doesn't exist
        let errorContainer = document.getElementById('error-container');
        if (!errorContainer && form) {
            errorContainer = document.createElement('div');
            errorContainer.id = 'error-container';
            errorContainer.className = 'alert alert-danger';
            errorContainer.style.display = 'none';
            form.parentNode.insertBefore(errorContainer, form);
        }

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Hide any existing error messages
                if (errorContainer) {
                    errorContainer.style.display = 'none';
                    errorContainer.innerHTML = '';
                }

                // Get article content from Quill editor if it exists
                let articleContent = '';
                if (typeof quill !== 'undefined' && quill) {
                    articleContent = quill.root.innerHTML;

                    // Check if the content is empty (only contains HTML tags with no text)
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = articleContent;
                    if (!tempDiv.textContent.trim()) {
                        showError('Please write some content for your article.');
                        return;
                    }
                }

                // Create a new FormData object and append form fields
                const formData = new FormData(form);

                // Add Quill content to FormData if it exists
                if (articleContent) {
                    formData.append('content', articleContent);
                }

                // Get files (if any) and append them to the FormData object
                const fileInput = document.getElementById('supporting-docs');
                if (fileInput && fileInput.files.length > 0) {
                    for (let i = 0; i < fileInput.files.length; i++) {
                        formData.append('supporting-docs[]', fileInput.files[i]);
                    }
                }

                // Add tags to the form data
                const tagsArray = [];
                const tagElements = document.querySelectorAll('#tag-container .tag span');
                if (tagElements.length > 0) {
                    tagElements.forEach((tagElement, index) => {
                        const tagText = tagElement.textContent.trim();
                        tagsArray.push(tagText);
                        formData.append(`tags[${index}]`, tagText);
                    });
                }

                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Submitting...';

                // Send the data to the server
                fetch('/submit-article', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            // Do not set Content-Type header when using FormData
                        },
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw {
                                    status: response.status,
                                    data
                                };
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            const successMsg = document.getElementById('success-message');
                            if (successMsg) {
                                successMsg.style.display = 'block';
                                successMsg.textContent = data.message ||
                                    'Article submitted successfully!';
                            } else {
                                alert(data.message || 'Article submitted successfully!');
                            }

                            // Reset the form after a delay
                            setTimeout(function() {
                                if (successMsg) {
                                    successMsg.style.display = 'none';
                                }

                                form.reset(); // Reset the form

                                if (typeof quill !== 'undefined' && quill) {
                                    quill.setText(''); // Clear the Quill editor
                                }

                                const tagContainer = document.getElementById(
                                    'tag-container');
                                if (tagContainer) {
                                    tagContainer.innerHTML = ''; // Clear tags
                                }

                                const fileNameDisplay = document.getElementById(
                                    'file-name');
                                if (fileNameDisplay) {
                                    fileNameDisplay.textContent =
                                        'No files selected'; // Reset file display
                                }
                            }, 3000); // Reset after 3 seconds
                        } else {
                            showError(data.message || 'Unknown error occurred');
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting the form:', error);

                        // Get the error message
                        let errorMessage = '';

                        if (error.data && error.data.message) {
                            // Extract the specific message from the error object
                            errorMessage = error.data.message;
                        } else {
                            // Fallback to a generic message if the structure is different
                            errorMessage =
                                'An error occurred while submitting the form check if there is ';
                        }

                        // Display the error in a paragraph element
                        document.getElementById('error-container').textContent = errorMessage;

                        if (error.status === 422 && error.data && error.data.errors) {
                            // Handle validation errors
                            const errorMessages = [];
                            for (const field in error.data.errors) {
                                errorMessages.push(error.data.errors[field].join('<br>'));
                            }
                            showError(errorMessages.join('<br>'));
                        } else {
                            showError(
                                'An error occurred while submitting the form. Please try again or you have enough article stock'
                            );
                        }
                    })
                    .finally(() => {
                        // Reset button state
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    });
            });

            // Function to display error messages
            function showError(message) {
                if (errorContainer) {
                    errorContainer.innerHTML = message;
                    errorContainer.style.display = 'block';

                    // Scroll to error messages
                    errorContainer.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                } else {
                    alert(message);
                }
            }
        }
        // Fix any potential focus issues with inputs
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.addEventListener('click', function(e) {
                this.focus();
            });
        });
    });
    </script>
    @endsection