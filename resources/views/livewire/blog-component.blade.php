    @section('title', 'Blogs')
    <main>
        <!-- Breadcrumb Area S t a r t -->
        <section class="breadcrumb-section breadcrumb-bg"
            style="background-image: url({{ asset('storage/' . $headerImages->blogs_page_header_image) }}); background-size:cover; background-position:center;">
            <div class="container">
                <div class="breadcrumb-text">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s">
                        <ul class="breadcrumb listing">
                            <li class="breadcrumb-item single-list"><a href="index.blade.php" class="single">Home</a></li>
                            <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                    class="single">Blog </a></li>
                        </ul>
                    </nav>
                    <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Latest blog</h1>
                </div>
            </div>
        </section>
        <!-- End-of Breadcrumb Area -->

        <!-- Blog S t a r t -->
        <section class="blog-section-three top-bottom-padding">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <h2 class="title">
                                @if ($blogs->count() > 0)
                                    {{ $blogs->count() }} Posts
                                @else
                                   !No New Post
                                @endif
                                {{-- <span class="text-primary">{{$blogs->currentPage()}}</span> --}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row gy-24">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                            <div class="single-blog h-calc">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details', [$blog->slug]) }}">
                                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid w-100"
                                            alt="{{ $blog->title }}">
                                    </a>
                                    <div class="brush-bg"
                                        data-date="{{ date('d', strtotime($blog->created_at)) }} {{ date('M', strtotime($blog->created_at)) }} {{ date('Y', strtotime($blog->created_at)) }}">
                                        <img src="{{ asset('assets/images/gallery/brush.pn') }}g" alt="image">
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="blog-info-title">
                                            <div class="flex mb-15 gap-16 align-items-center">
                                                <div class="user flex gap-10 align-items-center">
                                                    <i class="ri-user-line"></i>
                                                    <p class="info">By:
                                                        @if ($blog->user)
                                                            {{ explode(' ', $blog->user->name)[0] ?? $blog->user->name }}
                                                        @else
                                                            Admin
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="donate flex gap-10 align-items-center">
                                                    <i class="ri-chat-3-line"></i>
                                                    <p class="info">
                                                        {{ $blog->category->name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <h4 class="title text-capitalize">
                                                <a href="{{ route('blog.details', [$blog->slug]) }}">
                                                    {{ $blog->title }}
                                                </a>
                                            </h4>
                                            <p class="subtitle">
                                                {{ Str::limit($blog->content, 150) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-section">
                                    <a href="{{ route('blog.details', [$blog->slug]) }}" class="read-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- pagination -->
                <nav class="pagination-nav">
                    {{ $blogs->links('vendor.livewire.bootstrap') }}
                </nav>
                <!-- End pagination -->
            </div>
        </section>
        <!-- End-of Blog -->

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
