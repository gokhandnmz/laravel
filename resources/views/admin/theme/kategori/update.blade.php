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
                                                        {{-- <li class="nav-item">
                                                            <a href="#seo" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                                SEO
                                                            </a>
                                                        </li> --}}
                                                    </ul>


                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="icerik">
                                                            <div class="mb-3">
                                                                <label for="baslik" class="form-label">Başlik</label>
                                                                <input type="text" name="data[baslik]" id="baslik" class="form-control" placeholder="Başlık" value="{{ $item->baslik }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="ustkategori" class="form-label">Üst Kategori</label>
                                                                <select name="data[parent_id]" id="ustkategori" class="form-control">
                                                                    <option value="0" selected> - Seçiniz - </option>
                                                                    @if ($list)
                                                                        @foreach ($list as $page)
                                                                            <option value="{{ $page->id }}" 
                                                                                {{ $item->parent_id == $page->id ? 'selected' : '' }}>{{ $page->baslik }}</option>
                                                                            @if($page->childs->isNotEmpty())
                                                                                @include('admin.theme.kategori.sublistoption', [
                                                                                    'childs' => $page->childs,
                                                                                    'count' => 1,
                                                                                    'parent_id' => $item->parent_id
                                                                                ]);
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </select>
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