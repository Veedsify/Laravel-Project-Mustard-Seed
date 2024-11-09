@section('title', $title)
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('storage/' . optional($headerImages)->about_page_header_image) }}); background-size:cover; background-position:center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow-dis fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a>
                        </li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">About Us</a>
                        </li>
                    </ul>
                </nav>
                <h1 class="title wow-dis fadeInUp" data-wow-delay="0.1s">About Us</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- helpful area S t a r t-->
    <section class="helpful-area-three section-padding">
        <div class="container">
            <div class="row g-24">
                @foreach ($services as $service)
                    <div class="col-xl-3 col-md-6 col-lg-6">
                        <div class="helpful-card wow-dis fadeInUp" data-wow-delay="0.0s">
                            <div class="helpful-card-icon">
                                <i class="ri-hand-coin-line"></i>
                            </div>
                            <div class="helpful-card-caption">
                                <h4 class="caption-title">
                                    <a href="javascript:void(0)">{{ $service->service_name }}</a>
                                </h4>
                                <p class="caption-para">
                                    {{ Str::limit($service->service_description, 100) }}
                                </p>
                                <a href="{{ $service->service_slug }}" class="imp-link">Read More <i
                                        class="ri-arrow-right-up-line"></i></a>
                            </div>
                            <div class="number-watermark">
                                <h4 class="number">
                                    {{ $loop->iteration }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End-of helpful-->

    <!-- About us Area S t a r t -->
    <section class="about-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 my-auto">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-35">
                        <span class="sub-tittle text-capitalize font-600">{{ optional($aboutPageConfig)->short_title }}</span>
                        <h2 class="title font-700 pb-15">{{ optional($aboutPageConfig)->title }}</h2>
                        <p class="pera-subtitle mb-15">
                            {!! optional($aboutPageConfig)->content !!}
                        </p>
                    </div>
                    <div class="about-info">
                        <div class="row">
                            <div class="col-lg-10 mb-20">
                                <div class="d-flex gap-20">
                                    <div class="info-icon">
                                        <i class="ri-hand-heart-line"></i>
                                    </div>
                                    <div class="info-content">
                                        <h4 class="title">{{ optional($aboutPageConfig)->donation_title }}</h4>
                                        <p class="pera">{{ optional($aboutPageConfig)->donation_content }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 mb-20">
                                <div class="d-flex gap-20">
                                    <div class="info-icon">
                                        <i class="ri-user-line"></i>
                                    </div>

                                    <div class="info-content">
                                        <h4 class="title">{{ optional($aboutPageConfig)->volunteer_title }}</h4>
                                        <p class="pera">{{ optional($aboutPageConfig)->volunteer_content }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 mt-10">
                                <a href="{{ optional($aboutPageConfig)->read_more_link }}"
                                    class="btn btn-primary-fill">{{ optional($aboutPageConfig)->read_more_title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <div>
                            <img class="w-100 d-none d-lg-block"
                                src="{{ asset('storage/' . optional($aboutPageConfig)->main_image) }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of About us Area -->

    <!-- favorite Area S t a r t -->
    <div class="favourite-section section-padding">
        <div class="container">
            <div class="favourite-slider">
                @foreach ($aboutPagePartners as $aboutPagePartner)
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $aboutPagePartner->image) }}" width="150" alt="image">
                    </div>
                @endforeach
            </div>
            <hr class="divider mb-0">
        </div>
    </div>
    <!-- End-of favorite -->

    <!-- Team Area S t a r t -->
    @if ($volunteers->count() > 0)
        <section class="team-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-50">
                            <span class="sub-tittle text-capitalize font-600">Expert Team</span>
                            <h2 class="title font-700">Meet our volunteer team</h2>
                        </div>
                    </div>
                </div>
                <div class="row gy-24">
                    @foreach ($volunteers as $volunteer)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 view-wrapper">
                            <div class="single-team h-calc wow-dis fadeInUp" data-wow-delay="0.0s">
                                <div class="team-img">
                                    <a href="{{ route('volunteers.details', [$volunteer->username]) }}">
                                        <img src="{{ asset('storage/' . $volunteer->volunteer_settings->image) }}"
                                            class="img-fluid w-100" style="aspect-ratio:1/1; object-fit:cover;" alt="img">
                                    </a>
                                </div>
                                <div class="team-info">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="team-info-title mb-8">
                                            <div class="d-flex gap-40 align-items-center">
                                                <div class="content">
                                                    <h4 class="title text-capitalize"><a
                                                            href="{{ route('volunteers.details', [$volunteer->username]) }}">
                                                            {{ $volunteer->volunteer_settings->organization }}
                                                        </a></h4>
                                                    <p class="pera">founded in
                                                        {{ $volunteer->volunteer_settings->age }}</p>
                                                </div>
                                                <div class="social">
                                                    <a class="hover-icon" href="javascript:void(0)"><i
                                                            class="ri-share-fill"></i></a>
                                                    <div class="all-social-icon">
                                                        <a class="social-icon"
                                                            href="{{ $volunteer->volunteer_settings->facebook }}"><i
                                                                class="ri-twitter-fill"></i></a>
                                                        <a class="social-icon"
                                                            href="{{ $volunteer->volunteer_settings->twitter }}"><i
                                                                class="ri-facebook-fill"></i></a>
                                                        <a class="social-icon"
                                                            href="{{ $volunteer->volunteer_settings->linkedin }}"><i
                                                                class="ri-linkedin-fill"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End-of Team -->

    <!-- Testimonial S t a r t-->
    <section class="testimonial-section-three section-padding">
        <div class="container">
            <div class="row gy-24 align-items-center">
                <div class="col-xl-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle">
                        <span class="sub-tittle text-capitalize font-600">Testimonials</span>
                        <h2 class="title font-700">That's very glad to get People Review</h2>
                        <p class="pera">If you're interested in donating your Money, it's important to discussyour
                            wishes. These questions are used to provoke thought and discussion. They can be used to
                            challenge the other person's assumptions.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-9">
                    <div class="position-relative">
                        <div class="testimonial-slider-three-active flex">
                            <div class="quote-with-img">
                                <div class="testimonial-images">
                                    <img class="w-100" src="assets/images/gallery/testimonial.png" alt="image">
                                </div>
                            </div>
                            <div class="testimonial-images">
                                <img class="w-100" src="assets/images/gallery/testimonial.png" alt="image">
                            </div>
                            <div class="testimonial-images">
                                <img class="w-100" src="assets/images/gallery/testimonial.png" alt="image">
                            </div>
                        </div>
                        <div class="position-card d-none d-lg-block">
                            <div class="single-testimonial-three">
                                <div class="rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <div class="position-relative">
                                    <p class="pera"><i>These questions are used to provoke thought and discussion.
                                            They can be used to challenge the other person's assumptions, such as
                                            "Do you really think that's true?"</i></p>
                                </div>
                                <div class="client-info">
                                    <div class="client-image">
                                        <img src="assets/images/gallery/testimonial-4.png" alt="image">
                                    </div>
                                    <div class="client-details">
                                        <h3 class="name">Robart Jonson</h3>
                                        <p class="location">Manager</p>
                                    </div>
                                </div>
                                <div class="position-absolute quote">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="62" height="45"
                                        viewBox="0 0 62 45" fill="none">
                                        <path
                                            d="M20.6667 0.75H10.3333C7.59277 0.75 4.96445 1.83869 3.02657 3.77657C1.08869 5.71445 0 8.34277 0 11.0833L0 21.4167C0 22.787 0.544345 24.1011 1.51328 25.0701C2.48222 26.039 3.79639 26.5834 5.16667 26.5834H20.4342C19.8212 30.1911 17.9528 33.4661 15.1591 35.8297C12.3654 38.1932 8.8261 39.4933 5.16667 39.5001C4.48153 39.5001 3.82445 39.7722 3.33998 40.2567C2.85551 40.7412 2.58334 41.3983 2.58334 42.0834C2.58334 42.7685 2.85551 43.4256 3.33998 43.9101C3.82445 44.3946 4.48153 44.6667 5.16667 44.6667C10.6459 44.6606 15.899 42.4812 19.7734 38.6068C23.6479 34.7324 25.8272 29.4793 25.8334 24V5.91667C25.8334 4.54639 25.289 3.23222 24.3201 2.26328C23.3511 1.29434 22.037 0.75 20.6667 0.75Z"
                                            fill="#EDEDEF" />
                                        <path
                                            d="M56.8334 0.75H46.5001C43.7595 0.75 41.1312 1.83869 39.1933 3.77657C37.2554 5.71445 36.1667 8.34277 36.1667 11.0833V21.4167C36.1667 22.787 36.7111 24.1011 37.68 25.0701C38.649 26.039 39.9631 26.5834 41.3334 26.5834H56.6009C55.988 30.1911 54.1196 33.4661 51.3258 35.8297C48.5321 38.1932 44.9929 39.4933 41.3334 39.5001C40.6483 39.5001 39.9912 39.7722 39.5067 40.2567C39.0223 40.7412 38.7501 41.3983 38.7501 42.0834C38.7501 42.7685 39.0223 43.4256 39.5067 43.9101C39.9912 44.3946 40.6483 44.6667 41.3334 44.6667C46.8127 44.6606 52.0658 42.4812 55.9402 38.6068C59.8146 34.7324 61.994 29.4793 62.0001 24V5.91667C62.0001 4.54639 61.4558 3.23222 60.4868 2.26328C59.5179 1.29434 58.2037 0.75 56.8334 0.75Z"
                                            fill="#EDEDEF" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of Testimonial -->

    <!-- Blog S t a r t -->
    <livewire:comps.home-blog-section />
    <!-- End-of Blog -->

    <!-- Gallery S t a r t -->
    <div class="gallery-area">
        <div class="gallery-slider d-flex">
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-1.png" alt="img">
            </div>
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-2.png" alt="img">
            </div>
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-3.png" alt="img">
            </div>
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-4.png" alt="img">
            </div>
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-2.png" alt="img">
            </div>
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-3.png" alt="img">
            </div>
            <div class="gallery-img">
                <img src="assets/images/gallery/gallery-1.png" alt="img">
            </div>
        </div>
    </div>
    <!-- End-of Gallery -->
</main>
