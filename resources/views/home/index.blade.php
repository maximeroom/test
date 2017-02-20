<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose your product</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <h1>
        Choose a product!
    </h1>
    <h2>
        Click on the product you prefer.
    </h2>
    <p>
    @foreach($products as $product)
        <div class="productcontainer" onclick="selectProduct({{ $product->id }})">
            <h3>{{ $product->title }}</h3>
            <img src="{{ $product->images[4]->url }}" width="400px">
            <p>{!! $product->shortDescription !!}</p>
            <p><center><a href="{{ $product->urls[0]->value }}">Buy this product!</a></center></p>
        </div>
    @endforeach
    </p>
</div>
<div class="sidepanel">
    <h1>Related products</h1>
    @foreach($recproducts as $recproduct)
        <div class="miniproductcontainer">
            <h3>{{ $recproduct->title }}</h3>
            <img src="{{ $recproduct->images[4]->url }}" width="280px">
        </div>
    @endforeach
</div>




<script>
    function selectProduct(id){
        window.location = "/home/"+id;
    }
</script>
</body>
</html>