<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{  asset('storage/' . optional($headerImages)->volunteers_page_header_image) }}); background-size: cover; background-position: center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Volunteer</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Volunteer</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- volunteer details area S t a r t-->
    <section class="team-section top-bottom-padding">
        <div class="container">
            <div class="row gy-24">
                @if(isset($volunteers) && $volunteers->count() == 0)
                    <div class="col-lg-12">
                        <h2 class="" role="alert">
                            No Volunteers available
                        </h2>
                    </div>
                @endif
                @foreach ($volunteers as $volunteer)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 view-wrapper">
                        <div class="single-team h-calc">
                            <div class="team-img">
                                <a href="{{ route('volunteers.details', [$volunteer->username]) }}">
                                    <img src="{{ asset('storage/' . $volunteer->volunteer_settings->image) }}" class="img-fluid w-100"
                                        alt="img">
                                </a>
                            </div>
                            <div class="team-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="team-info-title mb-8">
                                        <div class="d-flex gap-40 align-items-center">
                                            <div class="content">
                                                <h4 class="title text-capitalize"><a
                                                        href="{{ route('volunteers.details', [$volunteer->username]) }}">
                                                        {{ $volunteer->name }}
                                                    </a>
                                                </h4>
                                                <p class="pera">

                                                </p>
                                            </div>
                                            <div class="social">
                                                <a class="hover-icon" href="javascript:void(0)"><i
                                                        class="ri-share-fill"></i></a>
                                                <div class="all-social-icon">
                                                    <a class="social-icon" href="javascript:void(0)"><i
                                                            class="ri-google-fill"></i></a>
                                                    <a class="social-icon" href="javascript:void(0)"><i
                                                            class="ri-facebook-fill"></i></a>
                                                    <a class="social-icon" href="javascript:void(0)"><i
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
            <!-- pagination -->
            <nav class="pagination-nav">
                <ul class="pagination">
                    {{ $volunteers->links('vendor.livewire.bootstrap') }}
                </ul>
            </nav>
            <!-- End pagination -->
        </div>
    </section>
    <!-- End-of volunteer details-->

    <!-- Gallery S t a r t -->
    @livewire('gallery-component')
    <!-- End-of Gallery -->
</main>
