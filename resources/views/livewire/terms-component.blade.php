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
