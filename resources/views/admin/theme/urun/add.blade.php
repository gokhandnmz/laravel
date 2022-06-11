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
                                                        <li class="nav-item">
                                                            <a href="#galeri" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                                Galeri
                                                            </a>
                                                        </li>
                                                    </ul>


                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="icerik">
                                                            <div class="mb-3">
                                                                <label for="baslik" class="form-label">Başlik</label>
                                                                <input type="text" name="data[baslik]" id="baslik" class="form-control" placeholder="Başlık" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="ustkategori" class="form-label">Üst Kategori</label>
                                                                <select name="data[kategori_id]" id="ustkategori" class="form-control">
                                                                    <option value="0" selected> - Seçiniz - </option>
                                                                    @if ($categories)
                                                                        @foreach ($categories as $page)
                                                                            <option value="{{ $page->id }}">{{ $page->baslik }}</option>
                                                                            @if($page->childs->isNotEmpty())
                                                                                @include('admin.theme.menu.sublistoption', [
                                                                                    'childs' => $page->childs,
                                                                                    'count' => 1,
                                                                                    'parent_id' => $page->id
                                                                                ]);
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
        
                                                            <div class="mb-3">
                                                                <label for="aciklama" class="form-label">Açıklama</label>
                                                                <textarea name="data[aciklama]" id="aciklama" class="form-control" required></textarea>
                                                            </div>
        
                                                            <div class="mb-3">
                                                                <label for="editor" class="form-label">İçerik</label>
                                                                <textarea name="data[icerik]" id="editor" class="form-control"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="fiyat" class="form-label">Fiyat</label>
                                                                <input type="text" name="data[fiyat]" id="fiyat" class="form-control" placeholder="Fiyat">
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="file" name="image" id="image-button" style="display:none">
                                                                <label for="image-button" class="btn btn-sm btn-warning">Ana Görsel Yükle</label>
                                                                <div id="image-box" class="d-none">
                                                                    <img src="" alt="Image">
                                                                </div>
                                                            </div>
        
                                                            <div class="mb-3 switchery-demo">
                                                                <label for="switchery" class="form-label">Durum</label>
                                                                <br>
                                                                <input type="hidden" name="data[durum]" value="0">
                                                                <input type="checkbox" checked name="data[durum]" value="1" data-color="#039cfd" class="switchery"/>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="seo">
                                                            <div class="mb-3">
                                                                <label for="seo_baslik" class="form-label">Seo Başlık</label>
                                                                <input type="text" name="data[seo_title]" id="seo_baslik" class="form-control seo-title" placeholder="Seo Başlık" maxlength="64">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="seoaciklama" class="form-label">Seo Açıklama</label>
                                                                <input type="text" name="data[seo_description]" id="seoaciklama" class="form-control seo-description" placeholder="Seo Açıklama" maxlength="300">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="seoanahtarkelimeler" class="form-label">Seo Keywords</label>
                                                                <input type="text" name="data[seo_keywords]" id="seoanahtarkelimeler" class="form-control seo-keywords" placeholder="Seo Anahtar Kelimeler" maxlength="120">
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="galeri">
                                                            <div class="gallery-header">
                                                                <label for="gallery" class="btn btn-sm btn-warning">Resim Yükle</label>
                                                                <input type="file" name="gallery" id="gallery" multiple style="display:none">
                                                            </div>
                                                            <div class="gallery-content">
                                                                <div id="image-1" class="gallery-box">
                                                                    <button class="gallery-remove" data-id="#image-1">
                                                                        <i data-feather="trash-2" style="color:#fff;"
                                                                        width="18" height="16"></i>
                                                                    </button>
                                                                    <img src="http://picsum.photos/200/200" alt="">
                                                                    <input type="text" name="gallery-title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-1">
                                                        <button type="submit" class="btn btn-sm btn-success">Kaydet</button>
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