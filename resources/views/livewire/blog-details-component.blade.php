@section('title', $blog->title)
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section
        style="background-image: url({{ asset('storage/' . $blog->image) }});background-size: cover;background-position: center;"
        class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{ route('home') }}" class="single">Home</a>
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
                                <img src="{{ asset('storage/' . $blog->image) }}" class="blog-image w-100"
                                    alt="img">
                            </a>
                            <div class="brush-bg">
                                <img src="{{ asset('assets/images/gallery/brush-bg-two.png') }}" alt="image">
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="blog-info-title">
                                <div class="flex gap-16 mb-20 align-items-center">
                                    <div class="user flex gap-10 align-items-center">
                                        <i class="ri-user-line"></i>
                                        <p class="info">By:
                                            {{ $blog->user->name }}
                                        </p>
                                    </div>
                                    <div class="donate flex gap-10 align-items-center">
                                        <i class="ri-chat-3-line"></i>
                                        <p class="info">
                                            {{ $blog->comments->count() }}
                                        </p>
                                    </div>
                                    <div class="donate flex gap-10 align-items-center">
                                        <i class="ri-chat-3-line"></i>
                                        <p class="info">
                                            {{ $blog->category->name }}
                                        </p>
                                    </div>
                                </div>
                                <h4 style="font-size: 32px;">
                                    {{ $blog->title }}
                                </h4>
                                <div class="post_content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                            <!-- blog info -->
                            <div class="another-blog-info">
                                <div class="d-flex res-flex justify-content-between align-items-center">
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
                            @if ($relatedBlogs->count() > 0)
                                <div class="related-blog">
                                    <p class="pera">Related blogs</p>
                                    <div class="related-blog-slider position-relative">
                                        @foreach ($relatedBlogs as $related)
                                            <div class="single-blog h-calc">
                                                <div class="blog-img">
                                                    <a href="{{route('blog.details', $related->slug)}}l">
                                                        <img src="{{ asset('storage/' . $related->image) }}"
                                                            class="img-fluid w-100" alt="img">
                                                    </a>
                                                </div>
                                                <div class="blog-info">
                                                    <div class="blog-info-title">
                                                        <div class="flex gap-16 mb-16 align-items-center">
                                                            <div class="user flex gap-10 align-items-center">
                                                                <i class="ri-user-line"></i>
                                                                <p class="info">By: {{$related->user->name}}</p>
                                                            </div>
                                                            <div class="donate flex gap-10 align-items-center">
                                                                <i class="ri-chat-3-line"></i>
                                                                <p class="info">
                                                                    {{$related->category->name}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="title text-capitalize">
                                                            {{$related->title}}
                                                        </h4>
                                                        <p class="subtitle">
                                                            {!! Str::limit($related->content, 100
                                                            )!!}
                                                        </p>
                                                        <div class="button-section">
                                                            <a href="{{route('blog.details', $related->slug)}}"
                                                                class="btn-primary-fill pill-btn">Read
                                                                More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="empty-box"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Comments -->
                    <div class="comment-blog">
                        <h4 class="pera">Write a Comment</h4>
                        <div class="comment-box">
                            <div class="custom-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="custom-label" for="name">Full
                                                Name</label>
                                            <input wire:model='name' type="text" class="form-control custom-input"
                                                id="name" placeholder="Alex Jordan">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="custom-label" for="email_address">Email
                                                address</label>
                                            <input wire:model='email' type="email"
                                                class="form-control custom-input" id="email_address"
                                                placeholder="name@example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="custom-label" for="comment">Comment</label>
                                    <textarea wire:model='comment' class="form-control custom-textarea" id="comment" placeholder="Type Keyword"></textarea>
                                </div>
                                <div wire:loading wire:target="saveComment" class="mb-3">
                                    <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading" width="60"
                                        style="user-select: none;">
                                </div>
                                @if (Auth::check())
                                    <button wire:click="saveComment" type="submit" class="submit-btn">Submit
                                        Comment</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Comments list -->
                    <div class="comment-list">
                        <p class="pera">
                            {{ $blog->comments->count() > 9 ? $blog->comments->where('approved', 1)->count() : '0' . $blog->comments->where('approved', 1)->count() }}
                            comment</p>
                        @foreach ($blog->comments->sortByDesc('id') as $comment)
                            @if ($comment->approved == 0)
                                @continue {{-- Skip inactive comments --}}
                            @endif

                            @if ($loop->iteration > 6)
                            @break
                        @endif

                        <div class="single-comment mb-5">
                            <div class="comment-img">
                                <img src="{{ asset($comment->user->avatar ?? 'path/to/default/avatar.png') }}"
                                    alt="img">
                            </div>
                            <div class="comment-info">
                                <div class="user-name-time">
                                    <p class="name">{{ $comment->user->name }}</p>
                                    <p class="time">
                                        {{ $comment->created_at->format('d M Y H:i:s') }}
                                    </p>
                                </div>
                                <p class="subtitle">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
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
                                @foreach ($categories as $category)
                                    <li
                                        class="single-list {{ $category->id == $blog->category_id ? 'active' : '' }}">
                                        <a class="single" href="javascript:void(0)">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- User Box -->
                    <div class="user-box">
                        <div class="user-img mx-auto">
                            <img src="{{ asset($blog->user->avatar) }}" alt="img">
                        </div>
                        <div class="user-info text-center">
                            <h4 class="title">
                                {{ $blog->user->name }}
                            </h4>
                            <p class="pera">
                                {{ $blog->user->bio }}
                            </p>
                        </div>
                        {{-- <div class="social-link justify-content-center">
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
                        </div> --}}
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
            <img src="{{ asset('assets/images/gallery/gallery-1.png') }}" alt="img">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('assets/images/gallery/gallery-2.png') }}" alt="img">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('assets/images/gallery/gallery-3.png') }}" alt="img">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('assets/images/gallery/gallery-4.png') }}" alt="img">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('assets/images/gallery/gallery-2.png') }}" alt="img">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('assets/images/gallery/gallery-3.png') }}" alt="img">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('assets/images/gallery/gallery-1.png') }}" alt="img">
        </div>
    </div>
</div>
<!-- End-of Gallery -->
</main>
