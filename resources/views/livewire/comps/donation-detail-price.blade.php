<div>

    <div class="payment-section">
        <div class="select-payment">
            <h4 class="title">Select Payment Method</h4>
            <div class="payment-btn">
                <div class="custom-radio-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Test Donation
                        <span class="custom-radio"></span>
                    </label>
                </div>
                <div class="custom-radio-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Cardiant Donation
                        <span class="custom-radio"></span>
                    </label>
                </div>
                <div class="custom-radio-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Office Donation
                        <span class="custom-radio"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="amount">
            <div class="enter-amount">
                <button class="amount-btn active">Enter Your Amount</button>
            </div>
            <div class="all-amount">
                @php
                    $amount_by_10 = $donation->goal * 0.1;
                    $amount_by_15 = $donation->goal * 0.15;
                    $amount_by_20 = $donation->goal * 0.2;
                    $amount_by_25 = $donation->goal * 0.25;
                @endphp
                <button class="amount-btn" wire:click="setPrice({{ $amount_by_10 }})">
                    {{ $donation->payment_currency }} {{ number_format($amount_by_10) }}</button>
                <button class="amount-btn" wire:click="setPrice({{ $amount_by_15 }})">
                    {{ $donation->payment_currency }} {{ number_format($amount_by_15) }}</button>
                </button>
                <button class="amount-btn active" wire:click="setPrice({{ $donation->goal }})">
                    {{ $donation->payment_currency }} {{ number_format($amount_by_20) }}</button>
                </button>
                <button class="amount-btn" wire:click="setPrice({{ $amount_by_25 }})">
                    {{ $donation->payment_currency }} {{ number_format($amount_by_25) }}
                </button>
            </div>
            <div class="mt-3 w-100">
                <p class="mb-1 fw-semibold fs-5">Enter Your Amount</p>
                <input type="number" class="form-control form-control-lg custom-input w-100 d-block"
                    placeholder="1,000" wire:model="price" />
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
                            <input type="text" class="form-control custom-input" id="exampleFormControlInput1"
                                placeholder="Alex Jordan*">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="email" class="form-control custom-input" id="exampleFormControlInput2"
                                placeholder="name@example.com*">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" id="exampleFormControlInput3"
                        placeholder="Company Name*">
                </div>
            </form>
        </div>
    </div>
    <div class="details-section">
        <h4 class="pera">Address</h4>
        <div class="comment-box">
            <form action="donation-details.html" class="custom-form">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="text" class="form-control custom-input" id="exampleFormControlInput4"
                                placeholder="Postcode*">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <input type="email" class="form-control custom-input" id="exampleFormControlInput5"
                                placeholder="city*">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" id="exampleFormControlInput6"
                        placeholder="House No*">
                </div>
            </form>
        </div>
    </div>
    <div class="agreement-section">
        <div class="form-check custom-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked"> I agree with the Team Of
                service </label>
        </div>
    </div>
    <div class="flex gap-16 flex-wrap">
        <button type="submit" class="submit-btn">Donate Now</button>
        <button type="submit" class="submit-btn outline">Total Donation: $250</button>
    </div>
</div>
