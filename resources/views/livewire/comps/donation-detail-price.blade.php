<div>

    <div class="payment-section">
        <div class="select-payment">
            <h4 class="title">Select Payment Method</h4>
            <div class="payment-btn">
                <div class="custom-radio-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cash Donation
                        <span class="custom-radio"></span>
                    </label>
                </div>
                <div class="custom-radio-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Physical Donation
                        <span class="custom-radio"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="amount" x-data="{ open: false }">
            <div class="enter-amount">
                <button class="amount-btn active" x-on:click="open = !open">Enter Your Amount</button>
            </div>
            <div class="all-amount" x-data="{ active: 2 }">
                @php
                    $amount_by_10 = $campaigns->goal * 0.1;
                    $amount_by_15 = $campaigns->goal * 0.15;
                    $amount_by_20 = $campaigns->goal * 0.2;
                    $amount_by_25 = $campaigns->goal * 0.25;
                @endphp
                <button @click="active = 0" :class="{ 'active': active === 0 }" class="amount-btn"
                    wire:click="setPrice({{ $amount_by_10 }})">
                    {{ $campaigns->payment_currency }} {{ number_format($amount_by_10) }}
                </button>
                <button @click="active = 1" :class="{ 'active': active === 1 }" class="amount-btn"
                    wire:click="setPrice({{ $amount_by_15 }})">
                    {{ $campaigns->payment_currency }} {{ number_format($amount_by_15) }}
                </button>
                <button @click="active = 2" :class="{ 'active': active === 2 }" class="amount-btn"
                    wire:click="setPrice({{ $amount_by_20 }})">
                    {{ $campaigns->payment_currency }} {{ number_format($amount_by_20) }}
                </button>
                <button @click="active = 3" :class="{ 'active': active === 3 }" class="amount-btn"
                    wire:click="setPrice({{ $amount_by_25 }})">
                    {{ $campaigns->payment_currency }} {{ number_format($amount_by_25) }}
                </button>
            </div>
            <div class="mt-3 w-100" x-show="open" x-transition>
                <p class="mb-1 fw-semibold fs-5">Enter Your Amount</p>
                <input type="number" class="form-control form-control-lg custom-input w-100 d-block"
                    placeholder="1,000" wire:model="price" />
                @error('price')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="details-section">
        <h4 class="pera">Details</h4>
        <div class="comment-box">
            <form action="donation-details.html" class="custom-form">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control custom-input"
                                placeholder="Alex Jordan*" wire:model="name">
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="email" class="form-control custom-input" placeholder="name@example.com*"
                                wire:model="email">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" placeholder="Company Name*"
                        wire:model="company_name">
                    @error('company_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    <div class="details-section">
        <h4 class="pera">Address</h4>
        <div class="comment-box">
            <form action="donation-details.html" class="custom-form">
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" name="address" class="form-control custom-input"
                            placeholder="12 Freetown Str, Apapa Lagos 102242*" wire:model="address">
                        @error('address')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="text" class="form-control custom-input" placeholder="Postcode*"
                                wire:model="postcode">
                            @error('postcode')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="email" class="form-control custom-input" placeholder="city*"
                                wire:model="city">
                            @error('city')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="agreement-section">
        <div class="form-check custom-check">
            <input class="form-check-input" type="checkbox" value="accepted" id="flexCheckChecked"
                wire:model="checked">
            <label class="form-check-label" for="flexCheckChecked"> I agree with the Team Of
                service </label>
        </div>
        @error('checked')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex gap-16 flex-wrap">
        <button type="submit" class="submit-btn" wire:click="proceedToPay">Donate Now</button>
        <span type="submit" class="submit-btn outline">Total Donation: $250</span>
    </div>
</div>
