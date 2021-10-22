@extends('layouts.admin')
@section('title','Master File')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Master File</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class="btn btn-outline-success">Tambah File</button>
        </div>
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>File</th>
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
            <form enctype="multipart/form-data" action="{{route('file.store')}}" method="POST">
                @method('POST')
                @csrf
                <div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                </div>
                <div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control" name="dokumen">
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
       url: "{{ route('file.index') }}",
      },

      columns:[
       {
        data: 'keterangan',
        name: 'keterangan'
       },
       {
        data: 'dokumen',
        name: 'dokumen',
        render: function(data, type, full, meta){
        return "<a target='_blank' type='button' class='btn btn-success' href={{ URL::to('/') }}/uploads/" + data + ">Buka</a>";
        },
        orderable: false
        },
       {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/file/" + data + "/edit>&nbsp;Edit</a><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/informatics/file/destroy/" + data + ">&nbsp;Delete</a></div></div>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection