@section('title', 'Contact Page')
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('storage/' . optional($headerImages)->contact_page_header_image) }}); background-size: cover; background-position: center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">contact</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">contact us</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- Contact area S t a r t-->
    <div class="volunteer-details top-bottom-padding2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-section">
                        <div class="contact-list">
                            {{-- <div class="contact-icon-list">
                                <div class="single-icon">
                                    <i class="ri-phone-fill"></i>
                                </div>
                                <div class="divider-ver"></div>
                                <div class="contact-content">
                                    <p class="subtitle">Phone</p>
                                    <a class="title" href="javascript:void(0)">
                                        {{ optional($contactData)->phone }}
                                    </a>
                                </div>
                            </div> --}}
                            <div class="contact-icon-list">
                                <div class="single-icon">
                                    <i class="ri-mail-fill"></i>
                                </div>
                                <div class="divider-ver"></div>
                                <div class="contact-content">
                                    <p class="subtitle">Email</p>
                                    <a class="title" href="javascript:void(0)">
                                        {{ optional($contactData)->email }}
                                    </a>
                                </div>
                            </div>
                            <div class="contact-icon-list">
                                <div class="single-icon">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                                <div class="divider-ver"></div>
                                <div class="contact-content">
                                    <p class="subtitle">Location</p>
                                    <a class="title" href="javascript:void(0)">
                                        {{ optional($contactData)->location }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-padding4">
                <div class="row gy-24">
                    <livewire:comps.contact-component-form />
                    <div class="col-xl-6">
                        {!! optional($contactData)->map_embed !!}
                        {{-- <iframe class="map-frame"
                            src="https://www.google.com/maps/embed/v1/place?q=Dhaka,+Bangladesh&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                            width="600" height="450" style="border: 15px" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-of contact-->

    <!-- Gallery S t a r t -->
    @livewire('gallery-component')
    <!-- End-of Gallery -->
</main>
