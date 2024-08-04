@extends('layout.home.app')
@section('title', 'Login')
@section('content')
    <main>
        <!-- Breadcrumb Area S t a r t -->
        <section class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="breadcrumb-text">
                    <h1 class="title wow fadeInUp" data-wow-delay="0.1s">login</h1>
                </div>
            </div>
        </section>
        <!-- End-of Breadcrumb Area -->

        <!-- Login area S t a r t  -->
        <div clas
        <form action="#" method="POST">
            <div class="position-relative contact-form mb-24">
                <label class="contact-label">Email </label>
                <input class="form-control contact-input" type="text" placeholder="Enter Your Email">
            </div>
        </form>
        s="login-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="login-card">
                        <div class="login-footer">
                            <a href="javascript:void(0)"
                               class="login-btn d-flex align-items-center justify-content-center gap-10">
                                <img src="assets/images/icon/google-icon.png" alt="img" class="m-0">
                                <span> login with Google</span>
                            </a>
                            <div class="create-account">
                                <p>
                                    Don’t have an account?
                                    <a href="register.html">
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
@endsection
