@section('title',  optional($job)->name . ' Job Details')
<section>
    <section class="breadcrumb-section breadcrumb-bg"
             style="background-image: url({{ asset('storage/' . optional($job)->image1) }}); background-size:cover; background-position:center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow fadeInUp" data-wow-delay="0.0s"
                     style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a></li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="{{ route('jobs') }}"
                                                                                       class="single">Jobs</a></li>
                    </ul>
                </nav>
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    {{ optional($job)->name }}
                </h1>
            </div>
        </div>
    </section>
    <section class="donate-section py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-8">
                    <div class="">
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3 mb-md-0">
                                <img src="{{ asset('storage/' . optional($job)->image1) }}" alt="job image"
                                     class="img-fluid rounded-3" style="aspect-ratio:1/1; object-fit:cover;">
                            </div>
                            <div class="col-sm-6 col-12">
                                <img src="{{ asset('storage/' . optional($job)->image2) }}" alt="job image"
                                     class="img-fluid rounded-3" style="aspect-ratio:1/1; object-fit:cover;">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <span class="badge badge-success breadcrumb-bg text-white">
                                    {{ optional($job)->type }}
                                </span>
                                <h3 class="mt-3 pera">{{strtoupper(optional($job)->name)}}</h3>
                                <small class="text-muted d-block mb-3 mt-1">
                                    <i class="ri-map-pin-line"></i>
                                    {{ optional($job)->location }}
                                </small>
                                <div class="mb-3">
                                    <small class="fw-bold">Duration</small>
                                    <div>{{ optional($job)->duration }}</div>
                                </div>
                                <div>
                                    <small class="fw-bold">Experience</small>
                                    <div>{{ optional($job)->experience }}</div>
                                </div>
                                <h4 class="mt-4">Job Description</h4>
                                <div class="mt-3">{!! optional($job)->description !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">

                        @auth
                            <!-- Button trigger modal -->

                            @if((auth()->user()->id != optional($job)->user_id) && !auth()->user()->hasRole('admin') && !auth()->user()->hasRole('volunteer'))
                                <div 
                                >
                                <div>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="jobApplicationModalLabel">Job Application
                                                Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="jobApplicationForm">
                                                <div class="mb-3">
                                                    <label for="resume" class="form-label">Phone Number</label>
                                                    <input type="text"
                                                              wire:model="phone"
                                                           class="form-control" id="phone" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label
                                                        for="coverLetter" class="form-label">Cover Letter</label>
                                                    <textarea
                                                        wire:model="coverLetter"
                                                        class="form-control" id="coverLetter" rows="4"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="resume" class="form-label">Upload Resume</label>
                                                    <input type="file"
                                                              wire:model="resume"
                                                           class="form-control" id="resume" required>
                                                </div>
                                            </form>
                                        </div>
                                        <div wire:loading wire:target="applyForJob" class="mb-3">
                                            <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading" width="60"
                                                style="user-select: none;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" form="jobApplicationForm"
                                                    class="btn btn-primary"
                                                    wire:click.prevent="applyForJob({{ optional($job)->id }})"
                                            >
                                                Submit Application
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="container mt-3">
                                    <p class="text-info p-3 border rounded-3" disabled>
                                        You can't apply for this job
                                        {{ auth()->user()->hasRole('admin') ? 'as an admin' : 'as a ' . auth()->user()->roles->first()->name }}
                                    </p>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">
                        Posted By
                    </h6>
                    <div class="user-box mb-3">
                        <div class="user-img mx-auto">
                            <img src="{{ asset('storage/' . $job->user->avatar) }}" alt="img"
                                 style="object-fit: cover; aspect-ratio: 1/1;">
                        </div>
                        <div class="user-info text-center">
                            <h4 class="title">
                                {{ $job->user->name }}
                            </h4>
                            <p class="pera">
                                {{ Str::limit($job->user->bio, 120) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</section>
