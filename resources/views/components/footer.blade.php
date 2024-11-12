<footer>
    <div class="footer-wrapper footer-bg-one">
        <div class="container">
            <div class="footer-menu">
                <div class="col-lg-12">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center justify-content-between">
                            <!-- Logo-->
                            <div>
                                <div class="logo mb-2">
                                    <a href="{{route('home')}}"><img width="70"
                                            src="{{ asset('storage/' . optional($homePage)->logo) }}" alt="logo"></a>
                                </div>
                                <p class="text-white w-50">
                                   {{ optional($homePage)->footer_text }}
                                </p>
                            </div>
                        </div>
                        <!-- Right button -->
                        <ul class="cart">
                            <li class="cart-list"><a href="{{ route('donations') }}" class="donate-btn">Donate</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="footer-line">
            <div class="footer-imp-link row g-4 justify-content-between">
                <div class="col-xl-2 col-lg-6">
                    <div class="footer-link">
                        <h4 class="title">Explore Links</h4>
                        <ul class="imp-link">
                            <li class="single-list"><a href="{{ route('home') }}"
                                    class="single {{ request()->is('/') ? 'active' : '' }}" wire:navigate>Home</a></li>

                            <li class="single-list"><a href="{{ route('about') }}"
                                    class="single {{ request()->is('about') ? 'active' : '' }}" wire:navigate>About</a>
                            </li>

                            <li class="single-list"><a href="{{ route('campaigns') }}"
                                    class="single {{ request()->is('campaigns') ? 'active' : '' }}"
                                    wire:navigate>Campaigns</a></li>

                            <li class="single-list"><a href="{{ route('donations') }}"
                                    class="single {{ request()->is('donations') ? 'active' : '' }}"
                                    wire:navigate>Donations</a></li>

                            <li class="single-list"><a href="{{ route('blogs') }}"
                                    class="single {{ request()->is('blogs') ? 'active' : '' }}" wire:navigate>Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6">
                    <div class="footer-link">
                        <h4 class="title">Additional Links</h4>
                        <ul class="imp-link">
                            <li class="single-list"><a href="{{ route('volunteers') }}" class="single"
                                    wire:navigate>Volunteers</a>
                            </li>
                            <li class="single-list"><a href="{{ route('faq') }}" class="single" wire:navigate>FAQs</a>
                            </li>
                            <li class="single-list"><a href="{{ route('privacy.policy') }}" class="single"
                                    wire:navigate>Privacy
                                    Policy</a></li>
                            <li class="single-list"><a href="{{ route('terms') }}" class="single"
                                    wire:navigate>Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5">
                    <div class="footer-link">
                        <h4 class="title">Get Support</h4>
                        <ul class="imp-link">
                            <li class="single-list">
                                <div class="d-flex align-items-center gap-10 mb-20">
                                    <div class="imp-icon">
                                        <i class="ri-mail-fill"></i>
                                    </div>
                                    <a class="single" href="javascript:void(0)">
                                        {{ optional($footerContactData)->email }}
                                    </a>
                                </div>
                            </li>
                            {{-- <li class="single-list">
                                <div class="d-flex align-items-center gap-10 mb-20">
                                    <div class="imp-icon">
                                        <i class="ri-phone-fill"></i>
                                    </div>
                                    <a class="single" href="javascript:void(0)"> {{ optional($footerContactData)->phone }}</a>
                                </div>
                            </li> --}}
                            <li class="single-list">
                                <div class="d-flex align-items-center gap-10 mb-20">
                                    <div class="imp-icon">
                                        <i class="ri-map-pin-2-fill"></i>
                                    </div>
                                    <a class="single" href="javascript:void(0)">
                                        {{ optional($footerContactData)->location }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="footer-line">
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p class="pera">Copyright © {{ date('Y') }} {{ config('app.name') }}. All rights
                                    reserved.</p>
                                <div class="footer-social-link">
                                    <ul class="listing">
                                        <li class="single-list">
                                            <a class="single" href="{{ optional($footerContactData)->facebook }}"><i
                                                    class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li class="single-list">
                                            <a class="single" href="{{ optional($footerContactData)->twitter }}"><i
                                                    class="ri-twitter-fill"></i></a>
                                        </li>
                                        <li class="single-list">
                                            <a class="single" href="{{ optional($footerContactData)->instagram }}"><i
                                                    class="ri-instagram-line"></i></a>
                                        </li>
                                        <li class="single-list">
                                            <a class="single" href="{{ optional($footerContactData)->linkedin }}"><i
                                                    class="ri-linkedin-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End-of Footer -->
<!-- Scroll Up  -->
<div class="progressParent" id="back-top">
    <svg class="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Add an overlay element -->
<div class="overlay"></div>
