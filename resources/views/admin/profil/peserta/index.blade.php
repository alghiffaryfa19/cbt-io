@extends('layouts.admin')
@section('title','Peserta')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Peserta</h3>
    <div class="card shadow">
        
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>WA</th>
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
      var id = $(this).attr('id');
     $('#user_table').DataTable({
      processing: true,
      stateSave: true,
      serverSide: true,
      ajax:{
       url: "{{ route('biodata.index') }}",
      },
      columns:[
       {
        data: 'nisn',
        name: 'nisn'
       },
       {
        data: 'user.name',
        name: 'user.name'
       },
       {
        data: 'no_wa',
        name: 'no_wa'
       },
       {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/biodata/" + data + "/edit>&nbsp;Detail</a></div></div>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection