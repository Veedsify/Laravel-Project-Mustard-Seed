<section class="volunteer-details mb-5">
    <div class="container">
        <div class="row gy-24">
            <div class="col-xl-8 col-md-7 col-lg-7">
                <div class="review-section border p-4 rounded">
                    <h4 class="mb-4">Reviews</h4>

                    <!-- Add Review Form -->
                    <form wire:submit.prevent="submitReview" class="mb-4">
                        <div class="mb-3">
                            <!-- Star Rating Input -->
                            <div class="star-rating mb-3">
                                <div class="stars-container" x-data="{ hoveredRating: 0, selectedRating: @entangle('rating') }">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span @mouseenter="hoveredRating = {{ $i }}"
                                            @mouseleave="hoveredRating = 0"
                                            @click="selectedRating = {{ $i }}; $wire.set('rating', {{ $i }})"
                                            class="star-wrapper">
                                            <svg class="star" style="width: 50px; height: 50px;"
                                                :class="{
                                                    'active': hoveredRating >= {{ $i }} || selectedRating >=
                                                        {{ $i }}
                                                }"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </span>
                                    @endfor
                                </div>
                            </div>

                            <textarea wire:model="reviewText" class="form-control p-3" rows="3" placeholder="Write your review here..."></textarea>
                            <div wire:loading wire:target="saveRating" class="my-3">
                                <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading" width="60"
                                    style="user-select: none;">
                            </div>
                        </div>

                        @auth()
                            @if (auth()->user()->role == 'user')
                                <button wire:click.prevent="saveRating" type="submit" class="btn btn-primary p-3">Submit
                                    Review</button>
                            @else
                                <button type="submit" class="btn btn-primary p-3" disabled>Submit Review</button>
                                <div class="py-2">
                                    <small class="text-danger">Only users can submit reviews</small>
                                </div>
                            @endif
                        @else
                            <a href="{{ route('redirect.google') }}" class="btn btn-primary p-3">Login to Review</a>
                        @endauth
                    </form>

                    <!-- Reviews List -->
                    <div class="reviews-list">
                        @forelse($reviews as $review)
                            <div class="review-item mb-3 p-3 py-4">
                                <div class="items-center mb-2">
                                    <div class="user-info">
                                        <strong>{{ $review->user->custom_username ?? $review->user->username }}</strong>
                                        <small
                                            class="text-muted ms-2">{{ $review->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg style="width: 20px; height: 20px; {{ $i <= $review->rating ? 'fill: #ffd700' : 'fill: #e4e4e4' }}"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                <p class="mb-0">{{ $review->review }}</p>
                            </div>
                        @empty
                            <div class="text-center text-muted">
                                No reviews yet. Be the first to review <strong> {{ $volunteer->name }} </strong>.
                            </div>
                        @endforelse

                        @if ($reviews->hasPages())
                            <div class="p-3">
                                <nav class="pagination-nav">
                                    {{ $reviews->links('vendor.livewire.bootstrap') }}
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-5 col-lg-5">
                <div class="rating-speedometer border p-5 rounded rounded-4">
                    <svg viewBox="0 0 100 60" class="gauge" style="width: 100%; height: auto;">
                        <!-- Background arc -->
                        <path d="M10,50 A40,40 0 1,1 90,50" style="fill: none; stroke: #eee; stroke-width: 8;" />

                        @php
                            // Ensure rating is between 0 and 5
                            $rating = min(5, max(0, $averageRating ?? 0));
                            // Calculate the angle in degrees for the rating (reversed for proper direction)
                            $degrees = 180 - ($rating / 5) * 180;
                            // Calculate the x and y coordinates for the stroke end point
                            $x = 50 + 40 * cos(deg2rad($degrees));
                            $y = 50 - 40 * sin(deg2rad($degrees));
                        @endphp

                        <!-- Rating arc -->
                        <path d="M10,50 A40,40 0 0,1 {{ $x }},{{ $y }}"
                            style="fill: none; stroke: #00715D; stroke-width: 8; stroke-linecap: round;" />

                        <!-- Rating text -->
                        <text x="50" y="40" text-anchor="middle"
                            style="font-size: 14px; fill: #00715D; font-weight: bold;">
                            {{ number_format($rating, 1) }}
                        </text>
                        <text x="50" y="52" text-anchor="middle" style="font-size: 5px; fill: #666;">
                            out of 5.0
                        </text>

                        <!-- Center dot -->
                        {{-- <circle cx="50" cy="50" r="4" style="fill: #28a745;" /> --}}
                    </svg>

                    <!-- Description below the gauge -->
                    <div class="text-center mt-2">
                        <h5 class="mb-0">Rating</h5>
                        <small class="text-muted">Based on volunteer performance</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
