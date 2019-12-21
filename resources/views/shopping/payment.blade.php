@extends('layouts.layout')


@section('content')
<!--Page Content-->

<div class="container general">
    <h4 class="topheading">Checkout</h4>
    <hr class="light">

    <div class="container general-items rounded bg-warning">
        <div class="del-pickup ">
            <div class="form-check form-check-inline rounded-content">
                <input class="form-check-input" type="radio" id="inlineRadio1" name="del-method" value="delivery"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Delivery</label>
            </div>
            <div class="form-check form-check-inline rounded-content">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="del-method" value="pickup">
                <label class="form-check-label" for="inlineRadio2">Pickup</label>
            </div>
        </div>
    </div>



  @if ( Auth::check() === true)
  {{--//If already logged-in
	//Autofill user data
	
	//Directly as Form 2 (Delivery details & Payment) --}}
    <form action="../php/ooooooo.php" method="post">

        <div class="container general-items">
            <h5 class="text-secondary">We have fetched your delivery details for you</h5>

            {{-- //if hidden existingCustomer id is YES, payment.js will not validate these address data
            //and only validates credit card info.
            //Also, reCaptcha will not be shown and Place the order button will be enabled. --}}
            <input type="hidden" id="existingCustomer" name="existingCustomer" value="YES">

            <h5 class="mt-4">{{ Auth::user()->name }}</h5>
            <p>{{ Auth::user()->street_address }}<br>
                {{ Auth::user()->suburb }}<br>
                {{ Auth::user()->postcode }}<br>
                {{ Auth::user()->state }}<br>
                {{ Auth::user()->phone }}<br>
            </p>

            <button type='button' class='btn btn-outline-warning mt-1 ml-1'
                onclick="window.location.href='../php/member_account.php' ">
                <i class='fas fa-chevron-right'></i> Edit</button>
        </div>
  @else
  {{-- 
	//Not logged-in
  
  //Form 1 of 2 (Option to log-in now)
  //If this form is used to log-in at this point, flow goes through member_payment.php
  //where it validates the log-in details and SENDS BACK to payment.php --}}



    <form method="POST" action="{{ route('login') }}">
                @csrf

        <div class="container general-items">
            <h5 class="subheading">{{ __('Member Checkout') }}</h5>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone
                        else.</small>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button id="captchaBtn" type="submit" class="btn btn-primary ">{{ __('Login') }}</button>
                </div>

                <div class="form-group">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link mt-n4 ml-n2" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
        </div>
    </form>


    <hr class="light-75">


    {{-- //Form 2 of 2 (Delivery details & Payment) --}}
    <form method="POST" action="../php/ooooooo.php">
        @csrf

        {{-- <div class="container general"> --}}
        <div class="container general-items">
            <h5 class="subheading">{{ __('Guest Checkout') }}</h5>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone
                    else.</small>
            </div>

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    aria-describedby="nameHelp" placeholder="John Smithy" name="name" value="{{ old('name') }}" required
                    autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="street_address">{{ __('Street address') }}</label>
                <input type="text" class="form-control @error('street_address') is-invalid @enderror"
                    id="street_address" aria-describedby="street_addressHelp" placeholder="101 South street"
                    name="street_address" value="{{ old('street_address') }}" required autocomplete="street_address"
                    autofocus>

                @error('street_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="suburb">{{ __('Suburb') }}</label>
                <input type="text" class="form-control @error('suburb') is-invalid @enderror" id="suburb"
                    aria-describedby="suburbHelp" placeholder="Moanet" name="suburb" value="{{ old('suburb') }}"
                    required autocomplete="suburb" autofocus>

                @error('suburb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="postcode">{{ __('Postcode') }}</label>
                <input type="text" class="form-control @error('postcode') is-invalid @enderror" id="postcode"
                    aria-describedby="postcodeHelp" placeholder="5000" name="postcode" value="{{ old('postcode') }}"
                    required autocomplete="postcode" autofocus>

                @error('postcode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="state">{{ __('State') }}</label>
                <select class="form-control" name="state" id="state">
                    <option value="SA">South Australia</option>
                    <option value="NSW">New South Wales</option>
                    <option value="VIC">Victoria</option>
                    <option value="QLD">Queensland</option>
                    <option value="NT">Northern Territory</option>
                    <option value="WA">Western Australia</option>
                    <option value="CAN">Canberra</option>
                    <option value="TAS">Tasmania</option>
                </select>
            </div>


            <div class="form-group">
                <label for="phone">{{ __('Phone') }}</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    aria-describedby="phoneHelp" placeholder="0400222777" name="phone" value="{{ old('phone') }}"
                    required autocomplete="phone" autofocus>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

  @endif


        <!--     <hr class="light-75">-->
        <div class="container general-items rounded border border-dark bg-light">

            <h5 class='rounded-content text-secondary'>Total Amount ${{ Cart::total() }}</h5>
        </div>

        <div class="container general-items">
            <h5 class="subheading">Payment</h5>

            Accepted payment methods

            {{-- need csrf for payment method ajax to work --}}
            <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- for payment method change ajax --}}

            <div class="container-fluid payment mt-2 mb-4 px-0">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment-method" value="visa" checked
                            onchange="handlePaymentChange(this.value)">
                        <i class="fab fa-cc-visa fa-3x" style="color:#03a9f4;"></i>
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment-method" value="mastercard"
                            onchange="handlePaymentChange(this.value)">
                        <i class="fab fa-cc-mastercard fa-3x" style="color:#ef5350;"></i>
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment-method" value="paypal"
                            onchange="handlePaymentChange(this.value)">
                        <i class="fab fa-paypal fa-3x" style="color:#673ab7;"></i>
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment-method" value="cash"
                            onchange="handlePaymentChange(this.value)">
                        <i class="fas fa-dollar-sign fa-3x" style="color:#616161;"></i>
                    </label>
                </div>
            </div>


            <div id="paymentContent">

                <div class="form-group">
                    <label for="ccname">Name on Visa Card</label>
                    <input type="text" class="form-control" id="ccname" placeholder="John Citizen" name="ccname">
                    <span id="ccnameError" style="color: red; font-weight: normal;"></span>
                </div>
                <div class="form-group">
                    <label for="ccnum">Card number</label>
                    <input type="text" class="form-control" id="ccnum" placeholder="1111-2222-3333-4444"
                        name="cardnumber">
                    <span id="ccnumError" style="color: red; font-weight: normal;"></span>
                </div>
                <div class="form-group">
                    <label for="expmonth">Expiry month</label>
                    <input type="text" class="form-control" id="expmonth" placeholder="11" name="expmonth">
                    <span id="expmonthError" style="color: red; font-weight: normal;"></span>
                </div>
                <div class="form-group">
                    <label for="expyear">Expiry year</label>
                    <input type="text" class="form-control" id="expyear" placeholder="24" name="expyear">
                    <span id="expyearError" style="color: red; font-weight: normal;"></span>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="352" name="cvv">
                    <span id="cvvError" style="color: red; font-weight: normal;"></span>
                </div>

            </div>

            <!--For Google reCAPTCHA v2-->
            {{-- <div id="secondCaptcha" class="g-recaptcha" data-sitekey="6Ld9qpYUAAAAAHanqkRTfGt9_9xrXOGaBR9BRGnW"
                data-callback="enableBtn2"></div> --}}

        </div>

        <button id="captchaBtn2" type="submit" class="btn btn-success btn-block btn-xl"
            onclick="return validateOrderForm()"><i class="fas fa-lock"></i>&emsp;Place the Order</button>
        <small id="emailHelp" class="form-text text-danger">*Try placing an order. This is a demo web app. Check out
            the
            T&C.</small>


    </form>
</div>


@endsection


@section('extra-js')
<script>
    function handlePaymentChange(paymentSelection) 
    //this surely loads the payment content dynamically WITHOUT loading the whole page
    {
        //alert (paymentSelection);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/paymentAjax/' + paymentSelection,
            data: '_token = csrf-token, radioBtnSelection: payment1Selection',
            success: function (data) {
                $("#paymentContent").html(data.paymentContentHtmls);
            }
        });


    }
</script>

@endsection