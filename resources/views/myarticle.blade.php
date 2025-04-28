@extends('header')
@section('content')


<section class="section niche-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Browse Our Top <span>Niche</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="niche-nav">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#ratings" class="nav-link active" data-toggle="tab">Recent</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Recent Tab -->
            <div class="tab-pane active" id="ratings">
                <div class="row">
                    <style>
                    /* Same Image Fix */
                    .product-img img {
                        width: 100%;
                        height: 200px;
                        /* Or you can adjust based on your design */
                        object-fit: cover;
                        /* Make sure image fits without stretching */
                    }
                    </style>

                    <div class="col-md-8 col-lg-8 col-xl-8">
                        @foreach($articles as $article)
                        <div class="product-card standard">
                            <div class="product-media">
                                <div class="product-img">
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
                                    <img src="{{ Storage::url($filePath) }}" alt="product">
                                    @else
                                    <p>No image file available.</p>
                                    @endif
                                    @else
                                    <p>No supporting files available.</p>
                                    @endif
                                </div>

                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div>

                                <div class="product-type">
                                    <span class="flat-badge booking">{{ $article->tags }}</span>
                                </div>

                                <ul class="product-action">
                                    <li class="view">
                                        <i class="fas fa-eye"></i>
                                        <span>{{ $article->views }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="#">Date:</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $article->created_at }}
                                    </li>
                                </ol>

                                @php
                                $titleWords = explode(' ', $article->title);
                                $firstFourWords = implode(' ', array_slice($titleWords, 0, 4));
                                @endphp

                                <h3 class="product-title">
                                    <a href="{{ route('article.show', $article->id) }}">
                                        {{ $firstFourWords }}...
                                    </a>
                                </h3>

                                <div class="product-meta">
                                    @php
                                    $abstractWords = explode(' ', $article->abstract);
                                    $firstTenWords = implode(' ', array_slice($abstractWords, 0, 10));
                                    @endphp
                                    <p>{{ $firstTenWords }}...</p>
                                </div>

                                <div class="product-info">
                                    <h5 class="product-price">By {{ $article->author_name }}</h5>

                                    <div class="product-btn">
                                        <a class="fas fa-share" href="compare.html" title="Share Article"></a>

                                        @if(Auth::check())
                                        @php
                                        $userHasLiked = Auth::user()->likedArticles()->where('article_id',
                                        $article->id)->exists();
                                        @endphp

                                        @if(!$userHasLiked)
                                        <button type="button" title="Like" class="far fa-thumbs-up"
                                            onclick="likeArticle({{ $article->id }})" id="like-btn-{{ $article->id }}">
                                            ({{ $article->likes }})
                                        </button>
                                        @else
                                        <button type="button" title="You already liked this article"
                                            class="fas fa-thumbs-up" disabled>
                                            ({{ $article->likes }})
                                        </button>
                                        @endif
                                        @else
                                        <span>You must be logged in to like this article.</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>


                </div>
            </div>
            <!-- Popular Tab -->
        </div>
        
        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================
                    NICHE PART END
        =======================================-->
<section class="intro-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Do you have something to advertise?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p>
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
                    INTRO PART END
        =======================================-->


<!--=====================================
                     PRICE PART START
        =======================================-->
<section class="price-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Best Reliable Pricing Plans</h2>

                </div>
            </div>
        </div>
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
        <br>
    </div>
</section>
<script>
function likeArticle(articleId) {
    fetch(`/articles/${articleId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('like-btn-' + articleId).innerHTML = `(${data.likes})`;
            } else {
                if (data.message === 'You must be logged in to like the article.') {
                    window.location.href = '/login';
                } else {
                    alert('You already like the article');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
</script>

@endsection