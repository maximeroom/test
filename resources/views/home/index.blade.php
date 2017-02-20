<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose your product</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>
    Choose a product!
</h1>
<h2>
    Click on the product you prefer.
</h2>
<p>
    @foreach($products as $product)
        <div class="productcontainer">
            <h3>{{ $product->title }}</h3>
            <img src="{{ $product->images[4]->url }}" width="400px">
        </div>
    @endforeach
</p>
</body>
</html>