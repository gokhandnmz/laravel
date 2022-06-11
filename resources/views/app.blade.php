<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}" class="{{ Auth::check() ? 'active' : '' }}">

<head>
	<meta charset="UTF-8">
	<meta name="author" content="{{ settings()->siteadi }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')" />
	<!-- twitter -->
	<meta name="twitter:title" content="@yield('title')">
	<meta name="twitter:description" content="@yield('description')">
	<meta name="twitter:image" content="{{ settings()->logo }}">
	<meta name="twitter:card" content="summary_large_image">
	<!-- facebook -->
	<meta property="og:title" content="@yield('title')" />
	<meta property="og:url" content="https://rethasoft.com" />
	<meta property="og:image" content="{{ settings()->logo }}" />
	<meta property="og:description" content="@yield('description')" />
	<meta property="og:site_name" content="{{ settings()->siteadi }}" /> 
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<meta name="robots" content="index">
	<link rel=”canonical” href="{{ url("/") }}"/>

    <base href="{{ url('/') }}">
	<title>@yield('title')</title>
	<link href="{{ asset('assets/images/favicon.png') }}" rel="shortcut icon" type="image/png">
	<!-- REVOLUTION LAYERS STYLES -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/layers.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/settings.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/navigation.css') }}">
	<!-- Plugin -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-editable.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
	@if (Auth::check())
	<div class="confirmation-bar">
		<button class="btn btn-sm btn-success yayimla">Değişiklikleri Yayımla</button>
	</div>
	@endif
	<!-- Preloader Start -->
	<div class="preloader"></div>
	<!-- Preloader End -->
	<!-- header Start -->
	<header class="header-style-two">
		<div class="header-wrapper">
			<div class="header-top-area bg-secondary-color d-none d-lg-block">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 header-top-left-part">
							{{-- <span class="address"><i class="webexflaticon webex-flaticon-placeholder-1"></i> {{ settings()->adres }}</span>
							<span class="phone"><i class="webexflaticon webex-flaticon-send"></i> {{ settings()->eposta }}</span> --}}
							<span id="header_bar" class="editable-tags">{{ __("header_bar") }}</span>
						</div>
						<div class="col-lg-6 header-top-right-part text-right">
							<ul class="social-links">
								<li><a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
							</ul>
							{{-- <div class="language">
								<a class="language-btn" href="javascript:void(0)"><i class="webexflaticon webex-flaticon-internet"></i> English</a>
								<ul class="language-dropdown">
									<li><a href="javascript:void(0)">English</a></li>
									<li><a href="javascript:void(0)">Bangla</a></li>
									<li><a href="javascript:void(0)">French</a></li>
									<li><a href="javascript:void(0)">Spanish</a></li>
									<li><a href="javascript:void(0)">Arabic</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
			<div class="header-middle">
				<div class="container">
					<div class="row">
						<div class="col-md-12 d-flex align-items-center justify-content-between">
							<a class="navbar-brand logo" href="{{ url('/') }}">
								<img id="logo-image" class="img-center" src="{{ asset('uploads/'.settings()->logo) }}" alt="{{ settings()->siteadi }}">
							</a>
							<div class="topbar-info-area d-none d-sm-flex align-items-center justify-content-between">
								<div class="d-none d-md-flex align-items-center mr-3">
									<i class="webexflaticon webex-flaticon-globe-1 text-primary-color"></i>
									<div>
										<h6>Adres</h6>
										<a class="text-gray">{{ settings()->adres }}</a>
									</div>
								</div>
								<div class="d-flex align-items-center mr-3">
									<i class="webexflaticon webex-flaticon-mail-1 text-primary-color"></i>
									<div>
										<h6>E-posta</h6>
										<a class="text-gray" href="mailto:{{ settings()->eposta }}">{{ settings()->eposta }}</a>
									</div>
								</div>
								<div class="d-none d-lg-flex align-items-center">
									<i class="webexflaticon webex-flaticon-phone-1 text-primary-color"></i>
									<div>
										<h6>Bizi Arayın</h6>
										<a class="text-gray" href="tel:{{ settings()->telefon }}"> {{ settings()->telefon }}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-navigation-area three-layers-header">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="main-menu">
								<nav id="mobile-menu">
									<ul>
										@if (menu())

											@foreach (menu() as $item)
												@php
													$modules = App\Models\Menu::get_modules( $item->modul );
												@endphp

												<li class="
												{{ $modules != "" ? 'has-sub' : '' }}
												{{ $item->childs->isNotEmpty() ? 'has-sub' : '' }}
												
												">
												<a href="
												{{ 
													$item->ozel_url != "" 
													? url($item->ozel_url)
													: url($item->slug != NULL ? $item->slug : '') 
												}}"
												{{ $item->ozel_url != "" ? 'target="_blank"' : '' }}
												>{{ $item->baslik }}</a>
													@if ($modules != "")
														<ul class="sub-menu">
														@foreach ($modules as $mItem)
															<li><a href="{{ url($item->modul.'/'.$mItem->slug) }}">{{ $mItem->baslik }}</a></li>	
														@endforeach
														</ul>
													@endif

													@if($item->childs->isNotEmpty())
														@include('theme.menu', ['childs' => $item->childs])
													@endif
												</li>

											@endforeach
										@endif
									</ul>
								</nav>
							</div>
							<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header End -->
	@yield('content')
	<!-- Footer Area Start -->
	<footer class="footer">
		<div class="footer-main-area" data-background="images/bg/footer-bg.png">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="widget footer-widget">
							<img src="images/logo-footer.png" alt="" class="mrb-20">
							<address class="mrb-25">
								<p class="text-light-gray">Pendik / Istanbul / Türkiye</p>
								<div class="display-inline-block mrb-10 w-100"><a href="javascript:void(0)" class="text-light-gray"><i class="fa fa-phone mrr-10"></i>{{ settings()->telefon }}</a></div>
								<div class="display-inline-block mrb-10 w-100"><a href="javascript:void(0)" class="text-light-gray"><i class="fa fa-envelope-o mrr-10"></i>{{ settings()->eposta }}</a></div>
								<div class="display-inline-block w-100"><a href="javascript:void(0)" class="text-light-gray"><i class="fa fa-globe mrr-10"></i>www.demosite.com</a></div>
							</address>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3">
						<div class="widget footer-widget">
							<h5 class="widget-title text-white mrb-30">Hızlı Menü</h5>
							<ul class="footer-widget-list">
								@if (footerMenu())
									@foreach (footerMenu() as $footerItem)
										<li><a href="{{ url($footerItem->slug != NULL ? $footerItem->slug : '') }}">{{ $footerItem->baslik }}</a></li>	
									@endforeach
								@endif
							</ul>
						</div>
					</div>
					<div class="col-xl-5 col-lg-5 col-md-5">
						<div class="widget footer-widget">
							<h5 class="widget-title text-white mrb-30">Güncel Haberler</h5>
							@if (haberler(3))
								@foreach (haberler(3) as $footerHaber)
								<div class="single-post media mrb-20">
									<div class="post-image mrr-20">
										<img src="{{ asset('uploads/thumbnail/'.$footerHaber->image) }}" alt="{{ $footerHaber->baslik }}" style="height:100px;">
									</div>
									<div class="post-content media-body align-self-center">
										<h5 class="text-light-gray mrb-10"><a href="{{ url('haber/'.$footerHaber->slug) }}">{{ $footerHaber->baslik }}</a></h5>
										<h6 class="text-dark-light f-weight-500"><i class="fa fa-clock-o mrr-5"></i>{{ date('d-m-Y', strtotime($footerHaber->created_at)) }}</h6>
									</div>
								</div>	
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="text-left">
							<span class="text-light-gray">Copyright © 2022 by <a class="text-primary-color" target="_blank" href="https://rethasoft.com"> Rethasoft</a> | All rights reserved </span>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<ul class="footer-nav text-right">
							@if (sabit_sayfalar())
								@foreach (sabit_sayfalar() as $sayfa)
									<li class="footer-nav-item">
										<a href="{{ url($sayfa->slug.'.html') }}" class="footer-nav-link text-light-gray" target="_blank">{{ $sayfa->baslik }}</a>
									</li>
								@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->
	<!-- BACK TO TOP SECTION -->
	<div class="back-to-top bg-gradient-color">
		<i class="fa fa-angle-up"></i>
	</div>
	<!-- Integrated important scripts here -->
	<script src="{{ asset('assets/js/jquery.v1.12.4.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.v1.12.4.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery-core-plugins.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script src="{{ asset('panel/assets/js/pages/jquery.editable.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<!-- Revolution Slider -->
	<script type="text/javascript" src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/slider_v1.js') }}"></script>
	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
</body>

</html>