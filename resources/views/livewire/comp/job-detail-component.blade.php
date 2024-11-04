<section>
    <section class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s"
                    style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="index.html" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Jobs</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Jobs list</h1>
            </div>
        </div>
    </section>
    <section class="donate-section py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <img src="{{ asset('storage/' . optional($job)->image1) }}" alt="job image"
                                    class="img-fluid rounded-3" style="aspect-ratio:1/1; object-fit:cover;">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . optional($job)->image2) }}" alt="job image"
                                    class="img-fluid rounded-3" style="aspect-ratio:1/1; object-fit:cover;">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <span class="badge badge-success breadcrumb-bg text-white">
                                    {{ optional($job)->type }}
                                </span>
                                <h3 class="mt-3">{{ optional($job)->name }}</h3>
                                <small class="text-muted d-block mb-3 mt-1">
                                    <i class="ri-map-pin-line"></i>
                                    {{ optional($job)->location }}
                                </small>
                                <div class="d-flex gap-4 mb-3 p-4 border rounded-3">
                                    <div>
                                        <small class="fw-bold">Duration</small>
                                        <div>{{ optional($job)->duration }}</div>
                                    </div>
                                    <div>
                                        <small class="fw-bold">Experience</small>
                                        <div>{{ optional($job)->experience }}</div>
                                    </div>
                                </div>
                                <h5 class="mt-4">Job Description</h5>
                                <div class="mt-3">{!! optional($job)->description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</section>
