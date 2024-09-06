@section('title', 'Donated Items')
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

                @if ($items->isEmpty())
                    <div class="col-lg-12">
                        <h4 class="font-medium">
                            No Available Items
                        </h4>
                    </div>
                @endif
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
                                    <div class="social mb-3">
                                        <span class="new-badge">
                                            {{ $item->condition === 1 ? 'New' : 'Used' }}
                                        </span>
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
