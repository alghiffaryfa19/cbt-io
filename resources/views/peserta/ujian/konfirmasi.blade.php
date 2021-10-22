@extends('layouts.ujian')
@section('title','Mulai Ujian')
@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-md-4 mt-5 mb-5">
        <div class="card shadow mb-5 mt-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Penyelesaian</h6>
            </div>
            <div class="card-body">
                <input type="hidden" id="ujian_idi" value="{{$mapel->ujian_id}}" name="ujian_id">
                <input type="hidden" id="mapel_idi" value="{{$mapel->mapel_id}}" name="mapel_id">
                <h5>Periksa kembali pengerjaan anda waktu anda masih tersisa <strong><span class="time_left text-danger"></span></strong></h5>
                @if(CekRagu($mapel->ujian_id) > 0)
                <span class="text-danger">Kamu masih memiliki jawaban ragu-ragu sebanyak {{$ragu}}, kembali dan selesaikan</span>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Kembali mengerjakan</a>
                @if(CekRagu($mapel->ujian_id) == 0)
                
                <button class="btn btn-sm btn-danger" id="selesai_sudah" onclick="finish()">Selesai mengerjakan</button>
                
                    
                
                @endif
            </div>
        </div>
    </div>
</div>
@php $tipe='konfirmasi'; @endphp
@endsection