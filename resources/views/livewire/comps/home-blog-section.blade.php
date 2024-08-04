<section class="blog-section bottom-padding pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-50">
                    <span class="sub-tittle text-capitalize font-600">Blog</span>
                    <h2 class="title font-700">Our Blog & Feeds</h2>
                </div>
            </div>
        </div>
        <div class="row gy-24">
            @foreach ($blogs as $blog)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                <div class="single-blog h-calc wow-dis fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-img position-relative" data-time="{{$blog->created_at->format('d, M Y')}}">
                        <a href="{{route('blog.details', [$blog->slug])}}">
                            <img src="{{asset($blog->image)}}" class="img-fluid w-100" alt="img">
                        </a>
                    </div>
                    <div class="blog-info">
                        <div class="blog-info-title">
                            <div class="flex gap-16 align-items-center">
                                <div class="user flex gap-10 align-items-center">
                                    <i class="ri-user-line"></i>
                                    <p class="info">By:
                                        @if ($blog->user)
                                        {{explode(' ', $blog->user->name)[0] ?? $blog->user->name}}
                                        @else
                                        Admin
                                        @endif
                                    </p>
                                </div>
                                <div class="donate flex gap-10 align-items-center">
                                    <i class="ri-chat-3-line"></i>
                                    <p class="info">
                                        {{$blog->category->name}}
                                    </p>
                                </div>
                            </div>
                            <h4 class="title text-capitalize"><a href="{{route('blog.details', [$blog->slug])}}">
                                    {{$blog->title}}
                                </a></h4>
                            <p class="subtitle">
                                {{Str::limit($blog->descriptions, 200)}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>