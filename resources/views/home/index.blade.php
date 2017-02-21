@extends('layouts.app')

@section('content')
<div class="main">
    <h1>
        @lang('products.title')
    </h1>
    <h2>
        @lang('products.sub_title')
    </h2>
    <p>
    @foreach($products as $product)
        <div class="productcontainer" onclick="selectProduct({{ $product->id }})">
            <h3>{{ $product->title }}</h3>
            <img src="{{ $product->images[4]->url }}" width="360px">
            <p>{!! $product->shortDescription !!}</p>
            <p><center><a href="{{ $product->urls[0]->value }}">@lang("products.buy_product")</a></center></p>
        </div>
    @endforeach
    </p>
</div>
<div class="sidepanel">
    <h1>@lang('products.side_title')</h1>
    @foreach($recproducts as $recproduct)
        <div class="miniproductcontainer">
            <h3>{{ $recproduct->title }}</h3>
            <img src="{{ $recproduct->images[4]->url }}" width="280px">
        </div>
    @endforeach
</div>




<script>
    function selectProduct(id){
        window.location = "/Product/"+id;
    }
</script>
@endsection
