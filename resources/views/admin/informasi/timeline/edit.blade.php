@extends('layouts.admin')
@section('title', 'Edit Timeline')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('timeline.update', $timeline->id)}}" enctype="multipart/form-data" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" value="{{$timeline->keterangan}}" name="keterangan" placeholder="Keterangan">
        </div>
        <div class="form-group">
            <label>Waktu</label>
            <input type="text" class="form-control" value="{{$timeline->waktu}}" name="waktu" placeholder="Waktu">
        </div>
        <div class="form-group">
            <label>Detail</label>
            <textarea class="form-control" name="detail">{{$timeline->detail}}</textarea>
            
        </div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection