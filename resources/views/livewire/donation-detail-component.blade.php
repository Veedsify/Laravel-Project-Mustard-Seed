@section('title', 'Donate -' . $donation->name)
@php
    $percentage = ($donation->raised / $donation->goal) * 100;
@endphp
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('storage/' . $donation->image) }}); background-position: center; background-size: cover;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Donation </a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Donation details</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- Donation S t a r t -->
    <section class="donation-section top-bottom-padding2">
        <div class="container">
            <div class="row gy-24">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <!-- Donate -->
                    <div class="donate-details">
                        <div class="donate-img position-relative" data-percent="{{ $percentage . '%' }}">
                            <a href="javascript:void(0)">
                                <img class="w-100" src="{{ asset('storage/' . $donation->image) }}"
                                    style="aspect-ratio:16/9; object-fit: cover;" alt="img">
                            </a>
                            <div class="donate-img-overlay"></div>
                        </div>
                        <div class="donate-info">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="donate-info-title">
                                    <h4 class="title text-capitalize">
                                        {{ $donation->name }}
                                    </h4>
                                    <div class="subtitle">
                                        {!! $donation->description !!}
                                    </div>
                                    <div class="alert">
                                        <div class="icon">
                                            <i class="ri-error-warning-fill"></i>
                                        </div>
                                        <div class="alert-msg">
                                            <h4 class="title">Notice:</h4>
                                            <p class="pera">Text mode is enabled. while in test mode no live donations
                                                are processed</p>
                                        </div>
                                    </div>
                                    <div class="progress custom-progress-two">
                                        <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <div class="flex justify-content-between mt-14 mb-20">
                                        <div class="flex gap-20">
                                            <div class="charges">
                                                <p class="pera">
                                                    {{ $donation->payment_method === 'cash' ? $donation->payment_currency : '' }}
                                                    {{ number_format($donation->goal) }}
                                                </p>
                                                <h4 class="title">Goals</h4>
                                            </div>
                                            <div class="charges">
                                                <p class="pera">
                                                    {{ $donation->payment_method === 'cash' ? $donation->payment_currency : '' }}
                                                    {{ number_format($donation->raised) }}
                                                </p>
                                                <h4 class="title">Raised</h4>
                                            </div>
                                        </div>
                                        <div class="forward-btn">
                                            <i class="ri-reply-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @livewire('comps.donation-detail-price', ['campaigns' => $donation])
                        </div>
                    </div>
                    <!-- Donors -->

{{--                    <div class="row py-5 gy-24">--}}
{{--                        <div class="col-12">--}}
{{--                            <h3 class="title">Donors</h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">--}}
{{--                            <div class="donor-card">--}}
{{--                                <div class="donor-img">--}}
{{--                                    <img src="{{ asset('assets/images/gallery/donor-1.png') }}" alt="image">--}}
{{--                                </div>--}}
{{--                                <div class="donor-content">--}}
{{--                                    <h4 class="title">David Warner</h4>--}}
{{--                                    <p class="amount">$500</p>--}}
{{--                                    <p class="pera">July 09,2023</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">--}}
{{--                            <div class="donor-card">--}}
{{--                                <div class="donor-img">--}}
{{--                                    <img src="assets/images/gallery/donor-2.png')}}" alt="image">--}}
{{--                                </div>--}}
{{--                                <div class="donor-content">--}}
{{--                                    <h4 class="title">Carry Jon</h4>--}}
{{--                                    <p class="amount">$500</p>--}}
{{--                                    <p class="pera">July 09,2023</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">--}}
{{--                            <div class="donor-card">--}}
{{--                                <div class="donor-img">--}}
{{--                                    <img src="assets/images/gallery/donor-3.png')}}" alt="image">--}}
{{--                                </div>--}}
{{--                                <div class="donor-content">--}}
{{--                                    <h4 class="title">Maxwell</h4>--}}
{{--                                    <p class="amount">$500</p>--}}
{{--                                    <p class="pera">July 09,2023</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">--}}
{{--                            <div class="donor-card">--}}
{{--                                <div class="donor-img">--}}
{{--                                    <img src="assets/images/gallery/donor-4.png')}}" alt="image">--}}
{{--                                </div>--}}
{{--                                <div class="donor-content">--}}
{{--                                    <h4 class="title">Cary Minuti</h4>--}}
{{--                                    <p class="amount">$500</p>--}}
{{--                                    <p class="pera">July 09,2023</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="right-element">
                        <!-- Category -->
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
                                            class="single-list {{ $category->id === $donation->campaign_category_id ? 'active' : '' }}">
                                            <a class="single" href="javascript:void(0)">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Post -->

                        <!-- Concat -->
                        <div class="contact-us-section">
                            <form action="donation-details.html" class="custom-form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control custom-input"
                                                id="exampleFormControlInput7" placeholder="Enter Your Name*">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control custom-input"
                                                id="exampleFormControlInput8" placeholder="Enter your email*">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control custom-input"
                                            id="exampleFormControlInput9" placeholder="Message*">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </form>
                        </div>
                        <!-- Tags -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of Donation -->

    <!-- Gallery S t a r t -->
    <div class="gallery-area">
        <div class="gallery-slider d-flex">
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-1.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-2.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-3.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-4.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-2.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-3.png')}}" alt="img">
            </div>
            <div class="gallery-img">
                <img src="{{ asset('assets/images/gallery/gallery-1.png')}}" alt="img">
            </div>
        </div>
    </div>
    <!-- End-of Gallery -->
</main>
