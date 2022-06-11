@extends('app')

@section('title', 'Hakkımızda')
@section('description', 'Hakkımızda Lorem Ipsum')
@section('keywords', 'Hakkımızda Keywords')

@section('content')
<!-- Page Title Start -->
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white mrb-10">Hakkımızda</h2>
                <ul class="mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
                    <li class="breadcrumb-item text-primary-color">Hakkımızda</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->
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
                <h5 class="mrb-15 text-primary-color text-underline">Site Adı Hakkinda</h5>
                <h2 class="mrb-25">Lider Endüstriyel Hizmet Sağlayıcısı.</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit deserunt doloribus nulla recusandae velit praesentium ducimus quas dolorem unde doloremque sequi, rem impedit labore exercitationem repellendus eius, sint, consectetur molestiae.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit deserunt doloribus nulla recusandae velit praesentium ducimus quas dolorem unde doloremque sequi, rem impedit labore exercitationem repellendus eius, sint, consectetur molestiae.</p>
            </div>
        </div>
        <div class="row mrt-70">
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="800ms">
                <div class="icon-box mrb-30">
                    <div class="icon-box-icon">
                        <i class="webexflaticon flaticon-engineer"></i>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="title">Nitelikli Mühendisler</h4>
                        <p class="description mrb-0">Lorem Ipsum is simply dummy text and typesetting indstry lpsum has been the load.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1200ms">
                <div class="icon-box active mrb-30">
                    <div class="icon-box-icon">
                        <i class="webexflaticon flaticon-heavy-vehicle-1"></i>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="title">Modern Makineler</h4>
                        <p class="description mrb-0">Lorem Ipsum is simply dummy text and typesetting indstry lpsum has been the load.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1400ms">
                <div class="icon-box mrb-30">
                    <div class="icon-box-icon">
                        <i class="webexflaticon flaticon-building"></i>
                    </div>
                    <div class="icon-box-content">
                        <h4 class="title">Kaliteli Servis</h4>
                        <p class="description mrb-0">Lorem Ipsum is simply dummy text and typesetting indstry lpsum has been the load.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

@endsection