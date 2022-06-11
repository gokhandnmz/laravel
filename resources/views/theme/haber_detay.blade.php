@extends('app')

@section('title', $item->seo_title)
@section('description', $item->description)
@section('keywords', $item->keywords)

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
<!-- Service Details Section Start -->
<section class="blog-single-news pdt-110 pdb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="single-news-details mrb-30">
                    <div class="single-news-thumb">
                        <img class="img-full" src="{{ asset('uploads/main/'.$item->image) }}" alt="{{ $item->baslik }}">
                    </div>
                    <div class="single-news-content">
                        <div class="entry-meta"><span class="admin"><i class="fa fa-calendar"></i>{{ date('d-m-Y', strtotime($item->created_at)) }}<span class="mrr-10 mrl-10"></div>
                        <h3 class="entry-title text-capitalize mrb-20">{{ $item->baslik }}</h3>
                        <div class="entry-content">{!! $item->icerik !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 sidebar-right">
                <aside class="news-sidebar-widget">
                    <div class="widget sidebar-widget widget-popular-posts">
                        <h4 class="mrb-20 widget-title">Güncel Haberler</h4>
                        @php
                            $haberler = App\Models\Haber::where('durum', 1)
                            ->where('id', '<>', $item->id)
                            ->limit(4)
                            ->get();
                        @endphp
                        @if ($haberler)
                            @foreach ($haberler as $haber)
                            <div class="single-post media mrb-20">
                                <div class="post-image mrr-20">
                                    <img src="{{ asset('uploads/thumbnail/'.$haber->image) }}" alt="{{ $haber->baslik }}">
                                </div>
                                <div class="post-content media-body align-self-center">
                                    <h5 class="mrb-5"><a href="{{ url('haber/'.$haber->slug) }}">{{ $haber->baslik }}</a></h5>
                                    <span class="post-date"><i class="fa fa-clock-o mrr-5"></i>{{ date('d-m-Y', strtotime($haber->created_at)) }}</span>
                                </div>
                            </div>  
                            @endforeach
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
@endsection