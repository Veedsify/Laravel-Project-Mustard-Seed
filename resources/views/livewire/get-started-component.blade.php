@section('title', $title)
<div>
    <section class="breadcrumb-section breadcrumb-bg"
        style="backgeound: cadetblue; background-size:cover; background-position:center;">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow-dis fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{ route('home') }}" class="single">Home</a>
                        </li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Get Started</a>
                        </li>
                    </ul>
                </nav>
                <h1 class="title wow-dis fadeInUp" data-wow-delay="0.1s">
                    Get Started
                </h1>
            </div>
        </div>
    </section>

    <section class="helpful-area-three section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="get-started-guide mt-5 p-4">
                    <h2 class="text-center mb-5">Detailed Guide to Get Started</h2>

                    <!-- Volunteer Guide -->
                    <div class="guide-section mb-5 p-3 border rounded shadow-sm">
                        <h3 class="guide-title mb-4"><i class="fas fa-hands-helping"></i> For Volunteers</h3>
                        <div class="guide-steps">
                            <ol class="list-group list-group-numbered gap-2">
                                <li class="list-group-item border rounded p-3">Register as a Volunteer - <small class="text-muted">Sign up
                                        with valid RC number and verify contact</small></li>
                                <li class="list-group-item border rounded p-3">Provide Your Details - <small class="text-muted">Share
                                        location and contact information</small></li>
                                <li class="list-group-item border rounded p-3">Assist with Donations - <small class="text-muted">Collect,
                                        secure, and manage item transfers</small></li>
                                <li class="list-group-item border rounded p-3">Review and Approve - <small class="text-muted">Oversee
                                        donations and requests</small></li>
                                <li class="list-group-item border rounded p-3">Verify Job Authenticity - <small class="text-muted">Confirm
                                        legitimacy of tasks</small></li>
                                        <li class="list-group-item border rounded p-3">Enjoy 10% Share - <small class="text-muted">
                                            Get 10% of the total donation value as a reward
                                            </small></li>
                            </ol>
                        </div>
                    </div>

                    <!-- Donor Guide -->
                    <div class="guide-section mb-5 p-3 border rounded shadow-sm">
                        <h3 class="guide-title mb-4"><i class="fas fa-gift"></i> For Donors</h3>
                        <div class="guide-steps">
                            <ol class="list-group list-group-numbered gap-2">
                                <li class="list-group-item border rounded p-3">Register as a Donor - <small class="text-muted">Join as
                                        named or anonymous donor</small></li>
                                <li class="list-group-item border rounded p-3">Choose a Volunteer - <small class="text-muted">Find nearby
                                        volunteer and list items</small></li>
                                <li class="list-group-item border rounded p-3">Coordinate Delivery - <small class="text-muted">Arrange
                                        delivery and confirm receipt</small></li>
                                <li class="list-group-item border rounded p-3">Track Donations - <small class="text-muted">Monitor progress
                                        and impact</small></li>
                                <li class="list-group-item border rounded p-3">Review Terms - <small class="text-muted">Check Terms of
                                        Service</small></li>
                            </ol>
                        </div>
                    </div>

                    <!-- Benefactor Guide -->
                    <div class="guide-section p-3 border rounded shadow-sm">
                        <h3 class="guide-title mb-4"><i class="fas fa-hand-holding-heart"></i> For Benefactors</h3>
                        <div class="guide-steps">
                            <ol class="list-group list-group-numbered gap-2">
                                <li class="list-group-item border rounded p-3">Register as a Benefactor - <small class="text-muted">Sign
                                        up with valid ID</small></li>
                                <li class="list-group-item border rounded p-3">Complete Facial Validation - <small class="text-muted">Use
                                        camera-enabled phone for verification</small></li>
                                <li class="list-group-item border rounded p-3">Locate a Volunteer - <small class="text-muted">Find nearby
                                        volunteer support</small></li>
                                <li class="list-group-item border rounded p-3">Request an Item - <small class="text-muted">Apply for
                                        available items</small></li>
                                <li class="list-group-item border rounded p-3">Understand Terms - <small class="text-muted">Review
                                        support eligibility guidelines</small></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="helpful-area-three mb-5">
        <div class="container">
            <div class="row g-4">
                <!-- Volunteer Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-helpful-item-three">
                        <div class="icon">
                            <!-- Volunteer Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3>Become a Volunteer</h3>
                        <p>Join our community of dedicated volunteers making a difference. Discover various ways to
                            contribute your time, skills, and passion to our causes.</p>
                        <a href="{{ route('register.as.volunteer') }}" class="btn btn-primary mt-4">Register as
                            Volunteer</a>
                    </div>
                </div>

                <!-- Benefactor Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-helpful-item-three">
                        <div class="icon">
                            <!-- Benefactor Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <h3>Become a Benefactor</h3>
                        <p>As a benefactor, you will receive support from our community through donations. Your needs will be met by generous donors and dedicated volunteers.</p>
                        <a href="{{ route('register') }}" class="btn btn-primary mt-4">Join as Benefactor</a>
                    </div>
                </div>

                <!-- Donation Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-helpful-item-three">
                        <div class="icon">
                            <!-- Donation Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                </rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <h3>Make a Donation</h3>
                        <p>Your donation helps create a lasting impact in communities. Every contribution, big or small,
                            supports our various initiatives to make a real difference.</p>
                        <a href="{{ url('user/item') }}" class="btn btn-primary mt-4">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
