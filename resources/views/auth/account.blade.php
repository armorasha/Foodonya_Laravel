{{-- I added this page, not the laravel's auth made it --}}
@extends('layouts.layout')


@section('content')

<!-- Page Content -->

<div class="container general">

    @if(Session::has('message'))
    <p class="my-0 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p><br>
    @endif

    {{-- {{ Auth::user()->refresh() }} --}}

    <h4 class="topheading">Member</h4>
    <hr class="light">

    {{-- Autofill using SESSION customer data --}}

    <form action="/user/update" method="post">
        @csrf

        <div class="container general-items">
            <h5 class="subheading">Update Account Details</h5>

            {{-- if hidden existingCustomer id is NO, payment.js will validate both these 
            address data and credit card info. --}}

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    aria-describedby="nameHelp" placeholder="John Smithy" name="name" value="{{ Auth::user()->name }}"
                    required autocomplete="name" autofocus>

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
                    name="street_address" value="{{ Auth::user()->street_address }}" required
                    autocomplete="street_address" autofocus>

                @error('street_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="suburb">{{ __('Suburb') }}</label>
                <input type="text" class="form-control @error('suburb') is-invalid @enderror" id="suburb"
                    aria-describedby="suburbHelp" placeholder="Moanet" name="suburb" value="{{ Auth::user()->suburb }}"
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
                    aria-describedby="postcodeHelp" placeholder="5000" name="postcode"
                    value="{{ Auth::user()->postcode }}" required autocomplete="postcode" autofocus>

                @error('postcode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{-- {{ $state = Auth::user()->state}} --}}
            {{-- {{dd($state)}} --}}

            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" name="state" id="state">
                    <option value="SA" {{($state = Auth::user()->state) === 'SA' ? 'selected="selected"' : ''}}>South
                        Australia
                    </option>
                    <option value="NSW" {{$state === 'NSW' ? 'selected="selected"' : ''}}>New South Wales
                    </option>
                    <option value="VIC" {{$state === 'VIC' ? 'selected="selected"' : ''}}>Victoria
                    </option>
                    <option value="QLD" {{$state === 'QLD' ? 'selected="selected"' : ''}}>Queensland
                    </option>
                    <option value="NT" {{$state === 'NT' ? 'selected="selected"' : ''}}>Northern Territory
                    </option>
                    <option value="WA" {{$state === 'WA' ? 'selected="selected"' : ''}}>Western Australia
                    </option>
                    <option value="CAN" {{$state === 'CAN' ? 'selected="selected"' : ''}}>Canberra
                    </option>
                    <option value="TAS" {{$state === 'TAS' ? 'selected="selected"' : ''}}>Tasmania
                    </option>
                </select>
            </div>



            <div class="form-group">
                <label for="phone">{{ __('Phone') }}</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    aria-describedby="phoneHelp" placeholder="0400222777" name="phone" value="{{ Auth::user()->phone }}"
                    required autocomplete="phone" autofocus>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-pink btn-block btn-xl mb-4">Update</button>

        {{-- <button id="captchaBtn" type="submit"
                class="btn btn-success btn-block btn-xl mb-2">{{ __('Register') }}</button> --}}
    </form>

    <button type="button" class="btn btn-secondary btn-block btn-xl"
        onclick="location.href='../php/order.php'">Cancel</button>

</div>


@endsection