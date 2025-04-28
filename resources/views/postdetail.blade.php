<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mironcoder-classicads.netlify.app/assets/ltr/ad-details-grid by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 06:36:49 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
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
    <meta name="keywords"
        content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Ad Details Grid - Classicads</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FAVICON -->
    <link rel="icon" href="images/favicon.png">

    <!-- FONTS -->
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="fonts/font-awesome/fontawesome.css">

    <!-- VENDOR -->
    <link rel="stylesheet" href="css/vendor/slick.min.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="css/custom/main.css">
    <link rel="stylesheet" href="css/custom/ad-details.css">
    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    @extends('header')

    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    @section('content')
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>ad details grid</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                            <li class="breadcrumb-item"><a href="ad-column3.html">ad-column3</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ad-details-grid</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                  SINGLE BANNER PART END
        =======================================-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
     @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&family=Fira+Mono:wght@400;500&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    
    /* Article Section Styling */
    .bw-article-section {
      padding: 60px 0;
      background-color: #fff;
    }
    
    .bw-article-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .bw-article-wrapper {
      position: relative;
    }
    
    /* Article Header with Title and Image */
    .bw-article-header-main {
      margin-bottom: 30px;
    }
    
    .bw-article-title-main {
      font-family: 'Playfair Display', serif;
      font-size: 36px;
      font-weight: 700;
      color: #000;
      margin-bottom: 20px;
      line-height: 1.2;
    }
    
    .bw-article-image {
      width: 100%;
      border-radius: 8px;
      overflow: hidden;
      margin-bottom: 25px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .bw-article-image img {
      width: 100%;
      height: auto;
      display: block;
      transition: transform 0.3s ease;
    }
    
    .bw-article-image:hover img {
      transform: scale(1.02);
    }
    
    /* Article Meta Information */
    .bw-article-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eaeaea;
    }
    
    .bw-article-author {
      display: flex;
      align-items: center;
    }
    
    .bw-author-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 15px;
      border: 2px solid #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .bw-author-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .bw-author-info {
      display: flex;
      flex-direction: column;
    }
    
    .bw-author-name {
      font-weight: 600;
      color: #000;
      margin: 0;
      font-size: 16px;
    }
    
    .bw-author-email {
      color: #666;
      font-size: 14px;
      margin: 0;
    }
    
    /* Social Sharing */
    .bw-social-share {
      display: flex;
      align-items: center;
    }
    
    .bw-share-label {
      margin-right: 15px;
      font-size: 14px;
      color: #666;
    }
    
    .bw-social-icons {
      display: flex;
    }
    
    .bw-social-icon {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background-color: #f2f2f2;
      margin-left: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
      text-decoration: none;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .bw-social-icon:hover {
      transform: translateY(-3px);
    }
    
    .bw-social-icon.whatsapp:hover {
      background-color: #25D366;
      color: #fff;
    }
    
    .bw-social-icon.facebook:hover {
      background-color: #1877F2;
      color: #fff;
    }
    
    .bw-social-icon.instagram:hover {
      background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
      color: #fff;
    }
    
    .bw-social-icon.twitter:hover {
      background-color: #1DA1F2;
      color: #fff;
    }
    
    .bw-social-icon.copy-url:hover {
      background-color: #333;
      color: #fff;
    }
    
    /* Copy URL tooltip */
    .bw-copy-tooltip {
      position: relative;
    }
    
    .bw-copy-tooltip .bw-tooltip-text {
      visibility: hidden;
      width: 80px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 4px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -40px;
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 12px;
    }
    
    .bw-copy-tooltip .bw-tooltip-text::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #333 transparent transparent transparent;
    }
    
    /* Article ID */
    .bw-article-id {
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      font-weight: 500;
      color: #666;
      margin-bottom: 20px;
      display: inline-block;
      background-color: #f5f5f5;
      padding: 5px 12px;
      border-radius: 20px;
    }
    
    /* Article Cards */
    .bw-article-card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      margin-bottom: 30px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid #eaeaea;
    }
    
    .bw-article-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .bw-article-header {
      border-bottom: 1px solid #eee;
      padding: 22px 28px;
      background-color: #fafafa;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .bw-article-title {
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      font-weight: 700;
      margin: 0;
      color: #111;
      letter-spacing: 0.5px;
    }
    
    .bw-article-content {
      padding: 28px;
      color: #444;
      font-size: 16px;
      line-height: 1.8;
    }
    
    .bw-abstract-card {
      margin-bottom: 25px;
    }
    
    .bw-content-card {
      margin-bottom: 25px;
    }

    /* Article Metadata Info */
    .bw-article-date {
      font-size: 14px;
      color: #777;
      margin-top: 5px;
    }
    
    /* Code Snippet Section */
    .bw-code-snippet-card {
      margin-bottom: 50px;
    }
    
    .bw-code-snippet-container {
      position: relative;
      background-color: #f8f8f8;
      border-radius: 6px;
      padding: 15px;
      margin-top: 10px;
      font-family: 'Fira Mono', monospace;
      font-size: 14px;
      line-height: 1.5;
      overflow-x: auto;
    }
    
    .bw-code-snippet {
      white-space: pre;
      margin: 0;
      color: #333;
      tab-size: 4;
    }
    
    .bw-copy-code-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px 10px;
      font-size: 12px;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      color: #555;
    }
    
    .bw-copy-code-btn:hover {
      background-color: #f2f2f2;
    }
    
    .bw-copy-code-btn i {
      margin-right: 5px;
      font-size: 12px;
    }
    
    /* Success message for copy */
    .bw-copy-success {
      position: fixed;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 14px;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s, visibility 0.3s;
      z-index: 1000;
    }
    
    .bw-copy-success.show {
      opacity: 1;
      visibility: visible;
    }
    
    @media (max-width: 768px) {
      .bw-article-container {
        padding: 0 15px;
      }
      
      .bw-article-title-main {
        font-size: 28px;
      }
      
      .bw-article-meta {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .bw-article-author {
        margin-bottom: 15px;
      }
      
      .bw-social-share {
        width: 100%;
        justify-content: center;
        margin-top: 15px;
      }
      
      .bw-article-header {
        padding: 18px 20px;
      }
      
      .bw-article-content {
        padding: 20px;
      }
    }
</style>
  
<section id="bwArticleSection" class="bw-article-section">
    <div class="bw-article-container">
      <div class="bw-article-wrapper">
        <!-- Article Header with Title and Featured Image -->
        <div class="bw-article-header-main">
        <a href="{{ $article->link }}" target="_blank" >
    <h1 class="bw-article-title-main">{{ $article->title }}</h1>
</a>

          
          <!-- Featured Image -->
          <div class="bw-article-image">
            @php
                $supportingFiles = json_decode($article->supporting_files); 
            @endphp
            
            @if($supportingFiles && count($supportingFiles) > 0)
                @php
                    $filePath = $supportingFiles[0];
                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                @endphp
                
                @if(in_array(strtolower($extension), $imageExtensions))
                    <img src="{{ Storage::url($filePath) }}" alt="{{$article->title}}">
                @else
                    <img src="/api/placeholder/800/400" alt="Article placeholder">
                @endif
            @else
                <img src="/api/placeholder/800/400" alt="Article placeholder">
            @endif
          </div>
          
          <!-- Article Meta Information -->
          <div class="bw-article-meta">
            <div class="bw-article-author">
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
@php
        $firstLetter = strtoupper(substr($article->author_name, 0, 1));
        $firstName = explode(' ', $article->author_name)[0];
        @endphp
        <div class="sidebar-avatar avatar-initial">
            {{ $firstLetter }}
        </div>
              <div class="bw-author-info">
                <h4 class="bw-author-name">{{$article->author_name}}</h4>
                <p class="bw-author-email">{{$article->author_email}}</p>
                <span class="bw-article-date">Published on: {{date('M d, Y', strtotime($article->created_at))}}</span>
              </div>
            </div>
            
            <!-- Social Sharing -->
            <div class="bw-social-share">
              <span class="bw-share-label">Share this article:</span>
              <div class="bw-social-icons">
                <a href="https://api.whatsapp.com/send?text={{urlencode($article->title)}} - {{url()->current()}}" target="_blank" class="bw-social-icon whatsapp" aria-label="Share on WhatsApp">
                  <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="bw-social-icon facebook" aria-label="Share on Facebook">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="bw-social-icon instagram" aria-label="Share on Instagram">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{urlencode($article->title)}}&url={{url()->current()}}" target="_blank" class="bw-social-icon twitter" aria-label="Share on Twitter">
                  <i class="fab fa-twitter"></i>
                </a>
                <div class="bw-social-icon copy-url bw-copy-tooltip" id="bwCopyUrl" aria-label="Copy URL">
                  <i class="fas fa-link"></i>
                  <span class="bw-tooltip-text" id="bwUrlTooltip">Copy URL</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Article ID -->
        <div id="bwArticleId" class="bw-article-id">Article #{{$article->id}}</div>
        
        <!-- Abstract Card -->
        <div id="bwAbstractCard" class="bw-article-card bw-abstract-card">
          <div class="bw-article-header">
            <h5 class="bw-article-title">Abstract</h5>
          </div>
          <div class="bw-article-content">
            {{ strip_tags($article->abstract) }}
          </div>
        </div>
        
        <!-- Content Card -->
        <div id="bwContentCard" class="bw-article-card bw-content-card">
          <div class="bw-article-header">
            <h5 class="bw-article-title">Content</h5>
          </div>
          <div class="bw-article-content">
            {{ strip_tags($article->content) }}
          </div>
        </div>
        
        <!-- Code Snippet Card -->
        <div id="bwCodeSnippetCard" class="bw-article-card bw-code-snippet-card">
          <div class="bw-article-header">
            <h5 class="bw-article-title">Code Snippet</h5>
          </div>
          <div class="bw-article-content">
            <p>Here's a code snippet you can use to reference this article:</p>
            
            <div class="bw-code-snippet-container">
              <pre class="bw-code-snippet" id="bwCodeSnippet">

 {{url()->current()}}

</pre>
              <button class="bw-copy-code-btn" id="bwCopyCodeBtn">
                <i class="far fa-copy"></i> Copy
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Copy success message -->
    <div class="bw-copy-success" id="bwCopySuccess">Copied to clipboard!</div>
  </section>
  
  <!-- JavaScript for copy functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Copy URL functionality
      const copyUrlBtn = document.getElementById('bwCopyUrl');
      const urlTooltip = document.getElementById('bwUrlTooltip');
      
      copyUrlBtn.addEventListener('click', function() {
        const currentUrl = window.location.href;
        copyToClipboard(currentUrl);
        urlTooltip.textContent = 'Copied!';
        
        setTimeout(function() {
          urlTooltip.textContent = 'Copy URL';
        }, 2000);
        
        showCopySuccess();
      });
      
      // Copy code snippet functionality
      const copyCodeBtn = document.getElementById('bwCopyCodeBtn');
      const codeSnippet = document.getElementById('bwCodeSnippet');
      
      copyCodeBtn.addEventListener('click', function() {
        const codeText = codeSnippet.textContent;
        copyToClipboard(codeText);
        showCopySuccess();
      });
      
      // Helper function to show success message
      function showCopySuccess() {
        const successMsg = document.getElementById('bwCopySuccess');
        successMsg.classList.add('show');
        
        setTimeout(function() {
          successMsg.classList.remove('show');
        }, 2000);
      }
      
      // Helper function to copy text to clipboard
      function copyToClipboard(text) {
        // Create temporary textarea element
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.setAttribute('readonly', '');
        textarea.style.position = 'absolute';
        textarea.style.left = '-9999px';
        document.body.appendChild(textarea);
        
        // Select and copy text
        textarea.select();
        document.execCommand('copy');
        
        // Remove temporary element
        document.body.removeChild(textarea);
      }
    });
  </script>

    <!--=====================================
                    RELATED PART START
        =======================================-->



    <!-- VENDOR -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/slick.min.js"></script>

    <!-- CUSTOM -->
    <script src="js/custom/slick.js"></script>
    <script src="js/custom/main.js"></script>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
    @endsection
</body>

<!-- Mirrored from mironcoder-classicads.netlify.app/assets/ltr/ad-details-grid by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 06:36:50 GMT -->

</html>