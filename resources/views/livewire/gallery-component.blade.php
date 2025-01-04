<div class="gallery-area">
    @if ($bottomGallery->count() >= 6)
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($bottomGallery as $image)
                    @if ($image->status == 1)
                        <div class="swiper-slide">
                            <div class="gallery-img">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="img"
                                    style="width: 100%;">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    @endif
</div>
