@extends('layouts.admin')
@section('title','Master Soal')
@section('content')
<div class="container-fluid">
    <h5 class="text-dark mb-4">Master Soal {{$ujiann->nama}}</h5>
    <div class="card shadow">
        <div class="card-header py-3">
            <a href="{{route('soal.create', $ujiann->id)}}" type="button" class="btn btn-outline-success">Tambah Soal</a>
        </div>
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Nama</th>
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
  <script>
    $(document).ready(function(){
        var ujian = '{{$ujiann->id}}';
     $('#user_table').DataTable({
         
      processing: true,
      serverSide: true,
      ajax:{
       url: "{{ route('soal', $ujiann->id) }}",
      },

      columns:[
        {
        data: 'soall',
        name: 'soall'
       },
       {
        
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/ujian/" + ujian + "/soal/edit/" + data +">&nbsp;Edit</a><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/ujian/" + ujian + "/soal/destroy/" + data +">&nbsp;Delete</a></div></div>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection