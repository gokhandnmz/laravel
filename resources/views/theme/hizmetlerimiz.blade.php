@extends('app')

@section('title', 'Hizmetlerimiz')
@section('description', 'Hizmetlerimiz Lorem Ipsum')
@section('keywords', 'Hizmetlerimiz Keywords')

@section('content')
<!-- Page Title Start -->
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white mrb-10">Hizmetlerimiz</h2>
                <ul class="mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
                    <li class="breadcrumb-item text-primary-color">Hizmetlerimiz</li>
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
                @if (hizmetler())
						@foreach (hizmetler() as $hizmet)
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

@endsection