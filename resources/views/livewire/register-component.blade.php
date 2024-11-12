@section('title', 'Register | ' . 'Mustard Seed')
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{asset('assets/images/gallery/breadcrumb-1.png')}})">
        <div class="container">
            <div class="breadcrumb-text">
                <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Register</h1>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb Area -->

    <!-- Login area S t a r t  -->
    <div class="login-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="login-card">
                        <!-- Logo -->
                        <div class="logo mb-40">
                            <a href="{{route('home')}}" class="mb-30 d-block"><img
                                    src="assets/images/logo/Logo-charitfix.png" alt="logo"></a>
                        </div>
                        <!-- Form -->
                        <form action="#" method="POST">
{{--                            <div class="contact-form mb-24">--}}
{{--                                <label class="contact-label">Name </label>--}}
{{--                                <input class="form-control contact-input" type="text" placeholder="Enter Your Name">--}}
{{--                            </div>--}}
{{--                            <div class="contact-form mb-24">--}}
{{--                                <label class="contact-label">Email </label>--}}
{{--                                <input class="form-control contact-input" type="email" placeholder="Email">--}}
{{--                            </div>--}}

{{--                            <!-- Password -->--}}
{{--                            <div class="position-relative contact-form mb-24">--}}
{{--                                <label class="contact-label">Enter Password</label>--}}
{{--                                <input type="password" class="form-control contact-input password-input"--}}
{{--                                    id="txtPasswordLogin" placeholder="Enter Password">--}}
{{--                                <i class="toggle-password ri-eye-line"></i>--}}
{{--                            </div>--}}
{{--                            <!-- Password -->--}}
{{--                            <div class="position-relative contact-form mb-24">--}}
{{--                                <label class="contact-label">Confirm Password</label>--}}
{{--                                <input type="password" class="form-control contact-input password-input"--}}
{{--                                    id="txtPasswordLogin2" placeholder="Confirm Password">--}}
{{--                                <i class="toggle-password ri-eye-line"></i>--}}
{{--                            </div>--}}

                            <a href="{{route('redirect.google')}}"
                               class="login-btn bg-white w-100 d-flex align-items-center justify-content-center gap-10 mb-3">
                                <img src="assets/images/icon/google-icon.png" alt="img" class="m-0">
                                <span> Signup with Google</span>
                            </a>
                        </form>

                        <div class="login-footer mb-20">
                            <div class="create-account">
                                <p>
                                    Already have an account?
                                    <a href="{{route('login')}}" wire:navigate>
                                        <span>Login</span>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="sign-with">
                            <p class="text-paragraph">Or Sign in with</p>
                            <ul class="icon-login-section">
                                <li class="icon-login">
                                    <a href="{{route('redirect.google')}}"><i class="ri-google-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-of Login -->
</main>
