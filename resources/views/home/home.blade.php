@extends('layouts.app')
@section('title', 'Smart.Com')
@section('content1')
<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Создай свой дом мечты вместе с Smart.Com</div>
										<div class="home_slider_subtitle">Умные товары помогают экономить время, электроэнергию и повысят вашу безопасность</div>
										<div class="button button_light home_button"><a href="/category/sensors">Начать</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_2.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Удобное управление через мобильное приложение</div>
										<div class="home_slider_subtitle">Планирование задач, настройка функций, просмотр камер и все это в вашем смартфоне</div>
										<div class="button button_light home_button"><a href="/category/devices2">Начать</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_3.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Вы и ваше имущество всегда под охраной</div>
										<div class="home_slider_subtitle">Большой выбор камер и систем охранны, предупреждающих вас и группу реагирования о проникновении в ваш дом</div>
										<div class="button button_light home_button"><a href="/category/devices">Начать</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(/images/devices3.jpg)"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">						
						<div>
							<div class="avds_discount">
								
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title">Устройства расширения</div>
						<div class="avds_link"><a href="/category/devices3">Перейти</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(/images/devices.jpg)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Исполнительные устройства</div>
						<div class="avds_link avds_link_large"><a href="/category/devices">Перейти</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						@foreach($products as $product)
							<!-- Product -->

							@php
								$image = '';
								if(count($product->images) > 0){
								$image = $product->images[0] ['img'];
								} else{
								$image = 'no_image.png';
								}
							@endphp

							<div class="product">
								<div class="product_image"><img src="images/{{$image}}" alt=""></div>
								
								<div class="product_content">
									<div class="product_title"><a href="{{route('showProduct',['categories ',$product ->id])}}">{{$product->title}}</a></div>
									@if($product->new_price !=null)
										<div style="text-decoration: line-through">{{$product->price}} Рублей</div>
										<div class="product_price">{{$product ->new_price}} Рублей</div>
									@else
										<div class="product_price">{{$product ->price}} Рублей</div>
									@endif
								</div>
							</div>
						@endforeach

					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Ad -->

	

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Бесплатная доставка по всему миру</div>
						<div class="icon_box_text">
					
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Бесплатные возвраты</div>
						<div class="icon_box_text">
							
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">Поддержка 24/7</div>
						<div class="icon_box_text">
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

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
@endsection
