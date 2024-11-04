<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-wrapper d-flex align-items-center justify-content-between">
                            <div class="header-left d-flex align-items-center justify-content-between">
                                <!-- Logo-->
                                <div class="logo logo-large light-logo">
                                    <a href="{{ route('home') }}"><img width="70"
                                            src="{{ asset('storage/' . optional($homePage)->logo) }}"
                                            alt="logo"></a>
                                </div>
                                <!-- Logo Mobile-->
                                <div class="logo logo-mobile light-logo">
                                    <a href="{{ route('home') }}" wire:navigate><img
                                            src="assets/images/icon/favicon.png" alt="img"></a>
                                </div>
                            </div>
                            <div class="search-container">
                                {{-- <input type="text" id="searchField" class="search-field" placeholder="Search..."> --}}
                                <button id="closeSearch" class="close-search-btn"><i class="ri-close-line"></i>
                                </button>
                                <div class="google_custom_search_engine">
                                    <script async src="https://cse.google.com/cse.js?cx=216722da6f83c4cd0"></script>
                                    <div class="gcse-search"></div>
                                </div>
                            </div>

                            <!-- Main-menu for desktop -->
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul class="listing" id="navigation">
                                        {{-- <li class="single-list"><a href="{{ route('home') }}"
                                                class="single {{ request()->is('/') ? 'active' : '' }}"
                                                wire:navigate>Home</a></li> --}}

                                        <li class="single-list"><a href="{{ route('about') }}"
                                                class="single {{ request()->is('about') ? 'active' : '' }}"
                                                wire:navigate>About</a></li>

                                        <li class="single-list"><a href="{{ route('campaigns') }}"
                                                class="single {{ request()->is('campaigns') ? 'active' : '' }}"
                                                wire:navigate>Campaigns</a></li>

                                        <li class="single-list"><a href="{{ route('jobs') }}"
                                                class="single {{ request()->is('jobs') ? 'active' : '' }}"
                                                wire:navigate>Jobs</a></li>

                                        <li class="single-list"><a href="{{ route('donations') }}"
                                                class="single {{ request()->is('donations') ? 'active' : '' }}"
                                                wire:navigate>Donations</a></li>

                                        <li class="single-list"><a href="{{ route('blogs') }}"
                                                class="single {{ request()->is('blogs') ? 'active' : '' }}"
                                                wire:navigate>Blog</a>
                                        </li>

                                        {{-- <li class="single-list">
                                                <a href="javascript:void(0)" class="single">More <i
                                                        class="ri-arrow-down-s-line"></i></a>
                                                <ul class="submenu">
                                                    <li class="single-list"><a href="{{ route('volunteers') }}"
                                                            class="single" wire:navigate>Volunteers</a>
                                                    </li>
                                                    <li class="single-list"><a href="{{ route('faq') }}" class="single"
                                                            wire:navigate>FAQs</a></li>
                                                    <li class="single-list"><a href="{{ route('privacy.policy') }}"
                                                            class="single" wire:navigate>privacy
                                                            policy</a></li>
                                                    <li class="single-list"><a href="{{ route('terms') }}" class="single"
                                                            wire:navigate>terms-condition</a></li>
                                                </ul>
                                            </li> --}}
                                        <li class="single-list"><a href="{{ route('contact') }}"
                                                class="single {{ request()->is('contact') ? 'active' : '' }}"
                                                wire:navigate>Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="header-right">
                                <div class="cart">
                                    <!-- search button -->
                                    <a href="javascript:void(0)" class="rounded-btn search-bar"><i
                                            class="ri-search-line"></i></a>
                                    @auth()
                                        @php
                                            $role = auth()->user()->role;
                                            $dashboardRoute = match ($role) {
                                                'admin' => '/admin',
                                                'user' => '/user',
                                                default => '/dashboard/volunteer',
                                            };
                                        @endphp
                                        <a href="{{ $dashboardRoute }}" class="btn-primary-fill pill-btn">
                                            {{ explode(' ', auth()->user()->name)[0] ?? auth()->user()->name }} - Dashboard
                                        </a>
                                    @endauth
                                    @guest()
                                        <a href="{{ route('login', [1]) }}" class="btn-primary-fill pill-btn"
                                            wire:navigate>Log
                                            in</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="div">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
