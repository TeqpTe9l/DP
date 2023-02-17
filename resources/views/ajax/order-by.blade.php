<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugin/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugin/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugin/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
    </head>
@foreach($products as $product)
@php
    $image = '';
    if(count($product->images) > 0){
        $image = $product->images[0] ['img'];
    } else{
        $image = 'no_image.png';
    }
@endphp
    <!— Product —>
    <div class="product">
        <div class="product_image"><img src="/images/{{$image}}" alt=""></div>
        
        <div class="product_content">
            <div class="product_title"><a href="{{route('showProduct',['categories ',$product ->id])}}">{{$product ->title}}</a></div>
            @if($product->new_price !=null)
            <div style="text-decoration: line-through">{{$product->price}} Рублей</div>
            <div class="product_price">{{$product ->new_price}} Рублей</div>
            @else
            <div class="product_price">{{$product ->price}} Рублей</div>
            @endif
        </div>
    </div>
@endforeach