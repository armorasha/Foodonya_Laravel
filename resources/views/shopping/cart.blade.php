@extends('layouts.layout')


@section('content')
<!--Page Content-->

<div class="container general page-filler">
    <h4 class="topheading">Cart</h4>
    <hr class="light">

    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if (session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
    </div>
    @endif



{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> for quantity-amount change ajax --}}
    {{-- <div id='msg'>This message will be replaced using Ajax.
        Click the button to replace the message.</div>
    
        <button type="submit" class="btn btn-success "
            onclick="getMessage()">Replace Message</button> --}}


    @if (sizeof(Cart::content()) > 0)

    <button type='button' class='btn btn-outline-warning mt-1 ml-1 outline-warning-attention'
        onclick="window.location.href = '{{ url('/menu') }}'"><i
            class='fas fa-chevron-left'></i> Add more</button>
    <div class="container">
        <table class="table table-striped view-table p-3 my-5">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Size</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Button</th>
                </tr>
            </thead>
            <tbody>


                {{-- need csrf for quantity-amount change ajax to work --}}
                <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- for quantity-amount change ajax --}}
                @foreach (Cart::content() as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->options->size }}</td>
                    <td>
                        <select class="quantity" data-id="{{ $item->rowId }}">
                            <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                            <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                            <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                            <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                            <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                            <option {{ $item->qty == 6 ? 'selected' : '' }}>6</option>
                            <option {{ $item->qty == 7 ? 'selected' : '' }}>7</option>
                            <option {{ $item->qty == 8 ? 'selected' : '' }}>8</option>
                            <option {{ $item->qty == 9 ? 'selected' : '' }}>9</option>
                        </select>
                    </td>
                    <td>${{ $item->price }}</td>
                    <td>${{ $item->subtotal }}</td>

                    <td>
                        <form action="{{ url('/cart', [$item->rowId]) }}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type=submit name=remove class="small-button remove" id=remove
                                value=Remove>&emsp;-&emsp;</button>
                 
                    {{-- <input type="hidden" name="_method" value="DELETE">
                          <input type="submit" class="btn btn-danger btn-sm" value="Remove"> --}}
                    </form>
                    </td>
                </tr>

                @endforeach


                {{--Display the subtotal, gst and total price --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right">Subtotal</td>
                    <td>${{ Cart::subtotal() }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right">GST</td>
                    <td>${{ Cart::tax() }}</td>
                    <td></td>
                </tr>

                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: right"><b>Your Total</b></td>
                <td class="table-bg">${{ Cart::total() }}</td>
                <td></td>
                <td></td>
                </tr>

            </tbody>
        </table>


        <form action="{{ url('/payment')}}"> <button type="submit"
                class="btn btn-success btn-block btn-xl">Proceed to
            Checkout</button>
            <small id="emailHelp" class="form-text text-danger">*Try placing an order. This is a demo web app. Check out
                the
                T&C.</small>

        </form>



        @else

        <h5 class='my-5'>Your Shopping cart is empty.</h5>
        <button type='button' class='btn btn-outline-warning mt-1 ml-1'
            onclick="window.location.href = '{{ url('/menu') }}'"><i
                class='fas fa-chevron-left'></i> Continue Shopping</button>

        @endif










    </div>
</div>



@endsection


@section('extra-js')

{{-- for ajax test --}}
{{-- <script>
    function getMessage() { //works

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type: 'POST',
            url: '/cartAjax',
            data: '_token = csrf-token',
            success: function (data) {
                $("#msg").html(data.msg);
            }
        });
    }
</script> --}}

<script> //not sure this is fully dynamically loading quantity-amount as this reloads the whole page whenever qty is changed.
    (function () {

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.quantity').on('change', function() {
            var id = $(this).attr('data-id')
            $.ajax({
                type: "PATCH",
                url: '{{ url("/cart") }}' + '/' + id,
                data: {
                'quantity': this.value,
                },
                success: function(data) {
                window.location.href = '{{ url('/cart') }}';
                }
            });
        });
    })();
</script>

@endsection