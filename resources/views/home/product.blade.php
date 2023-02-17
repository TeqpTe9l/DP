@extends('layouts.app')
@section('title', 'Товар')
@section('content1')

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
<link rel="stylesheet" type="text/css" href="/styles/product.css">
<link rel="stylesheet" type="text/css" href="/styles/product_responsive.css">
</head>

<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(/images/{{$cat ->img}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$item->title}}<span>.</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
					@php
						$image = '';
							if(count($item->images) > 0){
						$image = $item->images[0] ['img'];
							} else{
						$image = 'no_image.png';
						}
					@endphp
					<div class="details_image_large"><img src="/images/{{$image}}" alt="{{$item->title}}"><div class=""><a href="#"></a></div></div>
					<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
					@if($image == 'no_image.png')					
						@else
						@foreach($item->images as $img)
							@if($loop->first)
								<div class="details_image_thumbnail active" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->title}}"></div>
							@else
								<div class="details_image_thumbnail" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->title}}"></div>
							@endif
						@endforeach
					@endif
					</div>
					</div>
					</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name">{{$item->title}}</div>
							@if($item->new_price !=null)
								<div class="details_discount">{{$item->price}} Рублей</div>
								<div class="details_price">{{$item ->new_price}} Рублей</div>
							@else
								<div class="product_price">{{$item ->price}} Рублей</div>
							@endif

							<!— In Stock —>
								<div class="in_stock_container">
								<div class="availability">Наличие:</div>
							@if($item->in_stock)
								<span>Есть в наличии</span>
							@else
								<span style="color: #cc0000">Нет в наличии</span>
							@endif
								</div>
								<div class="details_text">
								<p>{{$item->description}}</p>
						</div>

						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<div class="product_quantity clearfix">
								<span>Кол-во</span>
								<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
								<div class="quantity_buttons">
									<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
									<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
								</div>
							</div>
							<div class="cart_button_pos">
								<form action="{{route('cart.create', $item)}}" method="post">
									@csrf
									@auth
									<input type="hidden" id='user_id' name="user_id" value="{{Auth::user()->id}}">
									@endauth
									<input type="hidden" id='product_id' name="product_id" value="{{$item->id}}">
									<input type="hidden" id='product_name' name="product_name" value="{{$item->title}}">
									<input type="hidden" id="img" name="img" value="{{isset($item->images[0]->img) ? $item->images[0]->img : 'no_image.png'}}">
									<input type="hidden" id='price' name="price" value="{{$item->new_price ? $item->new_price : $item->price}}">
									<input type="hidden" id='quantity' name="quantity" value="1">
									<input type="submit" class="button cart_button" value="В корзину">
								</form>
							</div>
							
							
						</div>

						<!-- Share -->
						<div class="details_share">
							<span>Поделиться:</span>
							<ul>
								<li><a href="https://www.pinterest.it/pin/882001908248616967/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<!-- Products -->

	
	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Подпишитесь на нашу рассылку новостей</div>
						
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Подписаться</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/styles/bootstrap4/popper.js"></script>
	<script src="/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/plugin/greensock/TweenMax.min.js"></script>
	<script src="/plugin/greensock/TimelineMax.min.js"></script>
	<script src="/plugin/scrollmagic/ScrollMagic.min.js"></script>
	<script src="/plugin/greensock/animation.gsap.min.js"></script>
	<script src="/plugin/greensock/ScrollToPlugin.min.js"></script>
	<script src="/plugin/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="/plugin/Isotope/isotope.pkgd.min.js"></script>
	<script src="/plugin/easing/easing.js"></script>
	<script src="/plugin/parallax-js-master/parallax.min.js"></script>
	<script src="/js/product.js"></script>
@endsection