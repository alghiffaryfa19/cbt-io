@extends('layouts.admin')
@section('title','Master Ujian')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Master Ujian</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class="btn btn-outline-success">Tambah Ujian</button>
        </div>
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tgl Ujian</th>
                            <th>Jam Ujian</th>
                            <th>Durasi</th>
                            <th>Soal</th>
                            <th>Hasil</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('ujian.store')}}" method="POST">
                @method('POST')
                @csrf
                <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="nama" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Tgl Ujian</label>
                    <input autocomplete="off" type="text" class="form-control" name="date_ujian" id="datepicker" placeholder="Tgl Ujian">
                </div>
                <div class="form-group">
                    <label>Waktu Ujian</label>
                    <input type="text" name="time_start" class="form-control timepicker" placeholder="Waktu Ujian">
                </div>
                <div class="form-group">
                    <label>Durasi (Ex : 1 untuk 1 jam)</label>
                    <input type="number" class="form-control" name="lama_ujian" placeholder="Durasi">
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
        </div>
        
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
     $('#user_table').DataTable({
         
      processing: true,
      serverSide: true,
      ajax:{
       url: "{{ route('ujian.index') }}",
      },

      columns:[
       {
        data: 'nama',
        name: 'nama'
       },
       {
        data: 'date_ujian',
        name: 'date_ujian'
       },
       {
          data: 'time_start',
          name: 'time_start',
          render: function(data, type, full, meta){
            return ""+ data +" WIB";
          },
          orderable: false
        },
       {
          data: 'jam',
          name: 'jam',
          render: function(data, type, full, meta){
            return ""+ data +" menit";
          },
          orderable: false
        },
        {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<a type='button' class='btn btn-success btn-sm' href={{ URL::to('/') }}/informatics/ujian/" + data + "/soal>&nbsp;Soal</a>";
          },
          orderable: false
        },
        {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<a type='button' class='btn btn-success btn-sm' href={{ URL::to('/') }}/informatics/ujian/" + data + "/hasil>&nbsp;Hasil</a>";
          },
          orderable: false
        },
       {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/ujian/" + data + "/edit>&nbsp;Edit</a><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/ujian/destroy/" + data + ">&nbsp;Delete</a></div></div>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection