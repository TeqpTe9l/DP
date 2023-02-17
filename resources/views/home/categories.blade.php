@extends('layouts.app')
@section('title', $cat->title)
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
<link rel="stylesheet" type="text/css" href="/styles/categories.css">
<link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
</head>

<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(/images/{{$cat ->img}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$cat->title}}<span>.</span></div>
								<div class="home_text"><p>{{$cat->desc}}</p></div>
							</div>
						</div>
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
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Показано <span>{{$cat->products->count()}}</span> товаров</div>
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Сортировать</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-order="default"><span>По умолчанию</span></li>
											<li class="product_sorting_btn" data-order="price-low-high"><span>Цена по возрастанию</span></li>
											<li class="product_sorting_btn" data-order="price-high-low"><span>Цена по убыванию</span></li>
											<li class="product_sorting_btn" data-order="price-a-z"><span>От а-я</span></li>
											<li class="product_sorting_btn" data-order="price-z-a"><span>От я-а</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">				
					<div class="product_grid">
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
					</div>
					{{$products->appends(request()->query())->links('pagination.paginate')}}					
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Бесплатная доставка по всему миру</div>
						<div class="icon_box_text">
						
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Бесплатные возвраты</div>
						<div class="icon_box_text">
			
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="/images/icon_3.svg" alt=""></div>
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

	@section('custom_js')

	<script>
		$(document).ready(function () {
			$('.product_sorting_btn').click(function () {
				let orderBy = $(this).data('order')
				$('.sorting_text').text($(this).find('span').text())
				$.ajax({
					url: "{{route('showCategory', $cat->alias)}}",
					type: "GET",
					data: {
					orderBy: orderBy,
					page: {{isset($_GET['page']) ? $_GET['page'] : 1}},
					},
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: (data) => {
						let positionParameters = location.pathname.indexOf('?');
						let url = location.pathname.substring(positionParameters,location.pathname.length);
						let newURL = url + '?';
						newURL += 'orderBy' + orderBy + "&page={{isset($_GET['page']) ? $_GET['page'] : 1}}";
						history.pushState({}, '', newURL);
						
						$('.product_grid').html(data)
						
						$('.product_grid').isotope('destroy')
						$('.product_grid').imagesLoaded( function() {
							var grid = $('.product_grid').isotope({
								itemSelector: '.product',
								layoutMode: 'fitRows',
								fitRows:{
									gutter: 30
								}
							});
						});
					}
				});
			})
		})
	</script>

		
	@endsection