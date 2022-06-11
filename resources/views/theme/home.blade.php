@extends('app')

@section('title', settings()->seo_title)
@section('description', settings()->seo_description)
@section('keywords', settings()->seo_keywords)

@section('content')
    <!-- START REVOLUTION SLIDER 5.4.2 -->
	<div id="banner-container" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
		<!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
		<div id="banner-slide" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
			<div class="slotholder"></div>
			<ul>
				<!-- SLIDE  -->
				@if (slider())
					@foreach (slider() as $slide)
					<li data-index="rs-0{{ $slide->id }}" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000" data-rotate="0" data-saveperformance="off" data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
						<!-- MAIN IMAGE -->
						<img src="{{ asset('uploads/'.$slide->image) }}" alt="" data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
						<!-- LAYERS -->
						<!-- LAYER NR. 1 -->
						<div class="tp-caption title-slide color-white" id="slide-01-layer-1" data-x="['left','left','left','left']" data-hoffset="['39','39','39','39']" data-y="['middle','middle','middle','middle']" data-voffset="['-105','-65','-77','-90']" data-fontsize="['55','52','45','35']" data-lineheight="['64','57','50','40']" data-fontweight="['800','800','800','800']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":200,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0" data-paddingleft="[0,0,0,0]" style="z-index: 16; white-space: nowrap;">{!! $slide->baslik !!}</span>
						</div>
						<!-- LAYER NR. 2 -->
						<div class="tp-caption sub-title color-white" id="slide-01-layer-4" data-x="['left','left','left','left']" data-hoffset="['37','37','37','37']" data-y="['middle','middle','middle','middle']" data-voffset="['30','30','30','0']" data-fontsize="['20',18','18','18']" data-lineheight="['30','30','30','24']" data-fontweight="['400','400','400','400']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":300,"ease":"Power4.easeInOut"},{"delay":"wait","speed":700,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17; white-space: nowrap;"><br>{!! $slide->aciklama !!}</div>
						<a href="javascript:void(0)" target="_self" class="tp-caption cs-btn-one btn-primary-color" data-frames='[{"delay":1500,"speed":500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power0.easeIn"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-x="['left','left','left','left']" data-hoffset="['36','36','36','36']" data-y="['middle','middle','middle','middle']" data-voffset="['130','130','120','80']" data-fontsize="['14','14','14','14']" data-width="['auto']" data-height="['auto']">Biz Kimiz?
						</a>
						<!-- END LAYER LINK -->
						<a href="javascript:void(0)" target="_self" class="tp-caption cs-btn-one border btn-transparent" data-frames='[{"delay":1500,"speed":500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power0.easeIn"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-x="['left','left','left','left']" data-hoffset="['250','250','250','245']" data-y="['middle','middle','middle','middle']" data-voffset="['130','130','120','80']" data-fontsize="['14','14','14','14']" data-width="['auto']" data-height="['auto']">İletişime  Geçin
						</a>
					</li>
					@endforeach
				@endif
			</ul>
		</div>
	</div>
	<!-- END REVOLUTION SLIDER -->
	<!-- About Section Start -->
	<section class="about-section pdt-100 pdb-80 bg-center-bottom" data-background="{{ asset('assets/images/bg/ac2.png') }}">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
					<div class="about-image">
						<img class="img-full image-link mrb-lg-50 mrt-5" src="{{ asset('assets/images/about/about.png') }}" alt="">
					</div>
				</div>
				<div class="col-md-12 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
					<h5 class="mrb-15 text-primary-color text-underline editable-tags" id="about_field_subtitle">{{ __("about_field_subtitle") }}</h5>
					<h2 class="mrb-25 editable-tags" id="about_field_title">{{ __("about_field_title") }}</h2>
					<p class="editable-tags" id="about_field_text">{{ __("about_field_text") }}</p>
				</div>
			</div>
			<div class="row mrt-70">
				<div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="800ms">
					<div class="icon-box mrb-30">
						<div class="icon-box-icon">
							<i class="webexflaticon flaticon-engineer"></i>
						</div>
						<div class="icon-box-content">
							<h4 class="title editable-tags" id="field_1">{{ __("field_1") }}</h4>
							<p class="description mrb-0 editable-tags" id="field_1_text">{{ __("field_1_text") }}</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1200ms">
					<div class="icon-box active mrb-30">
						<div class="icon-box-icon">
							<i class="webexflaticon flaticon-heavy-vehicle-1"></i>
						</div>
						<div class="icon-box-content">
							<h4 class="title editable-tags" id="field_2">{{ __("field_2") }}</h4>
							<p class="description mrb-0 editable-tags" id="field_2_text">{{ __("field_2_text") }}</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1400ms">
					<div class="icon-box mrb-30">
						<div class="icon-box-icon">
							<i class="webexflaticon flaticon-building"></i>
						</div>
						<div class="icon-box-content">
							<h4 class="title editable-tags" id="field_3">{{ __("field_3") }}</h4>
							<p class="description mrb-0 editable-tags" id="field_3_text">{{ __("field_3_text") }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About Section End -->
	<!-- Services Section Start -->
	<section class="service-section pdt-110 pdt-lg-105 pdb-80" data-background="{{ asset('assets/images/bg/2.jpg') }}" data-overlay-dark="5">
		<div class="section-title text-center">
			<div class="container">
				<div class="row">
					<div class="col"></div>
					<div class="col-lg-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<h5 class="text-primary-color text-underline section-icon mrb-15 editable-tags" id="hizmet_field_subtitle">{{ __("hizmet_field_subtitle") }}</h5>
						<h2 class="text-white editable-tags" id="hizmet_field_title">{{ __("hizmet_field_title") }}</h2>
					</div>
					<div class="col"></div>
				</div>
			</div>
		</div>
		<div class="section-content">
			<div class="container">
				<div class="row">
					@if (hizmetler(6))
						@foreach (hizmetler(6) as $hizmet)
							<div class="col-md-6 col-lg-4 col-xl-4">
								<div class="service-item">
									<img src="{{ asset('uploads/'.$hizmet->image) }}" alt="{{ $hizmet->baslik }}">
									<h4 class="service-title"><a href="{{ url('hizmet/'.$hizmet->slug) }}">{{ $hizmet->baslik }}</a></h4>
									<p class="mrb-0">{{ $hizmet->aciklama }}</p>
									<a class="service-link" href="{{ url('hizmet/'.$hizmet->slug) }}">Daha Fazla<span class="fa fa-long-arrow-right mrl-10"></span></a>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- Services Section End -->
	<!-- Project Section Start -->
	<section class="project-section pdt-105 pdb-110" data-background="{{ asset('assets/images/bg/abs-bg5.png') }}">
		<div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
			<div class="container">
				<div class="row">
					<div class="col"></div>
					<div class="col-xl-6">
						<div class="section-title-block">
							<h5 class="text-primary-color text-underline section-icon mrb-15 editable-tags" id="projeler_field_subtitle">{{ __("projeler_field_subtitle") }}</h5>
							<h2 class="editable-tags" id="projeler_field_title">{{ __("projeler_field_title") }}</h2>
						</div>
					</div>
					<div class="col"></div>
				</div>
			</div>
		</div>
		<div class="section-content">
			<div class="container-fluid">
				<div class="row wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					@if (projeler(4))
						@foreach (projeler(4) as $proje)
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="project-item mrb-30">
								<div class="project-thumb">
									<img class="img-full" src="{{ asset('uploads/'.$proje->image) }}" alt="{{ $proje->baslik }}">
									<div class="link-single-page">
										<a href="{{ url('proje/'.$proje->slug) }}"><i class="webex-icon-attachment1"></i></a>
									</div>
								</div>
								<div class="project-content">
									<h4><a href="{{ url('proje/'.$proje->slug) }}">{{ $proje->baslik }}</a></h4>
									{{-- <h6>- İnşaat</h6> --}}
								</div>
							</div>
						</div>	
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- Project Section End -->
	<!-- Clients Section Start -->
	<section class="pdt-70 pdb-70 bg-primary-color" data-background="{{ asset('assets/images/bg/abs-bg4.png') }}">
		<div class="section-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="owl-carousel client-items">
							@if (referanslar())
								@foreach (referanslar() as $client)
								<div class="client-item">
									<img src="{{ asset('uploads/gallery/'.$client->filename) }}" alt="{{ $client->filename }}">
								</div>	
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Clients Section End -->
	<!-- Testimonials Section Start -->
	<section class="pdt-110 pdb-85 bg-secondary-color" data-background="{{ asset('assets/images/bg/dot-map-testimonial.png') }}">
		<div class="section-title text-center">
			<div class="container">
				<div class="row">
					<div class="col"></div>
					<div class="col-lg-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<h5 class="text-primary-color text-underline section-icon mrb-15 editable-tags" id="yorumlar_field_subtitle">{{ __("yorumlar_field_subtitle") }}</h5>
						<h2 class="mrb-30 text-white editable-tags" id="yorumlar_field_title">{{ __("yorumlar_field_title") }}</h2>
					</div>
					<div class="col"></div>
				</div>
			</div>
		</div>
		<div class="section-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="owl-carousel testimonial-items-3col owl-dot-style-one">
							<div class="testimonial-item">
								<div class="testimonial-content">
									<p class="mrb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit accusantium adipisci voluptatem architecto quidem est</p>
								</div>
								<div class="testimonial-thumb">
									<div class="client-img">
										<img class="img-fluid" src="{{ asset('assets/images/testimonials/testimonial-img1.jpg') }}" alt="testimonial-img">
									</div>
									<div class="client-info">
										<h5 class="name">Ayşe Yılmaz</h5>
										<span class="designation">CEO, Google Inc.</span>
									</div>
								</div>
							</div>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<p class="mrb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit accusantium adipisci voluptatem architecto quidem est</p>
								</div>
								<div class="testimonial-thumb">
									<div class="client-img">
										<img class="img-fluid" src="{{ asset('assets/images/testimonials/testimonial-img2.jpg') }}" alt="testimonial-img">
									</div>
									<div class="client-info">
										<h5 class="name">Hüseyin Karaca</h5>
										<span class="designation">CEO, Apple Inc.</span>
									</div>
								</div>
							</div>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<p class="mrb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit accusantium adipisci voluptatem architecto quidem est</p>
								</div>
								<div class="testimonial-thumb">
									<div class="client-img">
										<img class="img-fluid" src="{{ asset('assets/images/testimonials/testimonial-img3.jpg') }}" alt="testimonial-img">
									</div>
									<div class="client-info">
										<h5 class="name">Fatih Ak</h5>
										<span class="designation">CEO, Google Inc.</span>
									</div>
								</div>
							</div>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<p class="mrb-0">Distinctively exploit optimal alignments for intuitive quickly coordinate business applications throughe Seamlessly for optimal testing procedures process</p>
								</div>
								<div class="testimonial-thumb">
									<div class="client-img">
										<img class="img-fluid" src="{{ asset('assets/images/testimonials/testimonial-img4.jpg') }}" alt="testimonial-img">
									</div>
									<div class="client-info">
										<h5 class="name">Seymour Butz</h5>
										<span class="designation">CEO, Twitter Inc.</span>
									</div>
								</div>
							</div>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<p class="mrb-0">Distinctively exploit optimal alignments for intuitive quickly coordinate business applications throughe Seamlessly for optimal testing procedures process</p>
								</div>
								<div class="testimonial-thumb">
									<div class="client-img">
										<img class="img-fluid" src="{{ asset('assets/images/testimonials/testimonial-img3.jpg') }}" alt="testimonial-img">
									</div>
									<div class="client-info">
										<h5 class="name">Stefina Williams</h5>
										<span class="designation">CEO, Rezor Inc.</span>
									</div>
								</div>
							</div>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<p class="mrb-0">Distinctively exploit optimal alignments for intuitive quickly coordinate business applications throughe Seamlessly for optimal testing procedures process</p>
								</div>
								<div class="testimonial-thumb">
									<div class="client-img">
										<img class="img-fluid" src="{{ asset('assets/images/testimonials/testimonial-img4.jpg') }}" alt="testimonial-img">
									</div>
									<div class="client-info">
										<h5 class="name">Seymour Butz</h5>
										<span class="designation">CEO, Google Inc.</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonials Section End -->
	<!-- News Section Start -->
	<section class="pdt-105 pdb-45 pdb-md-0" data-background="{{ asset('assets/images/bg/ac3.png') }}" data-overlay-dark="0">
		<div class="section-title">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="section-title-block dot-pattern-bg mrb-md-30">
							<h5 class="text-primary-color text-underline mrb-15 editable-tags" id="haberler_field_subtitle">{{ __("haberler_field_subtitle") }}</h5>
							<h2 class="editable-tags" id="haberler_field_title">{{ __("haberler_field_title") }}</h2>
						</div>
					</div>
					<div class="col-lg-4 col-xl-6 align-self-center text-left text-lg-right">
						<a href="{{ url('haberler') }}" class="cs-btn-one btn-primary-color btn-md">Tüm Haberler</a>
					</div>
				</div>
			</div>
		</div>
		<div class="section-content">
			<div class="container">
				<div class="row">
					@if (haberler(3))
						@foreach (haberler(3) as $haber)
						<div class="col-md-6 col-lg-4 col-xl-4">
							<div class="news-wrapper mrb-30">
								<div class="news-thumb">
									<img src="{{ asset('uploads/'.$haber->image) }}" class="img-full" alt="{{ $haber->baslik }}">
									<div class="news-date">
										<div class="entry-date">{{ date('d-m-Y', strtotime($haber->created_at)) }}</div>
									</div>
								</div>
								<div class="news-description">
									<h4 class="the-title mrb-20"><a href="{{ url('haber/'.$haber->slug) }}">{{ $haber->baslik }}</a></h4>
									<p class="the-content mrb-0">{{ $haber->aciklama }}</p>
								</div>
								<div class="news-bottom-part">
									<div class="post-link">
										<a href="{{ url('haber/'.$haber->slug) }}" class="link-btn text-primary-color">Daha Fazla</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- News Section End -->
	<!-- Call to Action Start -->
	<section class="call-to-action">
		<div class="container">
			<div class="cta-bg bg-primary-color">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="contact-info">
							<div class="cta-contact-icon">
								<i class="webexflaticon webex-flaticon-call"></i>
							</div>
							<div class="cta-contact-content">
								<div class="cta-contact-text">Bizi Şimdi Arayın</div>
								<div class="cta-contact-number">+90 531 234 12 12</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="newsletter-form mrt-md-40">
							<form method="post" onsubmit="return false;">
								<div class="form-group clearfix">
									<input type="email" name="email" value="" placeholder="E-posta Adresi" required="">
									<button type="submit" class="newsletter-btn"><span class="icon fa fa-paper-plane"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Call to Action End -->
@endsection