@extends('admin.app')
@section('content')
    <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Kayıt Oluştur</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if ( $message = Session::get( 'success' ) )
                                                <div class="alert alert-success">
                                                    {{ $message }}
                                                </div>
                                                @endif
                                                
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    {{ $errors->first() }}
                                                </div>
                                                @endif
                                                <form method="post" action="{{ url($url.'/store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="file" name="image" id="image-button" style="display:none">
                                                        <label for="image-button" class="btn btn-sm btn-warning">Logo Yükle</label>
                                                        <div id="image-box" class="{{ @$item->logo == '' ? 'd-none' : ''; }}">
                                                            <img src="{{ asset('uploads/'.@$item->logo) }}" alt="{{ @$item->baslik }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="siteadi" class="form-label">Site Adı</label>
                                                        <input type="text" name="data[siteadi]" id="siteadi" class="form-control" placeholder="Site Adı" value="{{ @$item->siteadi }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="eposta" class="form-label">E-posta</label>
                                                        <input type="text" name="data[eposta]" id="eposta" class="form-control" placeholder="E-posta" value="{{ @$item->eposta }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="telefon" class="form-label">Telefon</label>
                                                        <input type="text" name="data[telefon]" id="telefon" class="form-control" placeholder="Telefon" value="{{ @$item->telefon }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="adr" class="form-label">Adres</label>
                                                        <textarea name="data[adres]" rows="3" class="form-control">{{ @$item->adres }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="seobaslik" class="form-label">Seo Başlık</label>
                                                        <input type="text" name="data[seo_title]" id="seobaslik" class="form-control" placeholder="Seo Başlık" value="{{ @$item->seo_title }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="seoaciklama" class="form-label">Seo Açıklama</label>
                                                        <textarea name="data[seo_description]" rows="3" class="form-control" placeholder="Seo Açıklama">{{ @$item->seo_description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="seoanahtarkelime" class="form-label">Seo Anahtar Kelime</label>
                                                        <input type="text" name="data[seo_keywords]" id="seoanahtarkelime" class="form-control" placeholder="Seo Anahtar Kelime" value="{{ @$item->seo_keywords }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="googlemap" class="form-label">Google Map</label>
                                                        <textarea name="data[google_map]" class="form-control" id="" rows="5">{{ @$item->google_map }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="smtphost" class="form-label">SMTP Host</label>
                                                        <input type="text" name="data[smtp_host]" id="smtphost" class="form-control" placeholder="SMTP Host" value="{{ @$item->smtp_host }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="smtpusername" class="form-label">SMTP Kullanıcı Adı</label>
                                                        <input type="text" name="data[smtp_username]" id="smtpusername" class="form-control" placeholder="SMTP Kullanıcı Adı" value="{{ @$item->smtp_username }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="smtpsifre" class="form-label">SMTP Şifre</label>
                                                        <input type="text" name="data[smtp_password]" id="smtpsifre" class="form-control" placeholder="SMTP Şifre" value="{{ @$item->smtp_password }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alicieposta" class="form-label">Alıcı E-posta</label>
                                                        <input type="text" name="data[smtp_receiver]" id="alicieposta" class="form-control" placeholder="Alıcı E-posta" value="{{ @$item->smtp_receiver }}">
                                                    </div>

                                                    <div class="mb-1">
                                                        <button class="btn btn-sm btn-success">Kaydet</button>
                                                    </div>
        
                                                </form>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div><!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
@endsection