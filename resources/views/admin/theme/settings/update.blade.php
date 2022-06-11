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
                                                        <label for="kod" class="form-label">Kod</label>
                                                        <input type="text" name="data[code]" id="kod" class="form-control" placeholder="Kod" value="{{ $item->code }}" required>
                                                    </div>

                                                    <div class="mb-3 switchery-demo">
                                                        <label for="switchery" class="form-label">Durum</label>
                                                        <br>
                                                        <input type="hidden" name="data[durum]" value="0">
                                                        <input type="checkbox" 
                                                        {{ $item->durum == 1 ? 'checked' : '' }}
                                                        name="data[durum]" value="1" data-color="#039cfd" class="switchery"/>
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