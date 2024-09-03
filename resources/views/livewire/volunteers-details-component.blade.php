<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('assets/images/gallery/breadcrumb-1.png') }}); background-size: cover;">
        >
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="index.blade.php" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Volunteer</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Volunteer Details</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- volunteer details area S t a r t-->
    <section class="volunteer-details top-bottom-padding2">
        <div class="container">
            <div class="row gy-24">
                <div class="col-xl-4 col-md-5 col-lg-5">
                    <div class="volunteer-img">
                        <img src="{{ asset('storage/' . $volunteer->avatar) }}" alt="image">
                    </div>
                </div>
                <div class="col-xl-8 col-md-7 col-lg-7">
                    <div class="volunteer-info-card">
                        <div class="volunteer-info">
                            <div class="naming-section">
                                <h3 class="title">
                                    {{ $volunteer->name }}
                                </h3>
                                <span class="subtitle mr-20">{{ $volunteer->volunteer_settings->profession }} </span>
                                <span class="subtitle">(
                                    {{ $volunteer->volunteer_settings->age }} years Age
                                    )</span>
                            </div>
                            <div class="social-icon">
                                <i class="ri-share-fill"></i>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div style="all:unset;" class="content">
                            {!! $volunteer->volunteer_settings->bio !!} 
                        </div>
                        <h4 class="title">Contact Me</h4>
                        <div class="contact-list">
                            <div class="contact-icon-list">
                                <div class="single-icon">
                                    <i class="ri-phone-fill"></i>
                                </div>
                                <a class="title" href="javascript:void(0)">
                                    {{ $volunteer->volunteer_settings->phone }}
                                </a>
                            </div>
                            <div class="contact-icon-list">
                                <div class="single-icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                                <a class="title" href="javascript:void(0)">
                                    {{ $volunteer->volunteer_settings->email }}
                                </a>
                            </div>
                            <div class="contact-icon-list">
                                <div class="single-icon">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                                <a class="title" href="javascript:void(0)">
                                    {{ $volunteer->volunteer_settings->address }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="education-section">
                        <h4 class="title">Education & Training</h4>
                        <div class="education-box">
                            <p class="pera">However, if you intended to refer to body or organ donation, that is a
                                separate topic. Organ donation involves the voluntary donation of organs or tissues from
                                a living or deceased person to help save or improve the lives of others in need of</p>
                            <p class="pera">transplantation. including poverty, education, healthcare, disaster
                                relief, environmental conservation, and more. People can contribute to charities..</p>
                            <ul class="key-points">
                                <li class="point">Organ donation involves the voluntary donation of organs..</li>
                                <li class="point">Organ donation involves the voluntary donation of organs..</li>
                            </ul>
                        </div>
                    </div>
                    <div class="skill-section">
                        <h4 class="title">Skill</h4>
                        <div class="skill-box">
                            <p class="pera">including poverty, education, healthcare, disaster relief, environmental
                                conservation, and more. People can contribute to charities by making financial
                                donations,</p>
                            <div class="row gy-24">
                                <div class="col-xl-6">
                                    <div class="progress-content">
                                        <h4 class="title">Medical Project</h4>
                                        <p class="pera">70%</p>
                                    </div>
                                    <div class="progress custom-progress-two">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="progress-content">
                                        <h4 class="title">Food</h4>
                                        <p class="pera">45%</p>
                                    </div>
                                    <div class="progress custom-progress-two">
                                        <div class="progress-bar" style="width: 45%"></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="progress-content">
                                        <h4 class="title">Medicine & health</h4>
                                        <p class="pera">75%</p>
                                    </div>
                                    <div class="progress custom-progress-two">
                                        <div class="progress-bar" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="progress-content">
                                        <h4 class="title">Education</h4>
                                        <p class="pera">80%</p>
                                    </div>
                                    <div class="progress custom-progress-two">
                                        <div class="progress-bar" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of volunteer details-->

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
