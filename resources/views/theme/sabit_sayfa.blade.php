@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="sabit-content pdt-80 pdb-80">
                {!! $sayfa->icerik !!}
            </div>
        </div>
    </div>
@endsection