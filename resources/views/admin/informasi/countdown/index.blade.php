@extends('layouts.admin')
@section('title', 'Countdown Timer')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form role="form" method="post" action="{{ route('countdown.store') }}">
            {{ csrf_field() }}
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <div class="col-md-12">
                    <div class="form-group"><span>Deadline (Format : 2020-12-31 23:59:59)</span>
                        <input type="text" class="form-control" value="{{$countdown->penutupan}}" name="penutupan">
                    </div>
                    
                </div>
                
            </div>
            <button class="btn btn-primary btn-block btn-lg" type="submit">Simpan</button></div>
        </form>
  </div>

</section>
<script>
	$(document).ready(function(){
		var flash = "{{ Session::has('pesan') }}";
		if(flash){
			var pesan = "{{ Session::get('pesan') }}";
			alert(pesan);
		}
	});
</script>
@endsection