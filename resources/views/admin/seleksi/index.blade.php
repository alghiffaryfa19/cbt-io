@extends('layouts.admin')
@section('title','Seleksi')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Seleksi</h3>
    <div class="card shadow">

        <div class="card-body">
            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>                          
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Kelolosan</th>
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
      serverSide: true,
      ajax:{
       url: "{{ route('seleksi.index') }}",
      },
      columns:[
       {
        data: 'nama',
        name: 'nama'
       },
       {
        data: 'cekkarya',
        name: 'cekkarya'
       },
       {
        data: 'status',
        name: 'status'
       },
       {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/seleksi/" + data + "/edit>&nbsp;Edit</a></div></div>";
          },
          orderable: false
        }
      ]
     });
    });
    </script>
@endsection