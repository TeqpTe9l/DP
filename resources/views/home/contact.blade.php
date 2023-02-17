@extends('layouts.app')
@section('title', 'Контакты')
@section('content1')

<head>
<link rel="stylesheet" type="text/css" href="/styles/contact.css">
<link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
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
										<li>Контакты</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->
	
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						<div class="section_title">Связаться</div>
					
						<div class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="contact_name">Фамилия*</label>
										<input type="text" id="contact_name" class="contact_input" required="required">
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="contact_last_name">Имя*</label>
										<input type="text" id="contact_last_name" class="contact_input" required="required">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Предмет</label>
									<input type="text" id="contact_company" class="contact_input">
								</div>
								<div>
									<label for="contact_textarea">Сообщение*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
								</div>
								<button class="button contact_button"><span>Отправить</span></button>
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<div class="contact_info_title">Маркетинг</div>
							<ul>
								<li>Телефон: <span>+53 345 7953 3245</span></li>
								<li>Почта: <span>yourmail@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Доставка и возвраты</div>
							<ul>
								<li>Телефон: <span>+53 345 7953 3245</span></li>
								<li>Почта: <span>yourmail@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Информация</div>
							<ul>
								<li>Телефон: <span>+53 345 7953 3245</span></li>
								<li>Почта: <span>yourmail@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
    @endsection