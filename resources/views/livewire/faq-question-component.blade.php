<div class="row">
    <div class="col-lg-7 my-auto">
        <!-- Section Tittle -->
        <div class="section-tittle mb-50">
            <h2 class="title font-700">Recently Asked Questions</h2>
            <p class="pera">
                When deciding which charity to donate to, it's important to do your search.
            </p>
        </div>
        <div class="accordion" id="accordionExample">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="{{ 'heading' . $faq->id }}">
                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ 'target' . $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                            aria-controls="{{ 'target' . $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="{{ 'target' . $faq->id }}"
                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                        aria-labelledby="{{ 'heading' . $faq->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-5">
        <img class="w-100 d-none d-lg-block tilt-effect" src="assets/images/gallery/que.png" alt="image">
    </div>
</div>
