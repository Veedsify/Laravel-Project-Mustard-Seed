@section('title', 'Donated Items')
@section('meta')
    <meta name="description" content="{{ optional($homePage)->logo }}"
        content="Mustard Seed Charity is deeply committed to community development and humanitarian work, with a variety of initiatives focused on poverty alleviation and human empowerment via job provision and education. The Charity organization operates and reach out to various community through her committed Volunteers all over the globe.">
        <meta name="keywords" content="{{ optional($homePage)->logo }}"
        content="mustard seed, causes, donate, charity foundation, charity hub, mustard seed charity,  theme, donations, non profit, fundraiser,social, ngo, non-profit, nonprofit, organization, volunteer">
    <meta name="author" content="Mustard Seed">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mustard Seed Charity - About Us">
    <meta property="og:site_name" content="Mustard Seed Charity Donations">
    <meta property="og:site_name" content="Mustard Seed Charity">
    <meta property="og:url" content="www.mustardseedcharity.com/donations">
    <meta property="og:image" content="{{ asset('storage/' . optional($homePage)->logo) }}">
    <meta property="og:description" content="{{ optional($homePage)->footer_text }}">
    <meta name="twitter:title" content="Mustard Seed Charity">
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
    <link rel="canonical" href="{{ url()->current()}}">

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
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('storage/' . optional($headerImages)->donations_page_header_image) }}); background-size: cover; background-position: center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Donated Items</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Donated Items</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- donate S t a r t -->
    <section class="donate-section top-bottom-padding">
        <div class="container">
            <div class="row gy-24">
                <div class="col-12">
                    <div class="filter-box p-4 bg-white rounded shadow-sm mb-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="mb-2">Location</label>
                                    <select wire:model.live="location" class="form-select">
                                        <option value="">Select Location</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="mb-2">Category</label>
                                    <select wire:model.live="item_type" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="mb-2">Search Items</label>
                                    <input type="text" wire:model.live="searchQuery" class="form-control" placeholder="Search items...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-24">
                @if (count($items) === 0)
                    <div class="col-lg-12">
                        <h4 class="font-medium">
                            No Available Items
                        </h4>
                    </div>
                @endif
                <div wire:loading wire:target="render" class="mb-3">
                    <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading" width="60"
                        style="user-select: none;">
                </div>
                @foreach ($items as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                        <a href="{{ route('item.preview', $item->slug) }}"
                            class="d-block position-relative overflow-hidden" wire:navigate>
                            <div class="card">
                                <div class="px-2 pt-2 position-relative">
                                    <img alt="..." src="{{ asset('storage/' . $item->image) }}"
                                        style="aspect-ratio: 4/3;object-fit:cover;" class="rounded w-100">
                                </div>
                                <div class="card-body">
                                    <div class="social mb-3 d-flex align-items-center gap-3">
                                        <span class="new-badge">
                                            {{ $item->condition === 1 ? 'New' : 'Used' }}
                                        </span>
                                        <small class="text-muted">
                                            <i class="ri-map-pin-line"></i>
                                            {{ optional($item->volunteer->volunteer_settings)->city }}
                                        </small>
                                    </div>
                                    <div class="flex mb-15 gap-16 align-items-center">
                                        <div class="user flex gap-10 align-items-center">
                                            <i class="ri-user-line"></i>
                                            <p class="info">By:
                                                @if ($item->user)
                                                    {{ explode(' ', $item->user->name)[0] ?? $item->user->name }}
                                                @else
                                                    Admin
                                                @endif
                                            </p>
                                        </div>
                                        <div class="donate flex gap-10 align-items-center">
                                            <i class="ri-chat-3-line"></i>
                                            {{ $item->appliedItems->count() }} Applied
                                        </div>
                                    </div>
                                    <h4 class="text-base text-muted fw-bold mb-3">
                                        {{ $item->name }}
                                    </h4>
                                    <div class="mb-3 lh-lg pb-3 item-description truncate">
                                        {!! $item->description !!}
                                    </div>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('item.preview', $item->slug) }}#apply"
                                            class="btn-primary-fill w-100 py-2 rounded border" wire:navigate>
                                            Apply
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- pagination -->
                    <nav class="pagination-nav">
                        {{ $items->links('vendor.livewire.bootstrap') }}
                    </nav>
                    <!-- End pagination -->
                </div>
            </div>
        </div>
    </section>
    <!-- End-of donate -->

    <!-- Gallery S t a r t -->
    @livewire('gallery-component')
    <!-- End-of Gallery -->
</main>
