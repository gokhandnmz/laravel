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
                                                <form method="post" action="{{ url($url.'/store/'.$item->id) }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="baslik" class="form-label">Başlik</label>
                                                        <input type="text" name="data[baslik]" id="baslik" class="form-control" placeholder="Başlık" value="{{ $item->baslik }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="permalink" class="form-label">Seo Url</label>
                                                        <input type="text" name="data[slug]" id="permalink" class="form-control" placeholder="Seo Url" value="{{ $item->slug }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ustkategori" class="form-label">Üst Kategori</label>
                                                        <select name="data[kategori_id]" id="ustkategori" class="form-control">
                                                            <option value="0"> - Seçiniz - </option>
                                                            @if ($list)
                                                                @foreach ($list as $page)
                                                                    <option value="{{ $page->id }}" 
                                                                        {{ $page->id == $item->kategori_id ? 'selected' : '' }}>{{ $page->baslik }}</option>
                                                                    @if($page->childs->isNotEmpty())
                                                                        @include('admin.theme.menu.sublistoption', [
                                                                            'childs' => $page->childs,
                                                                            'count' => 1,
                                                                            'parent_id' => $item->kategori_id
                                                                        ]);
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div id="modul" class="mb-3">
                                                        <label for="modul" class="form-label">Modül</label>
                                                        <br>
                                                        <select name="data[modul]" id="modul" class="form-control">
                                                            <option value="0"> - Seçiniz - </option>
                                                            @if ($moduller)
                                                                @foreach ($moduller as $modul)
                                                                    <option value="{{ $modul->table_name }}"
                                                                        {{ $modul->table_name == $item->modul ? 'selected' : '' }}
                                                                        >{{ $modul->baslik }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div id="ozel" class="mb-3">
                                                        <label for="baslik" class="form-label">Özel Url</label>
                                                        <input type="text" name="data[ozel_url]" id="baslik" class="form-control" placeholder="Özel Url" value="{{ $item->ozel_url }}">
                                                    </div>

                                                    <div class="mb-3 switchery-demo">
                                                        <label for="switchery" class="form-label">Durum</label>
                                                        <br>
                                                        <input type="hidden" name="data[durum]" value="0">
                                                        <input type="checkbox" name="data[durum]" value="1" data-color="#039cfd" 
                                                        {{ $item->durum == 1 ? "checked" : "" }} class="switchery"/>
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