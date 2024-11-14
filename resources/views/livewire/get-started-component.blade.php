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
                <!-- Volunteer Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-helpful-item-three">
                        <div class="icon">
                            <!-- Volunteer Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3>Become a Volunteer</h3>
                        <p>Join our community of dedicated volunteers making a difference. Discover various ways to contribute your time, skills, and passion to our causes.</p>
                        <a href="{{ route('register') }}" class="btn btn-primary mt-4">Register as Volunteer</a>
                    </div>
                </div>
                
                <!-- Benefactor Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-helpful-item-three">
                        <div class="icon">
                            <!-- Benefactor Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <h3>Become a Benefactor</h3>
                        <p>Support our mission with regular, meaningful contributions. Your sustained giving enables us to plan and implement impactful long-term programs.</p>
                        <a href="{{ route('register') }}" class="btn btn-primary mt-4">Join as Benefactor</a>
                    </div>
                </div>
    
                <!-- Donation Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-helpful-item-three">
                        <div class="icon">
                            <!-- Donation Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <h3>Make a Donation</h3>
                        <p>Your donation helps create a lasting impact in communities. Every contribution, big or small, supports our various initiatives to make a real difference.</p>
                        <a href="{{ url('user/item') }}" class="btn btn-primary mt-4">Donate Now</a>
                    </div>
                </div>
            </div>
    
            <!-- Navigation for Steps -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="steps-navigation mb-4">
                        <a href="#volunteer-steps" class="nav-link">Volunteer Steps</a>
                        <a href="#benefactor-steps" class="nav-link">Benefactor Steps</a>
                        <a href="#donation-steps" class="nav-link">Donation Steps</a>
                    </div>
                </div>
            </div>
    
            <!-- Volunteer Steps -->
            <section id="volunteer-steps" class="mt-5">
                <h2>How to Become a Volunteer</h2>
                <ol class="steps-list">
                    <li>Create an account on our platform and complete your profile.</li>
                    <li>Select the causes you are passionate about and your availability for volunteering.</li>
                    <li>Participate in our volunteer orientation to learn about our mission, programs, and expectations.</li>
                    <li>Start contributing your time and skills by engaging in various activities and projects.</li>
                </ol>
            </section>
    
            <!-- Benefactor Steps -->
            <section id="benefactor-steps" class="mt-5">
                <h2>How to Become a Benefactor</h2>
                <ol class="steps-list">
                    <li>Register as a benefactor on our website and create your account.</li>
                    <li>Choose your preferred giving plan based on your budget and desired impact.</li>
                    <li>Set up your recurring contribution and select your payment method for easy donations.</li>
                    <li>Stay informed about your impact with regular updates on our programs and how your contributions are making a difference.</li>
                </ol>
            </section>
    
            <!-- Donation Steps -->
            <section id="donation-steps" class="mt-5">
                <h2>How to Make a Donation</h2>
                <ol class="steps-list">
                    <li>Choose the amount you wish to donate towards our causes.</li>
                    <li>Select your preferred payment method, such as credit card, PayPal, or bank transfer.</li>
                    <li>Complete the transaction through our secure payment gateway.</li>
                    <li>Receive an acknowledgment receipt via email for your donation.</li>
                </ol>
            </section>
        </div>
    </section>
    

</div>
