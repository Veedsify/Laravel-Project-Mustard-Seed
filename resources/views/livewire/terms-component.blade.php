@section('meta')
    <meta name="description" content="{{ $terms->title }}"
        content="Read our Terms and Conditions to understand the rules and guidelines governing the use of Mustard Seed Charity services and website. Our terms outline the legal agreement between users and our organization.">
    <meta name="keywords" content="terms and conditions, legal terms, mustard seed charity terms, privacy policy, user agreement">
    <meta name="author" content="Mustard Seed">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mustard Seed Charity - Terms and Conditions">
    <meta property="og:site_name" content="Mustard Seed Charity">
    <meta property="og:url" content="www.mustardseedcharity.com/terms">
    <meta property="og:image" content="{{ asset('storage/' . optional($homePage)->logo) }}">
    <meta property="og:description" content="{{ $terms->title }}">
    <meta name="twitter:title" content="Terms and Conditions - Mustard Seed Charity">
    <meta name="twitter:description" content="{{ $terms->title }}">
    <meta name="twitter:image" content="www.mustardseedcharity.com">
    <meta name="twitter:card" content="summary">

    <!-- Open Graph / Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="article:modified_time" content="{{ now() }}">

    <!-- Twitter -->
    <meta name="twitter:domain" content="mustardseedcharity.com/terms">

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
            "@type": "WebPage",
            "name": "Terms and Conditions - Mustard Seed Charity",
            "url": "https://mustardseedcharity.com/terms",
            "logo": "{{ asset('storage/' . optional($homePage)->logo) }}",
            "description": "{{ $terms->title }}"
        }
    </script>
@endsection
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('storage/' . optional($headerImages)->terms_page_header_image) }}); background-size: cover; background-position: center;"">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">terms</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">
                    {{ $terms->title }}
                </h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- Terms Condition Area S t a r t-->
    <div class="terms-condition area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    {!! $terms->content !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End-of Terms Condition -->

</main>
