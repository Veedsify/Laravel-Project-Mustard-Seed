@section('title', $title)
<main>
    <!-- Hero area S t a r t-->
    <section class="hero-area">
        <div class="single-slider hero-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 my-auto">
                        <div class="hero-caption-one mb-20">
                            <h4 class="key-title font-700 mb-20 wow-dis fadeInUp" data-wow-delay="0.0s">
                                {{ $data->home_banner_intro ?? 'Welcome to our charity' }}
                            </h4>
                            <h1 class="title font-700 wow-dis fadeInUp" data-wow-delay="0.1s">
                                {{ $data->home_banner_title ?? 'Helping the poor' }}
                            </h1>
                            <p class="pera wow-dis fadeInUp" data-wow-delay="0.3s">
                                {{ $data->home_banner_description ?? "When deciding which charity to donate to, it's important to do your research and find one that aligns with your values and interests." }}
                            </p>
                            <div class="d-flex gap-20 flex-wrap">
                                <a href="{{ Auth::check() ? config('app.url') . '/user/items' : route('register') }}"
                                    class="btn-primary-fill hero-btn wow-dis fadeInLeft" data-wow-delay="0.4s">Donate
                                    Now</a>
                                <a href="{{ route('register.as.volunteer') }}" wire:navigate
                                    class="btn-tertiary-fill hero-btn wow-dis fadeInRight" data-wow-delay="0.4s">Join
                                    Volunteers</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="d-flex gap-44">
                            <div class="hero-image position-relative d-none d-lg-block">
                                <img src="{{ isset($data) && $data->home_banner_image ? asset('storage/' . $data->home_banner_image) : 'https://images.pexels.com/photos/28172953/pexels-photo-28172953/free-photo-of-a-woman-with-a-scarf-on-her-head-in-a-wheat-field.jpeg' }}"
                                    alt="img" class="w-100 tilt-effect wow-dis fadeInUp" data-wow-delay="0.1s">
                            </div>
                            @if ($data && $data->show_banner_experience)
                                <div class="hero-count-section flex flex-column gap-60">
                                    <div class="hero-count wow-dis fadeInUp" data-wow-delay="0.0s">
                                        <h4 class="title">
                                            {{ $data->banner_experience_title_1 }}
                                        </h4>
                                        <p class="pera">
                                            {{ $data->banner_experience_desc_1 }}
                                        </p>
                                    </div>
                                    <div class="hero-count wow-dis fadeInUp" data-wow-delay="0.2s">
                                        <h4 class="title">
                                            {{ $data->banner_experience_title_2 }}
                                        </h4>
                                        <p class="pera">
                                            {{ $data->banner_experience_desc_2 }}
                                        </p>
                                    </div>
                                    <div class="hero-count  wow-dis fadeInUp" data-wow-delay="0.3s">
                                        <h4 class="title">
                                            {{ $data->banner_experience_title_3 }}
                                        </h4>
                                        <p class="pera">
                                            {{ $data->banner_experience_desc_3 }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of Hero-->

    <!-- helpful area S t a r t-->
    @if ($data && $data->show_feature_section)
        <section class="helpful-area">
            <div class="container">
                <div class="row gy-24 mb-5 justify-content-center">
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-md-6 col-lg-6">
                            <div class="helpful-card h-calc  wow-dis fadeInLeft" data-wow-delay="0.2s">
                                <div class="helpful-card-icon">
                                    <img src="{{ 'storage/' . $service->service_image }}" width="50" alt="" style="invert: 1;">
                                </div>
                                <div class="helpful-card-caption">
                                    <h4 class="caption-title">
                                        {{ $service->service_name }}
                                    </h4>
                                    <p class="caption-para">
                                        {{ Str::limit($service->service_description, 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End-of helpful-->
    {{-- @if ($data && $data->show_event_section)
        <livewire:comps.home-urgent-section />
    @endif --}}
    <!-- Donate S t a r t -->
    <section class="donate-section bottom-padding">
        <div class="container">
            @if ($campaigns->count() > 0)
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-50">
                            <span class="sub-tittle text-capitalize font-600">We Love To Help Poor</span>
                            <h2 class="title font-700">Help & Donate Us Now</h2>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row gy-24">
                @foreach ($campaigns as $campaign)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                        <div class="single-donate h-calc wow fadeInUp" data-wow-delay="0.0s">
                            @php
                                $percentage = ($campaign->raised / $campaign->goal) * 100;
                            @endphp
                            <div class="donate-img position-relative" data-percent="{{ $percentage . '%' }}">
                                <a href="{{ route('donate.details', $campaign->slug) }}" wire:navigate>
                                    <img class="w-100" style="aspect-ratio: 1/1; object-fit: cover"
                                        src="{{ asset('storage/' . $campaign->image) }}" alt="img"> </a>
                                <div class="donate-badge">
                                    <p class="subtitle">
                                        {{ $campaign->campaign_category->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="donate-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="donate-info-title w-100">
                                        <h4 class="title text-capitalize">
                                            <a href="{{ route('donate.details', $campaign->slug) }}">
                                                {{ $campaign->name }}
                                            </a>
                                        </h4>
                                        <div class="subtitle" id="content">
                                            {!! Str::limit($campaign->description, 150) !!}
                                        </div>
                                        <div class="progress custom-progress-two">
                                            <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <div class="flex justify-content-between mt-14 mb-20">
                                            <div class="flex gap-20">
                                                <div class="charges">
                                                    <p class="pera">
                                                        {{ $campaign->payment_method === 'cash' ? $campaign->payment_currency : '' }}
                                                        {{ number_format($campaign->goal) }}
                                                    </p>
                                                    <h4 class="title">Goals</h4>
                                                </div>
                                                <div class="charges">
                                                    <p class="pera">
                                                        {{ $campaign->payment_method === 'cash' ? "$" : '' }}
                                                        {{ number_format($campaign->raised) }}
                                                    </p>
                                                    <h4 class="title">Raised</h4>
                                                </div>
                                            </div>
                                            <div class="forward-btn">
                                                <i class="ri-reply-fill"></i>
                                            </div>
                                        </div>
                                        <a href="{{ route('donate.details', $campaign->slug) }}"
                                            class="btn donate-btn w-100" wire:navigate>Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End-of Donate -->

    @if ($data && $data->show_upcoming_event_section)
        <div class="our-event-three mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 mx-auto">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-45">
                            <h2 class="title font-700">Upcoming Events</h2>
                            <p class="pera">
                                The upcoming events are listed below. Please join us and help the poor.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider center-slider-active">
                <!-- Single -->
                @foreach ($upcoming_events as $event)
                    <div class="clip event-image-overlay ml-15 mr-15">
                        <a href="#"><img class="main-img" src="{{ asset('storage/' . $event->image) }}"
                                style="aspect-ratio: 16/9; height: 500px; border-radius: 2rem; object-fit: cover"
                                alt="image"></a>
                        <div class="brush-bg">
                            <img src="{{ asset('assets/images/gallery/brush.png') }}" alt="image">
                        </div>
                        <div class="overlay-text">
                            <h4 class="title"><a href="#">
                                    {{ $event->name }}
                                </a>
                            </h4>
                            <div class="highlight">
                                <p class="pera">
                                    {{ $event->location }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    @if ($data && $data->show_blog_section)
        <!-- Blog S t a r t -->
        <livewire:comps.home-blog-section />
        <!-- End-of Blog -->
    @endif

    @if ($data && $data->show_testimonial_section)
        <!-- Testimonial S t a r t-->
        <section class="testimonial-section bottom-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-50">
                            <span class="sub-tittle text-capitalize font-600">Testimonials</span>
                            <h2 class="title font-700">What Our Donors Say</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-24">
                    <div class="col-lg-10 col-12 testimonial-slider">
                        <div class="single-testimonial position-relative">
                            <div class="client-info">
                                <div class="client-details">
                                    <h3 class="name">Sarah Thompson</h3>
                                    <p class="location">Monthly Donor</p>
                                </div>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <p class="pera">
                                    <i>"I've been donating monthly for over a year now, and it's incredible to see the
                                        impact we're making together. The transparency in how funds are used and regular
                                        updates about the projects make me confident in my decision to support this
                                        cause."</i>
                                </p>
                                <div class="position-absolute quote">
                                    <div class="rounded-btn">
                                        <i class="ri-double-quotes-r"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial position-relative">
                            <div class="client-info">
                                <div class="client-details">
                                    <h3 class="name">Michael Chen</h3>
                                    <p class="location">Volunteer & Donor</p>
                                </div>

                                <div class="rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <p class="pera">
                                    <i>"As both a volunteer and donor, I've seen firsthand how every contribution makes
                                        a difference. The dedication of the team and the direct impact on communities is
                                        truly inspiring. This organization genuinely cares about making positive
                                        change."</i>
                                </p>
                                <div class="position-absolute quote">
                                    <div class="rounded-btn">
                                        <i class="ri-double-quotes-r"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial position-relative">
                            <div class="client-info">
                                <div class="client-details">
                                    <h3 class="name">Emily Rodriguez</h3>
                                    <p class="location">Project Supporter</p>
                                </div>

                                <div class="rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <p class="pera">
                                    <i>"What sets this charity apart is their commitment to sustainable change. They
                                        don't
                                        just provide temporary solutions - they work with communities to create lasting
                                        impact.
                                        The regular progress reports and photos make me feel connected to the
                                        cause."</i>
                                </p>
                                <div class="position-absolute quote">
                                    <div class="rounded-btn">
                                        <i class="ri-double-quotes-r"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End-of Testimonial -->
    @endif
    @if ($data && $data->show_faq_section)
        <!-- Any Question Area S t a r t -->
        <section class="question-area bottom-padding">
            <div class="container">
                <livewire:faq-question-component />
            </div>
        </section>
        <!-- End-of Question Area -->
    @endif
    <!-- Gallery S t a r t -->
    @if ($data && $data->show_gallery_section)
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
    @endif
    <!-- End-of Gallery -->
</main>
