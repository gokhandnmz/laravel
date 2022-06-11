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
                                    <h4 class="page-title">Kayıt Güncelle</h4>
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
                                                <form method="post" action="{{ url($url.'/store/'.$item->id) }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <ul class="nav nav-tabs nav-bordered">
                                                        <li class="nav-item">
                                                            <a href="#icerik" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                İçerik
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#seo" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                                SEO
                                                            </a>
                                                        </li>
                                                    </ul>


                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="icerik">
                                                            <div class="mb-3">
                                                                <label for="baslik" class="form-label">Başlik</label>
                                                                <input type="text" name="data[baslik]" id="baslik" class="form-control" placeholder="Başlık" value="{{ $item->baslik }}" required>
                                                            </div>
        
                                                            <div class="mb-3">
                                                                <label for="editor" class="form-label">İçerik</label>
                                                                <textarea name="data[icerik]" id="editor" height="50" class="form-control">{{ $item->icerik }}</textarea>
                                                            </div>
                                                            
                                                            <div class="mb-3 switchery-demo">
                                                                <label for="switchery" class="form-label">Durum</label>
                                                                <br>
                                                                <input type="hidden" name="data[durum]" value="0">
                                                                <input type="checkbox"
                                                                {{ $item->durum == 1 ? 'checked' : '' }}
                                                                name="data[durum]" value="1" data-color="#039cfd" class="switchery"/>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="seo">
                                                            <div class="mb-3">
                                                                <label for="seo_baslik" class="form-label">Seo Başlık</label>
                                                                <input type="text" name="data[seo_title]" id="seo_baslik" class="form-control seo-title" placeholder="Seo Başlık" value="{{ $item->seo_title }}" maxlength="64">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="seoaciklama" class="form-label">Seo Açıklama</label>
                                                                <input type="text" name="data[seo_description]" id="seoaciklama" class="form-control seo-description" placeholder="Seo Açıklama" value="{{ $item->seo_description }}" maxlength="300">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="seoanahtarkelimeler" class="form-label">Seo Keywords</label>
                                                                <input type="text" name="data[seo_keywords]" id="seoanahtarkelimeler" class="form-control seo-keywords" placeholder="Seo Anahtar Kelimeler" value="{{ $item->seo_keywords }}" maxlength="120">
                                                            </div>
                                                        </div>
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