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
                                                <form method="post" action="{{ url('/admin/'.$table_name.'/image-settings/store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="table_name" value="{{ $table_name }}">

                                                    <ul class="nav nav-tabs nav-bordered">
                                                        <li class="nav-item">
                                                            <a href="#icerik" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                İçerik
                                                            </a>
                                                        </li>
                                                    </ul>


                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="icerik">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="width" class="form-label">Genişlik ( Büyük )</label>
                                                                        <input type="text" name="data[main][width]" id="width" class="form-control" placeholder="Genişlik" required value="{{ @$data[0]->width }}">
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <label for="height" class="form-label">Yükseklik ( Büyük )</label>
                                                                        <input type="text" name="data[main][height]" id="height" class="form-control" placeholder="Yükseklik" required value="{{ @$data[0]->height }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="width" class="form-label">Genişlik ( Listeleme )</label>
                                                                        <input type="text" name="data[list][width]" id="width" class="form-control" placeholder="Genişlik" required value="{{ @$data[1]->width }}">
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <label for="height" class="form-label">Yükseklik ( Listeleme )</label>
                                                                        <input type="text" name="data[list][height]" id="height" class="form-control" placeholder="Yükseklik" required value="{{ @$data[1]->height }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="width" class="form-label">Genişlik ( Thumbnail )</label>
                                                                        <input type="text" name="data[thumbnail][width]" id="width" class="form-control" placeholder="Genişlik" required value="{{ @$data[2]->width }}">
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <label for="height" class="form-label">Yükseklik ( Thumbnail )</label>
                                                                        <input type="text" name="data[thumbnail][height]" id="height" class="form-control" placeholder="Yükseklik" required value="{{ @$data[2]->height }}">
                                                                    </div>
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