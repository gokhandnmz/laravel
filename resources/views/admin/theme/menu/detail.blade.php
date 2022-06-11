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
                                    {{-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div> --}}
                                    <h4 class="page-title">Müşteri Detay</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('panel/assets/images/users/user-6.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="{{ $musteri->adsoyad }}">

                                        <h4 class="mb-0">{{ $musteri->adsoyad }}</h4>
                                        <p class="text-muted">@yonetici</p>

                                        <div class="text-start mt-3">
                                            <p class="text-muted mb-2 font-13"><strong>Bina Adı :</strong> <span class="ms-2">{{ $musteri->bina_adi }}</span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Telefon :</strong> <span class="ms-2">{{ $musteri->telefon }}</span></p>
                                            <p class="text-muted mb-1 font-13"><strong>Adres :</strong> <span class="ms-2">{{ $musteri->adres }}</span></p>
                                            <p class="text-muted mb-1 font-13"><strong>Bakım Tutarı :</strong> <span class="ms-2">{{ convert_to_money($musteri->bakim_tutari) }}</span></p>
                                            <p class="text-muted mb-1 font-13"><strong>Sözleşme Tarihi :</strong> <span class="ms-2">{{ convert_to_date($musteri->sozlesme_tarihi) }}</span></p>

                                            <p class="text-muted mb-1 font-13"><strong>Toplam Kazanç :</strong> <span class="ms-2">{{ App\Models\Musteri::totalEarnings( $musteri->id ) }}</span></p>

                                            <p class="text-muted mb-1 font-13"><strong>Toplam Borç :</strong> <span class="ms-2">{{ App\Models\Musteri::totalDebt( $musteri->id ) }}</span></p>
                                        </div>                                    
                                    </div>                                 
                                </div> <!-- end card -->

                            </div> <!-- end col-->

                            <div class="col-lg-8 col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="aboutme">
                                                <h5 class="mb-3 mt-1 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                                                    Müşteri Hareketleri</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Yapılan Iş</th>
                                                                <th>Fiyat</th>
                                                                <th>Tarih</th>
                                                                <th width="20%">Ödeme Durumu</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($bakimlar)
                                                                @foreach ($bakimlar as $bakim)
                                                                <tr>
                                                                    <td>{{ $bakim->yapilan_is }}</td>
                                                                    <td>{{ convert_to_money( $bakim->fiyat ) }}</td>
                                                                    <td>{{ convert_to_date( $bakim->tarih ) }}</td>
                                                                    <td>{!! $bakim->odeme_durumu == 1 
                                                                        ? '<span class="badge bg-soft-success text-success">Ödendi</span>' 
                                                                        : '<span class="badge bg-soft-danger text-danger">Ödenmedi</span>' !!}</td>
                                                                    @if ($bakim->odeme_durumu == 0)
                                                                        <td><a href="#" class="btn-payment" data-id="{{ $bakim->id }}">Ödeme Yap</a></td>
                                                                    @endif
                                                                </tr>  
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
    
                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->
                                        </div> <!-- end tab-content -->
                                    </div>
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
@endsection