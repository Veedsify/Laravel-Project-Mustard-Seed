@section('title', $item->name . ' - Donation Details')
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section
        style="background-image: url(https://images.pexels.com/photos/6646921/pexels-photo-6646921.jpeg?auto=compress&cs=tinysrgb&w=600);background-size: cover;background-position: center;"
        class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{ route('home') }}" class="single">Home</a>
                        </li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Item </a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Item details</h1>
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
                                <img src="{{ asset('storage/' . $item->image) }}" class="blog-image w-100"
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
                                            {{ $item->user->name }}
                                        </p>
                                    </div>
                                    <div class="donate flex gap-10 align-items-center">
                                        <i class="ri-chat-3-line"></i>
                                        <p class="info">
                                        </p>
                                    </div>
                                    <div class="donate flex gap-10 align-items-center">
                                        <small>Condiiton:</small>
                                        <p class="info">
                                            {{ $item->condition === 1 ? 'New' : 'Used' }}
                                        </p>
                                    </div>
                                </div>
                                <h4 style="font-size: 32px;" class="fw-bold">
                                    {{ $item->name }}
                                </h4>
                                <div class="post_content">
                                    {!! $item->content !!}
                                </div>
                            </div>
                            <!-- blog info -->
                            <div class="another-blog-info">
                                <div class="d-flex res-flex justify-content-between gap-2 align-items-center">
                                    <div class="d-flex align-items-center gap-1">
                                        <h4 class="fw-bold">
                                            Condition:
                                        </h4>
                                        <div class="flex align-items-center">
                                            <div class="badge px-2 py-1">
                                                <p class="subtitle">
                                                    {{ $item->condition === 1 ? 'New' : 'Used' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="share-link align-items-center text-right">
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
                            @if ($otherItems->count() > 0)
                                <div class="related-blog">
                                    <p class="pera">Related Items</p>
                                    <div class="related-blog-slider position-relative">
                                        @foreach ($otherItems as $otherItem)
                                            <div class="single-blog h-calc">
                                                <div class="blog-img" style="flex:1;">
                                                    <a href="{{ route('item.preview', $otherItem->slug) }}">
                                                        <img style="object-fit: cover;"
                                                            src="{{ asset('storage/' . $otherItem->image) }}"
                                                            class="img-fluid w-100" alt="img">
                                                    </a>
                                                </div>
                                                <div class="blog-info flex-1" style="flex:1;">
                                                    <div class="blog-info-title">
                                                        <div class="flex gap-16 mb-16 align-items-center">
                                                            <div class="user flex gap-10 align-items-center">
                                                                <i class="ri-user-line"></i>
                                                                <p class="info">By:
                                                                    {{ $otherItem->user->name }}
                                                                </p>
                                                            </div>
                                                            <div class="donate flex gap-10 align-items-center">
                                                                <p>Condition</p>
                                                                <p class="info">
                                                                    {{ $otherItem->condition === 1 ? 'New' : 'Used' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="title text-capitalize">
                                                            {{ $otherItem->name }}
                                                        </h4>
                                                        <div class="subtitle pb-2">
                                                            {!! $otherItem->description !!}
                                                        </div>
                                                        <div class="button-section">
                                                            <a href="{{ route('item.preview', $otherItem->slug) }}"
                                                                class="btn-primary-fill pill-btn" wire:navigate>View
                                                                Item</a>
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
                    @if (auth()->check() && !($item->user->id === auth()->id() || $item->volunteer->id === auth()->id()))
                        <div class="comment-blog" id="#apply">
                            <h4 class="pera">Apply To Receive This Item</h4>
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
                                        <label class="custom-label" for="exampleFormControlTextarea3">Reasons Why you
                                            Need This</label>
                                        <textarea class="form-control custom-textarea" id="exampleFormControlTextarea3" placeholder="Type Keyword"></textarea>
                                    </div>
                                    @if (!auth()->user())
                                        <div class="form-group">
                                            <div>
                                                You need to <a href="{{ route('login') }}"
                                                    class="text-primary">login</a> to apply for this item.
                                            </div>
                                        </div>
                                    @else
                                        <button type="submit" class="submit-btn">Apply</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="right-element">
                        <!-- User Box -->
                        @if (!$item->is_anonymous)
                            <h6 class="fw-bold mb-3">Donator</h6>
                            <div class="user-box mb-3">
                                <div class="user-img mx-auto">
                                    <img src="{{ asset($item->user->avatar) }}" alt="img">
                                </div>
                                <div class="user-info text-center">
                                    <h4 class="title">
                                        {{ $item->user->name }}
                                    </h4>
                                    <p class="pera">
                                        {{ Str::limit($item->user->bio, 120) }}
                                    </p>
                                </div>
                                <div class="social-link justify-content-center">
                                    <div class="social-icon active">
                                        <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                    </div>
                                    <div class="social-icon">
                                        <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                                    </div>
                                    <div class="social-icon">
                                        <a href="javascript:void(0)"><i class="ri-instagram-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                    </div>
                </div>
            </div>
        </div>
    </section>


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
