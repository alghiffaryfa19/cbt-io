@extends('layouts.admin')
@section('title', 'Edit Partner')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('partner.update', $partner->id)}}" enctype="multipart/form-data" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="{{$partner->name}}" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="text" class="form-control" value="{{$partner->url}}" name="url" placeholder="URL">
        </div>
          <div class="form-group"><label>Logo</label><input class="form-control" type="file" name="logo"></div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection