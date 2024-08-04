@section('title', $blog->title)
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section
        style="background-image: url({{asset('storage/'. $blog->image)}});background-size: cover;background-position: center;"
        class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a>
                        </li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                                                                       class="single">Blog </a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">blog details</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- Blog-details S t a r t -->
    <section class="blog-details top-bottom-padding2">
        <div class="container">
            <div class="row gy-24">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="javascript:void(0)">
                                <img src="{{asset('storage/'. $blog->image)}}" class="blog-image w-100"
                                     alt="img">
                            </a>
                            <div class="brush-bg">
                                <img src="{{asset('assets/images/gallery/brush-bg-two.png')}}" alt="image">
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="blog-info-title">
                                <div class="flex gap-16 mb-20 align-items-center">
                                    <div class="user flex gap-10 align-items-center">
                                        <i class="ri-user-line"></i>
                                        <p class="info">By:
                                            {{$blog->user->name}}
                                        </p>
                                    </div>
                                    <div class="donate flex gap-10 align-items-center">
                                        <i class="ri-chat-3-line"></i>
                                        <p class="info">
                                            {{$blog->comments->count()}}
                                        </p>
                                    </div>
                                    <div class="donate flex gap-10 align-items-center">
                                        <i class="ri-chat-3-line"></i>
                                        <p class="info">
                                            {{$blog->category->name}}
                                        </p>
                                    </div>
                                </div>
                                <h4 style="font-size: 32px;">
                                    {{$blog->title}}
                                </h4>
                                <div class="post_content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                            <!-- blog info -->
                            <div class="another-blog-info">
                                <div class="d-flex res-flex justify-content-between align-items-center">
                                    <div class="imp-btn flex align-items-center">
                                        <div class="badge active">
                                            <p class="subtitle">medical</p>
                                        </div>
                                        <div class="badge">
                                            <p class="subtitle">Food</p>
                                        </div>
                                    </div>
                                    <div class="share-link align-items-center">
                                        <p class="title">share:</p>
                                        <div class="social-link">
                                            <div class="social-icon active">
                                                <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                            </div>
                                            <div class="social-icon">
                                                <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                                            </div>
                                            <div class="social-icon">
                                                <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                            </div>
                                            <div class="social-icon">
                                                <a href="javascript:void(0)"><i class="ri-instagram-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Related Blog -->
                            <div class="related-blog">
                                <p class="pera">Related blogs</p>
                                <div class="related-blog-slider position-relative">
                                    <div class="single-blog h-calc">
                                        <div class="blog-img">
                                            <a href="blog-details.html">
                                                <img src="{{asset('assets/images/gallery/blog-verti.png')}}"
                                                     class="img-fluid w-100" alt="img">
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <div class="blog-info-title">
                                                <div class="flex gap-16 mb-16 align-items-center">
                                                    <div class="user flex gap-10 align-items-center">
                                                        <i class="ri-user-line"></i>
                                                        <p class="info">By: admin</p>
                                                    </div>
                                                    <div class="donate flex gap-10 align-items-center">
                                                        <i class="ri-chat-3-line"></i>
                                                        <p class="info">Donation</p>
                                                    </div>
                                                </div>
                                                <h4 class="title text-capitalize">You can help make a difference in
                                                    the
                                                    lives of these children. With your donation.</h4>
                                                <p class="subtitle">without access to basic necessities like
                                                    food,clean
                                                    water healthcare. Many of these children are also denied the
                                                    opportunity ,</p>
                                                <div class="button-section">
                                                    <a href="blog-details.html" class="btn-primary-fill pill-btn">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-blog h-calc">
                                        <div class="blog-img">
                                            <a href="blog-details.html">
                                                <img src="{{asset('assets/images/gallery/blog-verti.png')}}"
                                                     class="img-fluid w-100" alt="img">
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <div class="blog-info-title">
                                                <div class="flex gap-16 mb-16 align-items-center">
                                                    <div class="user flex gap-10 align-items-center">
                                                        <i class="ri-user-line"></i>
                                                        <p class="info">By: admin</p>
                                                    </div>
                                                    <div class="donate flex gap-10 align-items-center">
                                                        <i class="ri-chat-3-line"></i>
                                                        <p class="info">Donation</p>
                                                    </div>
                                                </div>
                                                <h4 class="title text-capitalize">You can help make a difference in
                                                    the
                                                    lives of these children. With your donation.</h4>
                                                <p class="subtitle">without access to basic necessities like
                                                    food,clean
                                                    water healthcare. Many of these children are also denied the
                                                    opportunity ,</p>
                                                <div class="button-section">
                                                    <a href="blog-details.html" class="btn-primary-fill pill-btn">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty-box"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Comments -->
                    <div class="comment-blog">
                        <h4 class="pera">Write a Comment</h4>
                        <div class="comment-box">
                            <form action="javascript:void(0)" method="post" class="custom-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="custom-label" for="exampleFormControlInput1">Full
                                                Name</label>
                                            <input type="text" class="form-control custom-input"
                                                   id="exampleFormControlInput1" placeholder="Alex Jordan">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="custom-label" for="exampleFormControlInput1">Email
                                                address</label>
                                            <input type="email" class="form-control custom-input"
                                                   id="exampleFormControlInput2" placeholder="name@example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="custom-label" for="exampleFormControlTextarea3">Comment</label>
                                    <textarea class="form-control custom-textarea" id="exampleFormControlTextarea3"
                                              placeholder="Type Keyword"></textarea>
                                </div>
                                <button type="submit" class="submit-btn">Submit Comment</button>
                            </form>
                        </div>
                    </div>
                    <!-- Comments list -->
                    <div class="comment-list">
                        <p class="pera">04 comment</p>
                        <div class="single-comment">
                            <div class="comment-img">
                                <img src="{{asset('assets/images/gallery/comment-1.png')}}" alt="img">
                            </div>
                            <div class="comment-info">
                                <div class="user-name-time">
                                    <p class="name">Alex Jordan</p>
                                    <p class="time">Jun 12, 2023 At 9.00 am</p>
                                </div>
                                <p class="subtitle">I will give you a complete account of the system, and expound on
                                    the
                                    actual teachings of the great explorer of the truth, it's important to discuss
                                    your
                                    wishes with your family.</p>
                                <a href="javascript:void(0)" class="reply-btn">Reply</a>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="single-comment two">
                            <div class="comment-img">
                                <img src="{{asset('assets/images/gallery/comment-2.png')}}" alt="img">
                            </div>
                            <div class="comment-info">
                                <div class="user-name-time">
                                    <p class="name">Alex Jordan</p>
                                    <p class="time">Jun 12, 2023 At 9.00 am</p>
                                </div>
                                <p class="subtitle">I will give you a complete account of the system, and expound on
                                    the
                                    actual teachings of the great explorer of the truth, it's important to discuss
                                    your
                                    wishes with your family.</p>
                                <a href="javascript:void(0)" class="reply-btn">Reply</a>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="single-comment three">
                            <div class="comment-img">
                                <img src="{{asset('assets/images/gallery/comment-3.png')}}" alt="img">
                            </div>
                            <div class="comment-info">
                                <div class="user-name-time">
                                    <p class="name">Alex Jordan</p>
                                    <p class="time">Jun 12, 2023 At 9.00 am</p>
                                </div>
                                <p class="subtitle">I will give you a complete account of the system, and expound on
                                    the
                                    actual teachings of the great explorer of the truth, it's important to discuss
                                    your
                                    wishes with your family.</p>
                                <a href="javascript:void(0)" class="reply-btn">Reply</a>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="single-comment">
                            <div class="comment-img">
                                <img src="{{asset('assets/images/gallery/comment-4.png')}}" alt="img">
                            </div>
                            <div class="comment-info">
                                <div class="user-name-time">
                                    <p class="name">Alex Jordan</p>
                                    <p class="time">Jun 12, 2023 At 9.00 am</p>
                                </div>
                                <p class="subtitle">I will give you a complete account of the system, and expound on
                                    the
                                    actual teachings of the great explorer of the truth, it's important to discuss
                                    your
                                    wishes with your family.</p>
                                <a href="javascript:void(0)" class="reply-btn">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="right-element">

                        <!-- Search Box -->
                        <div class="search-section">
                            <p class="pera">Search Here</p>
                            <div class="dotted">
                                <div class="active-dot"></div>
                                <div class="inactive-dot"></div>
                            </div>
                            <div class="search-box">
                                <input type="search" class="search-input" placeholder="Enter Your Keyword">
                                <div class="search-icon">
                                    <i class="ri-search-line"></i>
                                </div>
                            </div>
                        </div>

                        <!-- category -->
                        <div class="category-section">
                            <p class="pera">Category List</p>
                            <div class="dotted">
                                <div class="active-dot"></div>
                                <div class="inactive-dot"></div>
                            </div>
                            <div class="category-box">
                                <ul class="listing">
                                    <li class="single-list">
                                        <a class="single" href="javascript:void(0)">Food</a>
                                    </li>
                                    <li class="single-list">
                                        <a class="single" href="javascript:void(0)">Medical</a>
                                    </li>
                                    <li class="single-list active">
                                        <a class="single" href="javascript:void(0)">Global Warming</a>
                                    </li>
                                    <li class="single-list">
                                        <a class="single" href="javascript:void(0)">Wireframing</a>
                                    </li>
                                    <li class="single-list">
                                        <a class="single" href="javascript:void(0)">Recycline</a>
                                    </li>
                                    <li class="single-list">
                                        <a class="single" href="javascript:void(0)">Education</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Related post -->
                        <div class="related-post-section">
                            <p class="pera text-capitalize">Related post</p>
                            <div class="dotted">
                                <div class="active-dot"></div>
                                <div class="inactive-dot"></div>
                            </div>
                            <div class="related-box">
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="blog-details.html"><img
                                                src="{{asset('assets/images/gallery/post-1.png')}}" alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="blog-details.html"><img
                                                src="{{asset('assets/images/gallery/post-2.png')}}" alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="blog-details.html"><img
                                                src="{{asset('assets/images/gallery/post-3.png')}}" alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="blog-details.html"><img
                                                src="{{asset('assets/images/gallery/post-4.png')}}" alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tag -->
                        <div class="tag-section">
                            <p class="pera">Tags</p>
                            <div class="dotted">
                                <div class="active-dot"></div>
                                <div class="inactive-dot"></div>
                            </div>
                            <div class="tag-box">
                                <div class="tag-info">
                                    <div class="badge active">
                                        <p class="subtitle">medical</p>
                                    </div>
                                    <div class="badge">
                                        <p class="subtitle">Food</p>
                                    </div>
                                    <div class="badge">
                                        <p class="subtitle">Election</p>
                                    </div>
                                    <div class="badge">
                                        <p class="subtitle">Campaign</p>
                                    </div>
                                    <div class="badge">
                                        <p class="subtitle">Security</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User Box -->
                        <div class="user-box">
                            <div class="user-img mx-auto">
                                <img src="{{asset('assets/images/gallery/user.png')}}" alt="img">
                            </div>
                            <div class="user-info text-center">
                                <h4 class="title">Jonny Sophia</h4>
                                <p class="pera">Hi! beautiful people. I`m the author of this blog.</p>
                            </div>
                            <div class="social-link justify-content-center">
                                <div class="social-icon active">
                                    <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                </div>
                                <div class="social-icon">
                                    <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                                </div>
                                <div class="social-icon">
                                    <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                </div>
                                <div class="social-icon">
                                    <a href="javascript:void(0)"><i class="ri-instagram-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End-of Blog-details -->

    <!-- Gallery S t a r t -->
    <div class="gallery-area">
        <div class="gallery-slider d-flex">
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-1.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-2.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-3.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-4.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-2.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-3.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{asset('assets/images/gallery/gallery-1.png')}}" alt="img">
            </div>
        </div>
    </div>
    <!-- End-of Gallery -->
</main>
