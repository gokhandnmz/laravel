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
                                                <form method="post" action="{{ url($url.'/store') }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="baslik" class="form-label">Başlik</label>
                                                        <input type="text" name="data[baslik]" id="baslik" class="form-control" placeholder="Başlık" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="kod" class="form-label">Kod</label>
                                                        <input type="text" name="data[code]" id="kod" class="form-control" placeholder="Kod" required>
                                                    </div>

                                                    <div class="mb-3 switchery-demo">
                                                        <label for="switchery" class="form-label">Durum</label>
                                                        <br>
                                                        <input type="checkbox" checked name="data[durum]" value="1" data-color="#039cfd" class="switchery"/>
                                                        <input type="checkbox" name="data[durum]" value="0"
                                                        style="display:none">
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