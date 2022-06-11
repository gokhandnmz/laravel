@extends('app')

@section('title', 'Proje')
@section('description', 'Proje Lorem Ipsum')
@section('keywords', 'Proje Keywords')

@section('content')
<!-- Page Title Start -->
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white mrb-10">Projeler</h2>
                <ul class="mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Anasayfa</a></li>
                    <li class="breadcrumb-item text-primary-color">Projeler</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->
<!-- Project Section Start -->
<section class="project-section pdt-105 pdb-80" data-background="images/bg/abs-bg5.png">
    <div class="section-content">
        <div class="container">
            <div class="row grid wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                @if (projeler())
                    @foreach (projeler() as $proje)
                    <div class="col-lg-4 col-md-6 grid-item industry manufacturing">
                        <div class="project-item mrb-30">
                            <div class="project-thumb">
                                <img class="img-full" src="{{ asset('uploads/'.$proje->image) }}" alt="{{ $proje->baslik }}">
                                <div class="link-single-page">
                                    <a href="{{ url('proje/'.$proje->slug) }}"><i class="webex-icon-attachment1"></i></a>
                                </div>
                            </div>
                            <div class="project-content">
                                <h4><a href="{{ url('proje/'.$proje->slug) }}">{{ $proje->baslik }}</a></h4>
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
@endsection