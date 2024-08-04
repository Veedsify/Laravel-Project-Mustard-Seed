@section('title', 'Login')
<main>
    <!-- Breadcrumb Area S t a r t -->
    <section class="breadcrumb-section breadcrumb-bg"
             style="background-image: url({{asset('assets/images/gallery/breadcrumb-1.png')}})">
        <div class="container">
            <div class="breadcrumb-text">
                <h1 class="title wow-dis fadeInUp" data-wow-delay="0.1s">login</h1>
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
                            <a href="index.blade.php" class="mb-30 d-block"><img
                                    src="assets/images/logo/Logo-charitfix.png" alt="logo"></a>
                        </div>
                        <div class="login-footer">
                            <a href="{{route('redirect.google')}}"
                               class="login-btn d-flex align-items-center justify-content-center gap-10">
                                <img src="assets/images/icon/google-icon.png" alt="img" class="m-0">
                                <span> Login with Google</span>
                            </a>
                            <div class="create-account">
                                <p>
                                    Don’t have an account?
                                    <a href="{{route('register')}}" wire:navigate>
                                        <span>Register</span>
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-of Login -->
</main>
<!-- Footer S t a r t -->
