{{-- ORIGINAL AUTH TEMPLATE CODE --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- Working AUTH TEMPLATE CODE --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="street_address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Street address') }}</label>

                            <div class="col-md-6">
                                <input id="street_address" type="text"
                                    class="form-control @error('street_address') is-invalid @enderror"
                                    name="street_address" value="{{ old('street_address') }}" required
                                    autocomplete="street_address"
                                    autofocus>

                                @error('street_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="suburb" class="col-md-4 col-form-label text-md-right">{{ __('Suburb') }}</label>

                            <div class="col-md-6">
                                <input id="suburb" type="text"
                                    class="form-control @error('suburb') is-invalid @enderror"
                                    name="suburb" value="{{ old('suburb') }}" required autocomplete="suburb" autofocus>

                                @error('suburb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                                    name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postcode"
                                class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text"
                                    class="form-control @error('postcode') is-invalid @enderror"
                                    name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode"
                                    autofocus>

                                @error('postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_verified_at"
                                class="col-md-4 col-form-label text-md-right">{{ __('email_verified_at') }}</label>

                            <div class="col-md-6">
                                <input id="email_verified_at" type="text"
                                    class="form-control @error('email_verified_at') is-invalid @enderror"
                                    name="email_verified_at" value="{{ old('email_verified_at') }}" required
                                    autocomplete="email_verified_at"
                                    autofocus>

                                @error('email_verified_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="remember_token"
                                class="col-md-4 col-form-label text-md-right">{{ __('remember_token') }}</label>

                            <div class="col-md-6">
                                <input id="remember_token" type="text"
                                    class="form-control @error('remember_token') is-invalid @enderror"
                                    name="remember_token" value="{{ old('remember_token') }}" required
                                    autocomplete="remember_token"
                                    autofocus>

                                @error('remember_token')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}




@extends('layouts.layout')


@section('content')

<!-- Page content -->

<div class="container general">
    <h4 class="topheading">Membership</h4>
    <hr class="light">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="container general-items">
            <h5 class="subheading">{{ __('Register') }}</h5>

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
                    placeholder="Password" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm password') }}</label>
                <input type="password" class="form-control"
                    id="password-confirm"
                    placeholder="Password" name="password_confirmation" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

        <!--<hr class="light-75">-->

        <div class="container general-items">
            <h5 class="subheading">Delivery address</h5>

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

        <p class='mt-5'>By creating an account you agree with our <a href="terms.php">Terms & Conditions</a>.</p>
        <button id="captchaBtn" type="submit"
            class="btn btn-success btn-block btn-xl mb-2">{{ __('Register') }}</button>
        <small id="emailHelp" class="form-text text-danger">*Try placing an order. This is a demo web app. Check out the
            T&C.</small>


    </form>

    <div class="container-fluid general-items account-toggle">
        <p>Already have an account? <a href="login.php">Log in</a> here.</p>
    </div>
</div>

@endsection
