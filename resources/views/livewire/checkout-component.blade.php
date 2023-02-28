<div class="container" style="margin: 30px 200px;">
    {{-- @php
        echo '<pre>';
        print_r($invoiceItem);
    @endphp --}}
    <div class="ms-5 row justify-content-center align-items-center g-2">
        <div class="col-lg-10">
            @if (Session::has('stripe_error'))
                <div class="alert alert-danger">{{ session('stripe_error') }}</div>
            @endif
            <div class="card" style="border: 1px solid gray; border-radius:10px;">
                <div class="text-start bg-success" style="padding: 10px;">
                    <h3>Enter your deatails</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" wire:submit.prevent="confirmPayment">
                        <div class="row justify-content-center align-items-center g-2" style="padding-left: 50px;">

                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    wire:model="name" placeholder="Name" disabled>
                                @error('name')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" name="email" id="email"
                                    wire:model="email" placeholder="Examle@abc.com" disabled>
                                @error('email')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="phone">Phone:</label>
                                <input class="form-control" type="text" name="phone" id="phone"
                                    wire:model="phone" placeholder="1234-5678901">
                                @error('phone')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="address">Address:</label>
                                <input class="form-control" type="text" name="address" id="address"
                                    wire:model="address" placeholder="Your address">
                                @error('address')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="city">City:</label>
                                <input class="form-control" type="text" name="city" id="city"
                                    wire:model="city" placeholder="Islamabad">
                                @error('city')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="country">Country:</label>
                                <input class="form-control" type="text" name="country" id="country"
                                    wire:model="country" placeholder="Country">
                                @error('country')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="zip">Zip code</label>
                                <input class="form-control" type="text" name="zip" id="zip"
                                    wire:model="zip" placeholder="Zip Code">
                                @error('zip')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="name">Card Number:</label>
                                <input class="form-control" type="text" name="card_number" id=""
                                    wire:model="card_number" placeholder="1232354">
                                @error('card_number')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="expiry_date">Expiry Month:</label>
                                <select class="form-control" name="expiry_month" id=""
                                    wire:model="expiry_month">
                                    <option value="" selected>select month</option>
                                    <option value="1">January</option>
                                    <option value="2">Fabruary</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                @error('expiry_month')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="expiry_date">Expiry year:</label>
                                <input class="form-control" type="text" name="expiry_year" id=""
                                    wire:model="expiry_year" placeholder="2023">
                                @error('expiry_year')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-lg-5" style="margin: 10px 20px;">
                                <label for="cvc">CVC:</label>
                                <input class="form-control" type="text" name="cvc" id="name"
                                    wire:model="cvc" placeholder="CVC">
                                @error('cvc')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-lg-12" style="margin: 20px;">
                                <button id="odr-btn" type="submit" class="btn btn-danger"
                                    @if ($toggler) {{ 'disabled' }} @endif>Submit Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
