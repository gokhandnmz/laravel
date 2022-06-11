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
                                                        {{-- <li class="nav-item">
                                                            <a href="#icerik" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                İçerik
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#seo" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                                SEO
                                                            </a>
                                                        </li> --}}
                                                        <li class="nav-item">
                                                            <a href="#galeri" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                Dosyalar
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="galeri">
                                                            <div class="gallery-header">
                                                                <label for="gallery" class="btn btn-sm btn-warning">Dosya Yükle</label>
                                                                <input type="file" name="files[]" id="gallery" multiple style="display:none" class="file-images">
                                                            </div>
                                                            <div class="gallery-content">
                                                                {{-- ajax content --}}
                                                                @if ($images)
                                                                    @foreach ($images as $image)
                                                                    <div id="image-{{ $image->id }}" class="gallery-box">
                                                                            <button type="button" class="gallery-remove" data-target="#image-{{ $image->id }}"
                                                                                data-id="{{ $image->id }}"
                                                                                    >
                                                                                    <i data-feather="trash-2" style="color:#fff;"
                                                                                    width="18" height="16"></i>
                                                                                </button>
                                                                                <div class="filename">{{ $image->filename }}</div>
                                                                                <a href="{{ url('uploads/files/'.$image->filename) }}" target="_blank">
                                                                                <img src="{{ asset("assets/images/pdf-icon.jpg") }}" alt="{{ $image->filename }}">
                                                                                {{-- <input type="text" name="gallery-title"> --}}
                                                                        </a>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
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