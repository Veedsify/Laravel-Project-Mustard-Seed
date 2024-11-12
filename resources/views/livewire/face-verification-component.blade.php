@section('title', 'Face Verification')
<main>
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('assets/images/gallery/breadcrumb-1.png') }})">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow-dis fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="{{route('home')}}" class="single">Home</a>
                        </li>
                        <li class="breadcrumb-item single-list" aria-current="page">
                            <a href="javascript:void(0)" class="single">Verify Your Identity</a>
                        </li>
                    </ul>
                </nav>
                <h1 class="title wow-dis fadeInUp" data-wow-delay="0.1s">
                    Verify Your Identity
                </h1>
            </div>
        </div>
    </section>

    <section class="top-bottom-padding2">
        <div class="container">
            <div class="row">

                <form method="post" enctype="multipart/form-data" action="{{route('face.verification')}}">
                    @csrf
                    <input type="file" name="image" id="image" class="form-control" wire:model.live="image">
                    @error('image')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <!-- Improved loading indicator for the image field -->
                    <div wire:loading wire:target="saveFace">Uploading image...</div>

                    <button class="btn btn-primary" type="submit">Upload</button>
                </form>

            </div>
        </div>
    </section>
</main>
