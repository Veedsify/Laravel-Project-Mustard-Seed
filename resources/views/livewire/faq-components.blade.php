@section('meta')
    <meta name="description" content="Find answers to frequently asked questions about Mustard Seed Charity. Learn more about our community development work, donation process, volunteering opportunities, and humanitarian initiatives.">
    <meta name="keywords" content="FAQ, frequently asked questions, mustard seed charity FAQ, charity questions, donation FAQ, volunteer FAQ, charity foundation help">
    <meta name="author" content="Mustard Seed">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mustard Seed Charity - Frequently Asked Questions">
    <meta property="og:site_name" content="Mustard Seed Charity">
    <meta property="og:url" content="www.mustardseedcharity.com/faq">
    <meta property="og:image" content="{{ asset('storage/' . optional($homePage)->logo) }}">
    <meta property="og:description" content="Find answers to common questions about Mustard Seed Charity's work, donations, and volunteering opportunities.">
    <meta name="twitter:title" content="Mustard Seed Charity FAQ">
    <meta name="twitter:description" content="Get answers to frequently asked questions about Mustard Seed Charity's initiatives and how you can get involved.">
    <meta name="twitter:image" content="www.mustardseedcharity.com">
    <meta name="twitter:card" content="summary">

    <!-- Open Graph / Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="article:modified_time" content="{{ now() }}">

    <!-- Twitter -->
    <meta name="twitter:domain" content="mustardseedcharity.com/faq">

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
            "@type": "FAQPage",
            "name": "Mustard Seed Charity FAQ",
            "url": "https://mustardseedcharity.com/faq",
            "logo": "{{ asset('storage/' . optional($homePage)->logo) }}",
            "sameAs": [
            
            ],
            "mainEntity": "Frequently Asked Questions"
        }
    </script>
@endsection
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
             style="background-image: url({{  asset('storage/' . optional($headerImages)->faq_page_header_image) }}); background-size: cover; background-position: center;""
    >
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)" class="single">faq</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">asked questions</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- Any Question Area S t a r t -->
    <section class="question-area section-padding">
        <div class="container">
            <livewire:faq-question-component />
        </div>
    </section>
    <!-- End-of Question Area -->

    <!-- FAQs S t r t -->
    <div class="faqs-area bottom-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End-of FAQs-->
</main>
