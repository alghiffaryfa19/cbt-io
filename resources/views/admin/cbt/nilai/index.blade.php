@extends('layouts.admin')
@section('title','Nilai')
@section('content')
<div class="container-fluid">
    <h5 class="text-dark mb-4">Nilai {{$ujiann->nama}}</h5>
    <div class="card shadow">
        
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nilai PG</th>
                            <th>Nilai Isian</th>
                            <th>Total</th>
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
       url: "{{ route('nilaii', $ujiann->id) }}",
      },

      columns:[
       {
        data: 'nama',
        name: 'nama'
       },
       {
        data: 'nilai',
        name: 'nilai'
       },
       {
        data: 'nilai_esay',
        name: 'nilai_esay'
       },
       {
        data: 'total',
        name: 'total'
       },
       {
        
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<a class='btn btn-primary' type='button' href={{ URL::to('/') }}/informatics/ujian/" + ujian + "/nilai/edit/" + data +">&nbsp;Detail</a>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection