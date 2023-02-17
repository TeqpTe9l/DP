@extends('layouts.app')
@section('title', 'Корзина')
@section('content1')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/styles/cart.css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_responsive.css">
</head> 

<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/contact.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="{{route('home')}}">Главная</a></li>									
										<li>Корзина покупок</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Товар</div>
						<div class="cart_info_col cart_info_col_price">Цена</div>
						<div class="cart_info_col cart_info_col_quantity">Колличество</div>
						<div class="cart_info_col cart_info_col_total">Всего</div>
						<div class="cart_info_col cart_info_col_delete">Удалить</div>
						
					</div>
				</div>
			</div>
			@foreach($elements as $el)
			<div class="row cart_items_row">
				<div class="col">
					
					<!-- Cart Item -->
				
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img src="/images/{{$el->img}}" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="{{route('showProduct',['categories ',$el->product_id])}}">{{$el->product_name}}</a></div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price">{{$el->price}} Рублей</div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<td>
									<form action="{{route('cart.plus', $el)}}" method='post'>
										@csrf
										<input type="submit" class="btn btn-bordered" value="+">
									</form>
								</td>
								<td>
									{{$el->quantity}}
								</td>
								<td>
									<form action="{{route('cart.minus', $el)}}" method='post'>
										@csrf
										<input type="submit" class="btn btn-bordered" value="-">
									</form>
								</td>
							</div>
						</div>
						<!-- Total -->
						<div class="cart_item_total"><span class="price">{{$el->price * $el->quantity}} руб.</span></div>
						<div class="cart_item_total"><form action="{{route('cart.destroy', $el)}}" method="post">
							@csrf
							@method('DELETE')
							<button>
								<i class="fa fa-trash-o" onclick="event.preventDefault();this.closest('form').submit();"></i>
							</button>
						</form></div>
					</div>

				</div>				
			</div>
			@endforeach	
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="{{route('home')}}">К покупкам</a></div>
						<div class="cart_buttons_right ml-lg-auto">
							<div class="button clear_cart_button"><a href="{{route('cart.clear')}}">Очистить</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">
					
					<!-- Delivery -->
					
					<!-- Coupon Code -->
					
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Всего в корзине</div>
						<div class="section_subtitle">Окончательная информация</div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Доставка</div>
									<div class="cart_total_value ml-auto">Бесплатно</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Всего</div>
									<div class="cart_total_value ml-auto">{{$total}} Рублей</div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button"><a href="#">Перейти к оформлению </a></div>
					</div>
				</div>
			</div>
		</div>
			
	</div>
    @endsection