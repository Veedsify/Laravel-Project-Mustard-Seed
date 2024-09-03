@section('title', 'Campaigns')
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('assets/images/gallery/breadcrumb-1.png') }}); background-size: cover;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="index.blade.php" class="single">Home</a></li>
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
                @foreach ($items as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <div class="card">
                                <div class="px-2 pt-2 position-relative">
                                    <img alt="..." src="{{ asset('storage/' . $item->image) }}"
                                        style="aspect-ratio: 1/1;object-fit:cover;" class="rounded w-100">
                                </div>
                                <div class="card-body">
                                    <div class="social mb-1">
                                        <span class="new-badge">
                                            {{ $item->condition === 1 ? 'New' : 'Used' }}
                                        </span>
                                    </div>
                                    <h4 class="text-base text-muted fw-bold mb-3">
                                        {{ $item->name }}
                                    </h4>
                            <div class="mb-3 lh-lg pb-3 item-description truncate">
                                        {!! $item->description !!}
                                    </div>
                                    <div class="d-flex gap-1">
                                        <button class="btn-primary-fill w-100 py-2 rounded border">
                                            View
                                        </button>
                                        <button class="btn donate-btn w-100 py-2 rounded border">
                                            Apply
                                        </button>
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
                        {{-- {{ ('vendor.livewire.bootstrap') }} --}}
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
