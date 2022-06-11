@extends('app')

@section('title', 'Referans')
@section('description', 'Referans Lorem Ipsum')
@section('keywords', 'Referans Keywords')

@section('content')
<!-- Page Title Start -->
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white mrb-10">Referans</h2>
                <ul class="mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
                    <li class="breadcrumb-item text-primary-color">Referans</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->
<section class="contact-section pdt-100 pdb-65">
    <div class="container">
        <div class="row">
                @if (referanslar())
                @foreach (referanslar() as $client)
                <div class="col-12 col-lg-3">
                    <div class="client-item client-item-custom">
                    <img src="{{ asset('uploads/gallery/'.$client->filename) }}" alt="{{ $client->filename }}">
                    </div>	
                </div>
                @endforeach
            @endif
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