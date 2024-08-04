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
                                    <a href="{{route('home')}}"><img
                                                src="{{asset('assets/images/logo/Logo-charitfix.png')}}" alt="logo"></a>
                                </div>
                                <!-- Logo Mobile-->
                                <div class="logo logo-mobile light-logo">
                                    <a href="{{route('home')}}" wire:navigate><img src="assets/images/icon/favicon.png"
                                                                                   alt="img"></a>
                                </div>
                            </div>
                            <div class="search-container">
                                <input type="text" id="searchField" class="search-field" placeholder="Search...">
                                <button id="closeSearch" class="close-search-btn"><i class="ri-close-line"></i>
                                </button>
                            </div>

                            <!-- Main-menu for desktop -->
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul class="listing" id="navigation">
                                        <li class="single-list"><a href="{{route('home')}}"
                                                                   class="single {{request()->is('/')? 'active': ""}}"
                                                                   wire:navigate>Home</a></li>

                                        <li class="single-list"><a href="{{route('about')}}"
                                                                   class="single {{request()->is('about')? 'active': ""}}"
                                                                   wire:navigate>About</a></li>

                                        <li class="single-list"><a href="{{route('donation')}}"
                                                                   class="single {{request()->is('donation')? 'active': ""}}"
                                                                   wire:navigate>Donation</a></li>

                                        <li class="single-list"><a href="{{route('blogs')}}"
                                                                   class="single {{request()->is('blogs') ? 'active': ""}}"
                                                                   wire:navigate>Blog</a>
                                        </li>

                                        <li class="single-list">
                                            <a href="javascript:void(0)" class="single">More <i
                                                        class="ri-arrow-down-s-line"></i></a>
                                            <ul class="submenu">
                                                <li class="single-list"><a href="{{route('volunteers')}}"
                                                                           class="single" wire:navigate>Volunteers</a>
                                                </li>
                                                <li class="single-list"><a href="{{route('faq')}}" class="single"
                                                                           wire:navigate>FAQs</a></li>
                                                <li class="single-list"><a href="{{route('privacy.policy')}}"
                                                                           class="single" wire:navigate>privacy
                                                        policy</a></li>
                                                <li class="single-list"><a href="{{route('terms')}}"
                                                                           class="single"
                                                                           wire:navigate>terms-condition</a></li>
                                            </ul>
                                        </li>
                                        <li class="single-list"><a href="{{route('contact')}}"
                                                                   class="single {{request()->is('contact') ? 'active': ""}}"
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
                                        <a href="{{route('home')}}" class="btn-primary-fill pill-btn" wire:navigate>
                                            {{explode(' ', auth()->user()->name)[0] ??auth()->user()->name }}
                                        </a>
                                    @endauth
                                    @guest()
                                        <a href="{{route('login')}}" class="btn-primary-fill pill-btn" wire:navigate>Log
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
