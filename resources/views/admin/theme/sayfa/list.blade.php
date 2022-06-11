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
                                    <div class="page-title-right">
                                       <a href="{{ url($url.'/add') }}" class="btn btn-sm btn-primary"><i data-feather="plus"></i> Yeni Kayıt</a>
                                    </div>
                                    <h4 class="page-title">Liste</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
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
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Başlık</th>
                                                    <th>Link</th>
                                                    <th>Kayıt Tarihi</th>
                                                    <th>Durum</th>
                                                    <th>Işlem</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sortable" data-table="sayfa">
                                                @if ($list) 
                                                    @foreach($list as $item)
                                                    <tr id="list-{{ $item->id }}">
                                                        <td>{{ $item->baslik }}</td>
                                                        <td>{{ $item->slug }}</td>
                                                        <td>{{ convert_to_date($item->created_at) }}</td>
                                                        <td>{!! $item->durum == 1 
                                                        ? '<span class="badge bg-soft-success text-success">Aktif</span>' 
                                                        : '<span class="badge bg-soft-danger text-danger">Pasif</span>' !!}</td>
                                                        <td>
                                                            <a href="{{ url($url.'/update/'.$item->id) }}" class="btn btn-sm btn-success">Güncelle</a>
                                                            <a href="{{ url($url.'/destroy/'.$item->id) }}" class="btn btn-sm btn-danger delete">Sil</a>
                                                        </td>
                                                    </tr>  
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
@endsection