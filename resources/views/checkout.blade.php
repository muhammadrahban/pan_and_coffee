@extends('layout.master')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ count(session('cart', [])) }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($products as $product)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{$product->title}}</h6>
                                <small class="text-muted">Quantity {{$product->quantity}}</small>
                            </div>
                            <span class="text-muted">${{($product->price * $product->quantity)}}</span>
                            @php
                                $total += ($product->price * $product->quantity);
                            @endphp
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{$total}}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form action="{{route('checout.create')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="full_name">Full name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="" value="" required>
                        @error('full_name')
                            <div class="invalid-feedback">
                                Valid Full name is required.
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com">
                        @error('email')
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone Number </label>
                        <input type="text" class="form-control" name="phone" placeholder="+18021234567">
                        @error('phone')
                            <div class="invalid-feedback">
                                Please enter a valid phone number for shipping updates.
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                            @error('address')
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" placeholder="Houston" required>
                            @error('city')
                                <div class="invalid-feedback">
                                    Please enter your shipping City.
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" name="country" required>
                                <option value="">Choose...</option>
                                <option value="US">United States</option>
                            </select>
                            @error('country')
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" name="state" required>
                                <option value="">Choose...</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                            @error('state')
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zip" placeholder="" required>
                            @error('zip')
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="save_info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" name="cc_name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            @error('cc_name')
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" name="cc_number" placeholder="" required>
                            @error('cc_number')
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0px">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" name="cc_expiration" placeholder="" required>
                            @error('cc_expiration')
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" name="cc_cvv" placeholder="" required>
                            @error('cc_cvv')
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
