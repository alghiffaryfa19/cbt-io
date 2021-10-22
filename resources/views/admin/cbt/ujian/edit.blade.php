@extends('layouts.admin')
@section('title', 'Edit Ujian')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form enctype="multipart/form-data" action="{{route('ujian.update', $ujian->id)}}" method="POST">
            @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{$ujian->nama}}" class="form-control" name="nama" placeholder="Name">
                    
                </div>
                <div class="form-group">
                    <label>Tgl Ujian (Ex : yyyy-mm-dd hh:mm:ss)</label>
                    <input type="text" value="{{$ujian->date_ujian}}" class="form-control" id="datepicker" name="date_ujian" placeholder="Tgl Ujian">
                </div>
                <div class="form-group">
                    <label>Waktu Ujian</label>
                    <input type="text" value="{{$ujian->time_start}}" class="form-control timepicker" name="time_start" placeholder="Waktu Ujian">
                </div>
                <div class="form-group">
                    <label>Durasi (Ex : 1 untuk 1 jam)</label>
                    <input type="number" value="{{$ujian->lama_ujian/3600}}" class="form-control" name="lama_ujian" placeholder="Durasi">
                </div>
            </div>
            
        </div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection