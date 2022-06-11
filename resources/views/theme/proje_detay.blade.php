@extends('app')

@section('title', $item->seo_title)
@section('description', $item->seo_description)
@section('keywords', $item->seo_keywords)

@section('content')
    <!-- Page Title Start -->
	<section class="page-title-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 text-center">
					<h2 class="text-uppercase text-white mrb-10">{{ $item->baslik }}</h2>
					<ul class="mb-0 justify-content-center">
						<li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
						<li class="breadcrumb-item text-primary-color">{{ $item->baslik }}</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Page Title End -->
	<!-- Project Details Section Start -->
	<section class="project-details-page pdt-110 pdb-70">
		<div class="container">
			<div class="row">
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    <div class="service-nav-menu mrb-30">
                        <div class="service-link-list mb-30">
                            <ul class="">
                                @if ($projeler)
                                    @foreach ($projeler as $proje)
                                        <li class="{{ $proje->id == $item->id ? 'active' : '' }}"><a href="{{ url('proje/'.$proje->slug) }}"><i class="fa fa-chevron-right"></i>{{ $proje->baslik }}</a></li>  
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-xl-8 col-lg-7">
					<div class="blog-standared-img slider-blog">
						<img class="img-full" src="{{ asset('uploads/'.$item->image) }}" alt="{{ $item->baslik }}">
					</div>
					<div class="project-detail-text">
						<h3 class="project-details-title mrt-30 mrb-15">Proje Açıklaması</h3>
						<div class="project-details-content">
							<div class="row mrb-10">
								<div class="col-lg-12">
									{!! $item->icerik !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About Section End -->
@endsection