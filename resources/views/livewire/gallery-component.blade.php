<div class="gallery-area">
    @if ($bottomGallery->count() >= 6)
        <div class="gallery-slider d-flex">
            @foreach ($bottomGallery as $image)
                @if ($image->status == 1)
                    <div class="gallery-img">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="img" style="width: 100%;">
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
