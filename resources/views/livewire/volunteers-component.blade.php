@section('meta')
    <meta name="description"
        content="Join Mustard Seed Charity's dedicated team of volunteers making a difference globally. Our volunteers are the backbone of our community development and humanitarian initiatives, working tirelessly to empower communities through education and job provision.">
    <meta name="keywords"
        content="volunteers, charity volunteers, humanitarian work, community service, mustard seed charity, volunteer opportunities, nonprofit volunteers, charity work, social impact, community development">
    <meta name="author" content="Mustard Seed">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mustard Seed Charity - Volunteers">
    <meta property="og:site_name" content="Mustard Seed Charity">
    <meta property="og:url" content="www.mustardseedcharity.com/volunteers">
    <meta property="og:image" content="{{ asset('storage/' . optional($homePage)->logo) }}">
    <meta property="og:description" content="Meet our dedicated volunteers making positive change in communities worldwide">
    <meta name="twitter:title" content="Mustard Seed Charity Volunteers">
    <meta name="twitter:description" content="Join our global network of volunteers making real impact">
    <meta name="twitter:image" content="www.mustardseedcharity.com">
    <meta name="twitter:card" content="summary">

    <!-- Open Graph / Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="article:modified_time" content="{{ now() }}">

    <!-- Twitter -->
    <meta name="twitter:domain" content="mustardseedcharity.com/volunteers">

    <!-- Additional SEO -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="2 days">
    <meta name="language" content="English">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Rich Snippets -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NonProfit",
            "name": "Mustard Seed Charity",
            "url": "https://mustardseedcharity.com/volunteers",
            "logo": "{{ asset('storage/' . optional($homePage)->logo) }}",
            "sameAs": [
            
            ]
        }
    </script>
@endsection
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('storage/' . optional($headerImages)->volunteers_page_header_image) }}); background-size: cover; background-position: center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{ route('home') }}" class="single">Home</a>
                        </li>
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
                @if (isset($volunteers) && $volunteers->count() == 0)
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
                                    <img src="{{ asset('storage/' . $volunteer->volunteer_settings->image) }}"
                                        class="img-fluid w-100" alt="img">
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
                                            @php
                                                function calculateAverageRating($ratings)
                                                {
                                                    $totalRatings = count($ratings);
                                                    if ($totalRatings === 0) {
                                                        return 0;
                                                    }
                                                    $sumOfRatings = array_sum($ratings);
                                                    return round($sumOfRatings / $totalRatings, 2);
                                                }
                                                $averageRating = calculateAverageRating($volunteer->ratings->pluck('rating')->toArray());
                                                // Ensure rating is between 0 and 5
                                                $rating = min(5, max(0, $averageRating ?? 0));
                                                // Calculate the angle in degrees for the rating (reversed for proper direction)
                                                $degrees = 180 - ($rating / 5) * 180;
                                                // Calculate the x and y coordinates for the stroke end point
                                                $x = 50 + 40 * cos(deg2rad($degrees));
                                                $y = 50 - 40 * sin(deg2rad($degrees));
                                            @endphp
                                            <div class="rating-stars d-flex items-center gap-2">
                                                <div class="stars d-flex justify-content-center gap-1">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $averageRating)
                                                            <svg class="text-warning" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                            </svg>
                                                        @elseif ($i - $averageRating < 1)
                                                            <svg class="text-warning" width="20" height="20" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27V2z"/>
                                                                <path fill="#e5e7eb" d="M12 2V17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2z"/>
                                                            </svg>
                                                        @else
                                                            <svg class="text-warning" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                            </svg>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <div class="rating-value text-center">
                                                    <span class="text-primary">{{ number_format($averageRating, 1) }}</span>
                                                    <span class="text-muted small">/5.0</span>
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
