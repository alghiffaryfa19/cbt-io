@extends('layouts.frontend')
@section('title','Master File')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Modul</h3>
    <div style="margin-bottom: 100px" class="card shadow">
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($file as $item)
                        <tr>
                            <td>
                                {{$item->keterangan}}
                            </td>
                           
                            <td>
                                <a type="button" class="btn btn-success" target="_blank" href="{{ asset('uploads/'.$item->dokumen) }}">Buka</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</div>

@endsection