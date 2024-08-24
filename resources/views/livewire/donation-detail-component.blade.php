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
                        <li class="breadcrumb-item single-list"><a href="index.blade.php" class="single">Home</a></li>
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
                            @livewire('comps.donation-detail-price', ['donation' => $donation])
                        </div>
                    </div>
                    <!-- Donate contents -->
                    <div class="donate-content">
                        <p class="pera">Charity refers to the act of giving resources, such as money, time, or goods
                            to
                            individuals, organizations, or causes in need. It is driven by the desire to alleviate
                            suffering, support vulnerable populations, promote social welfare, or advance specific
                            charitable objectives. Charity organizations and nonprofits play a crucial role in
                            collecting and distributing funds to address various issues</p>
                        <p class="pera">including poverty, education, healthcare, disaster relief, environmental
                            conservation, and more. People can contribute to charities by making financial donations,
                            volunteering their time and skills, or donating goods like clothing, food, or medical
                            supplies.</p>
                        <h4 class="title">Our Challenge & Goal</h4>
                        <p class="pera">However, if you intended to refer to body or organ donation, that is a
                            separate
                            topic. Organ donation involves the voluntary donation of organs or tissues from a living or
                            deceased person to help save or improve the lives of others in need of transplantation.</p>
                        <p class="pera">including poverty, education, healthcare, disaster relief, environmental
                            conservation, and more. People can contribute to charities by making financial donations,
                            volunteering their time and skills,</p>
                        <p class="pera">It is a generous act that can make a significant difference in someone's life
                            by
                            providing them with a chance for a healthier future.</p>
                        <h4 class="title">Donors</h4>
                        <p class="pera">However, if you intended to refer to body or organ donation, that is a
                            separate
                            topic. Organ donation involves the voluntary donation of organs or tissues from a living or
                            deceased person to help save or improve the lives of others in need of transplantation.</p>
                    </div>
                    <!-- Donors -->
                    <div class="row gy-24">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                            <div class="donor-card">
                                <div class="donor-img">
                                    <img src="{{ asset('assets/images/gallery/donor-1.png') }}" alt="image">
                                </div>
                                <div class="donor-content">
                                    <h4 class="title">David Warner</h4>
                                    <p class="amount">$500</p>
                                    <p class="pera">July 09,2023</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                            <div class="donor-card">
                                <div class="donor-img">
                                    <img src="assets/images/gallery/donor-2.png" alt="image">
                                </div>
                                <div class="donor-content">
                                    <h4 class="title">Carry Jon</h4>
                                    <p class="amount">$500</p>
                                    <p class="pera">July 09,2023</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                            <div class="donor-card">
                                <div class="donor-img">
                                    <img src="assets/images/gallery/donor-3.png" alt="image">
                                </div>
                                <div class="donor-content">
                                    <h4 class="title">Maxwell</h4>
                                    <p class="amount">$500</p>
                                    <p class="pera">July 09,2023</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-12">
                            <div class="donor-card">
                                <div class="donor-img">
                                    <img src="assets/images/gallery/donor-4.png" alt="image">
                                </div>
                                <div class="donor-content">
                                    <h4 class="title">Cary Minuti</h4>
                                    <p class="amount">$500</p>
                                    <p class="pera">July 09,2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <a href="#"><img src="assets/images/gallery/post-1.png"
                                                alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="#">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="#"><img src="assets/images/gallery/post-2.png"
                                                alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="#">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="#"><img src="assets/images/gallery/post-3.png"
                                                alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="#">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="single-post">
                                    <div class="post-img">
                                        <a href="#"><img src="assets/images/gallery/post-4.png"
                                                alt="img"></a>
                                    </div>
                                    <div class="post-info">
                                        <div class="date-time">
                                            <i class="ri-time-line"></i>
                                            <p class="pera">November 28, 2023</p>
                                        </div>
                                        <h4 class="title"><a href="#">How Kids Make Sense of Life
                                                Experiences.</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

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
