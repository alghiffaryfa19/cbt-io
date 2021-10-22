@extends('layouts.admin')
@section('title', 'Edit File')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('file.update', $file->id)}}" enctype="multipart/form-data" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" value="{{$file->keterangan}}" name="keterangan" placeholder="Keterangan">
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="dokumen">
        </div>
         
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection