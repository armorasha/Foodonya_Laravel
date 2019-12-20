@extends('layouts.layout')

<!-- For pushing javascipt, css files that is needed in this page -->
@push('jsScriptFileLoad') {{-- one way of doing this. another method in cart.blade.php for updating quantity in that page --}}
<!-- Styles -->
{{-- <link href="{{ asset('css/pizza.css') }}" rel="stylesheet"> --}}
<!-- Scripts -->
<script src="{{ asset('/js/select_page.js')}}"></script>
@endpush



@section('content')
<!--Page Content-->

{{-- <form action="/cart/{{ $product, $each_size->size_code, $each_size->price }}" method="get"> --}}
{{--     <form
        action="/cart/add-to-cart/{{ $product->item_id, $product->item_name, $product_sizes->price, 0, ['size' => $product_sizes->size_code] }}"
        method="get"> --}}
    <form action="/add-to-cart" method="get"> {{-- no need for sending any parameters. form will automatically send the values of everything in the form to the next page --}}
        <div class="container-fluid page-filler dull-bg">
        <div class="container select text-center bt-10">
            <div class="row">
                <button type="button" class="btn btn-outline-warning mt-1 ml-1"
                    onclick="window.location.href='/menu'"><i class="fas fa-chevron-left"></i>
                    Back
                </button>
                    {{-- ^^^ onclick="window.history.back()" This is faster loading but will not work if there is no page to go back to.--}}
            </div>

            {{-- vvv These hidden input values will be sent to the controller on form submit  vvv --}}
            <input name="item_id" type="hidden" id="item_id" value="{{ $product->item_id }}"> 
            <input name="item_name" type="hidden" id="item_name" value="{{ $product->item_name }}">

            <!-- $product comes from data binding with ProductsController -->
            <h5 class="bg-light text-dark p-3 my-2">{{ $product->item_name }}</h5>

            <h6 class="mt-4">Quantity</h6>

            <button type="button" class="btn btn-secondary" onclick="qtySubOne()">-</button>
            <input class="qtybox mx-auto my-2 form-control-lg" type="text" value="0" name="item_qty" id="currentQty">
            <button type="button" class="btn btn-success" onclick="qtyAddOne()">+</button>


            <h6 class="mt-4 mb-3">Size</h6>

            <div class="form-group">
                <select class="form-control" name="sizeOptions">
                @foreach($product_sizes as $each_size)
                    <option value="{{ $each_size->size_code }}">
                        {{ $each_size->size_code }}&nbsp - &nbsp${{ $each_size->price }}
                    </option>
                @endforeach

                </select>
            </div>


            <button type="submit" class="btn btn-success btn-block" onclick="return isQtyValid()">Add to Cart</button>
            <br>
        </div>
    </div>
</form>



@endsection

{{-- for javascipt see @push('jsScriptFileLoad') section on the top --}}