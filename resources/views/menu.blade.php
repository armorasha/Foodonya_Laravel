@extends('layouts.layout')


@section('content')

{{-- <p>{{$all_products->pluck('item_name')}}</p>--}}

{{-- @foreach($all_products as $product)
{{ $product->item_name }}
      <br>
@endforeach --}}


<!-- Deals Here------------------------------------------------------>

<!-- Accordian Laravel------------------------------------------------------>

<div class="container-fluid accordion-base dull-bg">
<div id="accordion">

<!-- Pizzas Categorised grouping--------------------->
  @foreach($all_categories as $category)

  <div class="card">
    <div class="card-header" id="heading-{{ $category->category_id }}'">
      <h5 class="mb-0">
        <a class="collapsed text-danger" role="button" data-toggle="collapse"
            href="#collapse-{{ $category->category_id }}" aria-expanded="false"
            aria-controls="collapse-{{ $category->category_id }}">
            {{ $category->category_name }}
        </a>
      </h5>
    </div>


    <div id="collapse-{{ $category->category_id }}" class="collapse-js collapse" data-parent="#accordion"
        aria-labelledby="heading-{{ $category->category_id }}">

      <div class="card-body">
        <div class="row">

        <!--Displaying individual Pizzas Cards--------------------->
          @foreach($all_products as $product)
            @if( $category->category_id == $product->categories_category_id)
              <div class="card mx-1 my-3" style="width: 11rem;">
                <img class="card-img-top" src="../img/front_pizza.jpg" alt="supreme_img">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->item_name }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $product->price }}</h6>
                  <p class="card-text">{{ $product->item_desc }}</p>
                  <form action="/products/{{ $product->item_id }}" method="get">
                      <button class="btn btn-secondary btn-block stretched-link" type="submit">Select</button>
                  </form>
                </div>
              </div>
            @endif
          @endforeach

        </div>
      </div>
    </div>
  </div>

  @endforeach

</div>

</div>

@endsection