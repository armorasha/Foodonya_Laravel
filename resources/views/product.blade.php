<!doctype html>
<html lang="en">
    <head>
    </head>
    <body>
    {{-- <h1>{{$selected_product->item_name}}</h1>
    <h3>{{$selected_product->item_desc}}</h3> --}}

     <p>{{$selected_product->pluck('item_name')}}</p>

    @foreach($selected_product as $product)
    {{ $product->item_name }}
    <br>
    @endforeach


    </body>
</html>