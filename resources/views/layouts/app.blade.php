<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugin/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugin/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugin/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/responsive.css">
	<link rel="shortcut icon" href="/images/favicon.png" type="image/png">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="super_container">

	<header class="header">
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a href="{{route('home')}}">Smart.Com</a></div>
							<nav class="main_nav">
								<ul>
									<li class="hassubs active">
										<a href="{{route('home')}}">Главная</a>
										<ul>
											<li><a href="{{route('cart')}}">Корзина</a></li>
											<li><a href="{{route('checkout')}}">Проверить</a></li>
											<li><a href="{{route('contact')}}">Контакты</a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Категории</a>
										<ul>
											@foreach($categories as $category)
												<li><a href="{{route('showCategory', $category->alias)}}">{{$category->title}}</a></li>
											@endforeach
										</ul>
									</li>
									<li><a href="{{route('contact')}}">Контакты</a></li>
								</ul>
							</nav>
							<div class="header_extra ml-auto">
								<div class="shopping_cart">
									<a href="{{route('cart')}}">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											<g>
												<path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
											</g>
										</svg>
										<div>Корзина</div>
									</a>
								</div>
								
								<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	
		
        
		<div class="header_social">     

            	<ul class="navbar-nav ms-auto">
                    
					@guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ Auth::user()->name }} | {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               
                            </li>
                    @endguest
                </ul>

                <ul>
                    <li><a href="https://www.pinterest.it/pin/882001908248616967/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
		</div>
	</header>



	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">
							
				
				<ul class="page_menu_nav menu_mm">
					
					<li class="page_menu_item has-children menu_mm">
						
						<a href="{{route('home')}}">Главная<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="{{route('cart')}}">Корзина<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="{{route('checkout')}}">Проверить<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="/{{route('contact')}}">Контакты<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="#">Категории<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							@foreach($categories as $category)
								<li class="page_menu_item menu_mm"><a href="{{route('showCategory', $category->alias)}}">{{$category->title}}</a></li>
							@endforeach
						</ul>
					</li>
					
					<li class="page_menu_item menu_mm"><a href="{{route('contact')}}">Контакты<i class="fa fa-angle-down"></i></a></li>
					@guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ Auth::user()->name }} | {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                             
                            </li>
                    @endguest
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
        
			<ul>
				<li><a href="https://www.pinterest.it/pin/882001908248616967/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>

        @yield('content1')  
	
	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(/images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="{{route('home')}}">Smart.Com.</a></div>
						<div class="copyright ml-auto mr-auto"></div>
						<div class="footer_social ml-lg-auto">
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
	</footer>
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
<script src="/js/custom.js"></script>
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
@yield('custom_js')
</body>
</html>