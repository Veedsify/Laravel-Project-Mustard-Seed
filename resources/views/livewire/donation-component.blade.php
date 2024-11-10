@section("title", "Campaigns")
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
             style="background-image: url({{asset('storage/' . optional($headerImages)->campaigns_page_header_image)}}); background-size:cover; background-position:center;"
    >
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                                                                       class="single">Campaigns</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Campaign list</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- donate S t a r t -->
    <section class="donate-section top-bottom-padding">
        <div class="container">
            <div class="row gy-24">
                @if ($campaigns->isEmpty())
                    <div class="col-lg-12">
                        <h4 class="font-medium">
                            No Available Campaigns
                        </h4>
                    </div>
                @endif
                @foreach($campaigns as $campaign)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                        <div class="single-donate h-calc wow fadeInUp" data-wow-delay="0.0s">
                            @php
                                $percentage = ($campaign->raised / $campaign->goal) * 100;
                            @endphp
                            <div class="donate-img position-relative"
                                 data-percent="{{$percentage . '%'}}"
                            >
                                <a href="{{route('donate.details', $campaign->slug)}}" wire:navigate>
                                    <img class="w-100"
                                         style="aspect-ratio: 1/1; object-fit: cover"
                                         src="{{asset('storage/'. $campaign->image)}}"
                                         alt="img"> </a>
                                <div class="donate-badge">
                                    <p class="subtitle">
                                        {{$campaign->campaign_category->name}}
                                    </p>
                                </div>
                            </div>
                            <div class="donate-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="donate-info-title w-100">
                                        <h4 class="title text-capitalize">
                                            <a href="{{route('donate.details', $campaign->slug)}}">
                                                {{$campaign->name}}
                                            </a>
                                        </h4>
                                        <div class="subtitle">
                                            {!! Str::limit($campaign->description, 50) !!}
                                        </div>
                                        <div class="progress custom-progress-two">
                                            <div class="progress-bar" style="width: {{$percentage}}%"></div>
                                        </div>
                                        <div class="flex justify-content-between mt-14 mb-20">
                                            <div class="flex gap-20">
                                                <div class="charges">
                                                    <p class="pera">
                                                        {{ $campaign->payment_method === 'cash' ? $campaign->payment_currency: "" }}
                                                        {{number_format($campaign->goal)}}
                                                    </p>
                                                    <h4 class="title">Goals</h4>
                                                </div>
                                                <div class="charges">
                                                    <p class="pera">
                                                        {{ $campaign->payment_method === 'cash' ? "$": "" }}
                                                        {{number_format($campaign->raised)}}
                                                    </p>
                                                    <h4 class="title">Raised</h4>
                                                </div>
                                            </div>
                                            <div class="forward-btn">
                                                <i class="ri-reply-fill"></i>
                                            </div>
                                        </div>
                                        <a href="{{route('donate.details', $campaign->slug)}}" class="btn donate-btn w-100" wire:navigate>Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- pagination -->
                    <nav class="pagination-nav">
                        {{$campaigns->links('vendor.livewire.bootstrap')}}
                    </nav>
                    <!-- End pagination -->
                </div>
            </div>
        </div>
    </section>
    <!-- End-of donate -->

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
