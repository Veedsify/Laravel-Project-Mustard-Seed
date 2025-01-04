@section('title', $title)
@section('meta')
    <meta name="description" 
        content="Explore job opportunities at Mustard Seed Charity. Join our team and make a difference in community development and humanitarian work through various roles in poverty alleviation, education, and community outreach.">
    <meta name="keywords" 
        content="mustard seed jobs, charity jobs, ngo jobs, nonprofit careers, humanitarian work, community development jobs, volunteer opportunities, charity careers, social impact jobs">
    <meta name="author" content="Mustard Seed">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Job Opportunities - Mustard Seed Charity">
    <meta property="og:site_name" content="Mustard Seed Charity">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('storage/' . optional($homePage)->logo) }}">
    <meta property="og:description" content="Find meaningful career opportunities at Mustard Seed Charity">
    <meta name="twitter:title" content="Job Opportunities - Mustard Seed Charity">
    <meta name="twitter:description" content="Find meaningful career opportunities at Mustard Seed Charity">
    <meta name="twitter:description" content="{{ optional($homePage)->footer_text }}">
    <meta name="twitter:image" content="www.mustardseedcharity.com">
    <meta name="twitter:card" content="summary">

    <!-- Open Graph / Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="article:modified_time" content="{{ now() }}">

    <!-- Twitter -->
    <meta name="twitter:domain" content="mustardseedcharity.com/donations">

    <!-- Additional SEO -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="2 days">
    <meta name="language" content="English">
    <link rel="canonical" href="{{ url()->current() . '/donations' }}">

    <!-- Rich Snippets -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NonProfit",
            "name": "Mustard Seed Charity",
            "url": "https://mustardseedcharity.com/donations",
            "logo": "{{ asset('storage/' . optional($homePage)->logo) }}",
            "sameAs": [
            
            ],
        }
</script>
@endsection
<main>
    <section class="breadcrumb-section breadcrumb-bg"   style="background-image: url({{ asset('storage/' . optional($headerImages)->jobs_page_header_image) }}); background-size: cover; background-position: center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s"
                    style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Jobs</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Jobs list</h1>
            </div>
        </div>
    </section>
    <section class="donate-section top-bottom-padding">
        <div class="container">
            <div class="row gy-24">
                @if(isset($jobs) && $jobs->count() == 0)
                    <div class="col-lg-12">
                        <h2 class="" role="alert">
                            No job found
                        </h2>
                    </div>
                @endif
                @foreach ($jobs as $job)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                        <div class="single-donate h-calc">
                            <div class="donate-img position-relative">
                                <a href="{{ route('job.details', [$job->slug]) }}"> <img class="w-100"
                                        src="{{ asset('storage/' . $job->image2) }}" style="aspect-ratio: 4/3; object-position: top; object-fit:cover;" alt="img"> </a>
                                <div class="donate-badge">
                                    <p class="subtitle">
                                        {{ $job->type }}
                                    </p>
                                </div>
                            </div>
                            <div class="donate-info">
                                <div class="" style="width:100%;">
                                    <div class="donate-info-titled" style="flex: 1 1 100%;">
                                        <h4 class="title text-capitalize mb-3"><a href="{{ route('job.details', [$job->slug]) }}">
                                            {{ $job->name }}
                                            </a></h4>
                                        <p class="subtitle w-100 d-block">
                                            {!! Str::limit($job->description, 150) !!}
                                        </p>
                                        <div class="flex justify-content-between w-100 mt-14 mb-20">
                                            <div class="flex gap-20">
                                                <div class="charges">
                                                    <p class="pera">₦{{
                                                        number_format($job->salary) }}</p>
                                                    <h4 class="title">Salary</h4>
                                                </div>
                                                <div class="charges">
                                                    <p class="pera">{{$job->jobApplication->count()}}</p>
                                                    <h4 class="title">Applicants</h4>
                                                </div>
                                            </div>
                                            <div class="forward-btn">
                                                <i class="ri-reply-fill"></i>
                                            </div>
                                        </div>
                                        <a href="{{ route('job.details', [$job->slug]) }}" class="btn donate-btn w-100">Apply Now</a>
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
                        {{ $jobs->links('vendor.livewire.bootstrap') }}
                    </nav>
                    <!-- End pagination -->
                </div>
            </div>
        </div>
    </section>
</main>
