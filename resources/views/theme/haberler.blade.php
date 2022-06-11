@extends('app')

@section('title', 'Haberler')
@section('description', 'Haberler Lorem Ipsum')
@section('keywords', 'Haberler Keywords')

@section('content')
<!-- Page Title Start -->
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white mrb-10">Haberler</h2>
                <ul class="mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
                    <li class="breadcrumb-item text-primary-color">Haberler</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->
<!-- Services Section Start -->
<section class="service-section pdt-110 pdt-lg-105 pdb-80">
    <div class="section-content">
        <div class="container">
            <div class="row">
                @if (haberler())
						@foreach (haberler() as $haber)
                        <div class="col-md-6 col-lg-4 col-xl-4">
							<div class="news-wrapper mrb-30">
								<div class="news-thumb">
									<img src="{{ asset('uploads/list/'.$haber->image) }}" class="img-full" alt="{{ $haber->baslik }}">
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
<!-- Services Section End -->

@endsection