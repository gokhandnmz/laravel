@extends('app')

@section('title', 'İletişim')
@section('description', 'İletişim Lorem Ipsum')
@section('keywords', 'İletişim Keywords')

@section('content')
<!-- Page Title Start -->
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white mrb-10">İletişim</h2>
                <ul class="mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
                    <li class="breadcrumb-item text-primary-color">İletişim</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->
<!-- Contact Section Start -->
<div class="contact-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <!-- Google Map Start -->
                <div class="mapouter fixed-height">
                    {{-- <div class="gmap_canvas">
                        
                    </div> --}}
                    {!! settings()->google_map !!}
                </div>
                <!-- Google Map End -->
            </div>
        </div>
    </div>
</div>
<section class="contact-section pdt-100 pdb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-form mrb-md-40">
                    <h2 class="mrb-40 f-weight-400 solid-bottom-line">Mesaj<span class="f-weight-700 text-primary-color"> Gönderin</span></h2>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="post" action="{{ url('iletisim-formu') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mrb-25">
                                    <input type="text" placeholder="Ad Soyad" name="data[adsoyad]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mrb-25">
                                    <input type="text" placeholder="Telefon" name="data[telefon]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mrb-25">
                                    <input type="email" placeholder="E-posta" name="data[eposta]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mrb-25">
                                    <textarea rows="4" placeholder="Mesaj" name="data[mesaj]" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <button type="submit" class="cs-btn-one btn-md btn-round btn-primary-color">Formu Gönder</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <h2 class="mrb-40 f-weight-400 solid-bottom-line">İletişim<span class="f-weight-700 text-primary-color"> Bilgileri</span></h2>
                <div class="contact-block d-flex mrb-30">
                    <div class="contact-icon">
                        <i class="webex-icon-map1"></i>
                    </div>
                    <div class="contact-details mrl-30">
                        <h5 class="icon-box-title mrb-10">Adres</h5>
                        <p class="mrb-0">{{ settings()->adres }}</p>
                    </div>
                </div>
                <div class="contact-block d-flex mrb-30">
                    <div class="contact-icon">
                        <i class="webex-icon-Phone2"></i>
                    </div>
                    <div class="contact-details mrl-30">
                        <h5 class="icon-box-title mrb-10">Telefon</h5>
                        <p class="mrb-0">{{ settings()->telefon }}</p>
                    </div>
                </div>
                <div class="contact-block d-flex">
                    <div class="contact-icon">
                        <i class="webex-icon-envelope"></i>
                    </div>
                    <div class="contact-details mrl-30">
                        <h5 class="icon-box-title mrb-10">E-posta</h5>
                        <p class="mrb-0">{{ settings()->eposta }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
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
                            <div class="cta-contact-text">Bizi Arayın</div>
                            <div class="cta-contact-number">{{ settings()->telefon }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="newsletter-form mrt-md-40">
                        <form method="post" onsubmit="return false;">
                            <div class="form-group clearfix">
                                <input type="email" name="email" value="" placeholder="E-posta" required="">
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