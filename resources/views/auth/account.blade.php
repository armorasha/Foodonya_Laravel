{{-- I made this page, not the laravel's auth made it --}}
@extends('layouts.layout')


@section('content')

<!-- Page Content -->
<div class="container general">
    <h4 class="topheading">Member</h4>
    <hr class="light">

    {{-- Autofill using SESSION customer data --}}

    <form action="/user/update" method="post">

        <div class="container general-items">
            <h5 class="subheading">Update Account Details</h5>

            {{-- if hidden existingCustomer id is NO, payment.js will validate both these 
            address data and credit card info. --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="cust_name" placeholder="John Citizen" name="cust_name"
                    value="{{ Auth::user()->name }}">
                <span id="nameError" style="color: red; font-weight: normal;"></span>
            </div>
            <div class="form-group">
                <label for="street">Street address</label>
                <input type="text" class="form-control" id="street" placeholder="1000 Model Street" name="street"
                    value="{{ Auth::user()->street_address }}">
                <span id="streetError" style="color: red; font-weight: normal;"></span>
            </div>
            <div class="form-group">
                <label for="suburb">Suburb</label>
                <input type="text" class="form-control" id="suburb" placeholder="Moana" name="suburb"
                    value="{{ Auth::user()->suburb }}">
                <span id="suburbError" style="color: red; font-weight: normal;"></span>
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="text" class="form-control" id="postcode" placeholder="5000" name="postcode"
                    value="{{ Auth::user()->postcode }}">
                <span id="postcodeError" style="color: red; font-weight: normal;"></span>
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
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="0444222000" name="phone"
                    value="{{ Auth::user()->phone }}">
                <span id="phoneError" style="color: red; font-weight: normal;"></span>
            </div>

        </div>


        <button type="submit" class="btn btn-pink btn-block btn-xl mb-4"
            >Update</button>

            <button id="captchaBtn" type="submit"
                class="btn btn-success btn-block btn-xl mb-2">{{ __('Register') }}</button>
    </form>

    <button type="button" class="btn btn-secondary btn-block btn-xl"
        onclick="location.href='../php/order.php'">Cancel</button>

</div>


@endsection