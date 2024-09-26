<div>
    <section class="breadcrumb-section breadcrumb-bg"
        style="background-image: url({{ asset('assets/images/gallery/breadcrumb-1.png') }})">
        <div class="container">
            <div class="breadcrumb-text">
                <nav aria-label="breadcrumb" class="breadcrumb-nav wow-dis fadeInUp" data-wow-delay="0.0s">
                    <ul class="breadcrumb listing">
                        <li class="breadcrumb-item single-list"><a href="index.blade.php" class="single">Home</a>
                        </li>
                        <li class="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)"
                                class="single">Register as a Volunteer</a>
                        </li>
                    </ul>
                </nav>
                <h1 class="title wow-dis fadeInUp" data-wow-delay="0.1s">Register as a Volunteer</h1>
            </div>
        </div>
    </section>
    <div class="container section-padding">
        <div class="row g-24">
            <div class="details-section">
                <h4 class="pera mb-2">Details</h4>
                <div class="comment-box">
                    <form action="donation-details.html" class="custom-form">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control custom-input" placeholder="Alex Jordan*" wire:model="name">
                                    @error('name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control custom-input"
                                        placeholder="name@example.com*" wire:model="email">
                                    @error('email')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" class="form-control custom-input"
                                        placeholder="Phone*" wire:model="phone">
                                    @error('phone')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-6">
                                    <label for="age">Age</label>
                                    <input type="text" id="age" class="form-control custom-input"
                                        placeholder="Age*" wire:model="age">
                                    @error('age')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="details-section">
                <h4 class="pera mb-2">Address</h4>
                <div class="comment-box">
                    <form action="donation-details.html" class="custom-form">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control custom-input"
                                    placeholder="12 Freetown Str, Apapa Lagos 102242*" wire:model="address">
                                @error('address')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" id="state" class="form-control custom-input"
                                        placeholder="State*" wire:model="state">
                                    @error('state')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="email" id="city" class="form-control custom-input"
                                        placeholder="City*" wire:model="city">
                                    @error('city')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="zipcode">Zip Code</label>
                                    <input type="text" id="zipcode" class="form-control custom-input"
                                        placeholder="Zip Code*" wire:model="zipcode">
                                    @error('zipcode')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="local_gov">Local Gov</label>
                                    <input type="email" id="local_gov" class="form-control custom-input"
                                        placeholder="Local Gov*" wire:model="local_gov">
                                    @error('local_gov')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- VErification Details --}}
            <div class="details-section">
                <h4 class="pera mb-2">Validation Details</h4>
                <div class="comment-box">
                    <form action="donation-details.html" class="custom-form">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nin">National Identification Number</label>
                                <input type="text" id="nin" name="nin"
                                    class="form-control custom-input" maxlength="12"
                                    placeholder="National Identification Number" wire:model="nin">
                                @error('nin')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="state_of_origin">State Of Origin</label>
                                    <select id="state_of_origin" type="text" class="form-control custom-input"
                                        label="State Of Origin*" wire:model="nin_state">
                                        <x-states :states="$states" />
                                    </select>
                                    @error('state')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="city_validation">City</label>
                                    <input type="email" id="city_validation" class="form-control custom-input"
                                        placeholder="City*" wire:model="nin_city">
                                    @error('city')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="zipcode_validation">Zip Code</label>
                                    <input type="text" id="zipcode_validation" class="form-control custom-input"
                                        placeholder="Zip Code*" wire:model="nin_zipcode">
                                    @error('zipcode')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="local_gov_validation">Local Gov</label>
                                    <input type="email" id="local_gov_validation" class="form-control custom-input"
                                        placeholder="Local Gov*" wire:model="nin_local_gov">
                                    @error('local_gov')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--  --}}
        </div>
        {{-- Loading state --}}
        <div wire:loading wire:target="saveuser" class="mb-3 py-6">
            <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading" width="60"
                style="user-select: none;">
        </div>
        <div class="details-section">
            <div class="comment-box">
                <div class="custom-form">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" value="Sign Up" class="btn-primary-fill pill-btn w-100"
                                wire:click="saveuser">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
