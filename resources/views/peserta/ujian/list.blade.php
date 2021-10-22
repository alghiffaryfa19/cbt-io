@extends('layouts.frontend')
@section('title','Daftar Ujian')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-8 mt-5 mb-5">
		<div class="card shadow mt-5 mb-5">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					
					<h6 class="text-success"><b>Ujian</b></h6>
					<table class="table table-sm table-bordered table-striped" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
                                <th>Nama Ujian</th>
                                <th>Tgl Ujian</th>
								<th>Ujian Dimulai</th>
								<th>Lama Ujian</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0; @endphp
							@foreach($ujian as $data) @php $no++; @endphp
							<tr>
								<td>{{ $no }}</td>
                                <td>{{ $data->nama }}</td>	
                                <td>{{ $data->date_ujian }}</td>							
								<td>{{ $data->time_start }}</td>
								<td>{{ $data->lama_ujian/3600 }} Jam</td>
								<td>
									@if(cekSudahDikerjakan($data->id,Auth::user()->id) > 0 && cekMasihDikerjakan($data->ujian_id,$data->id) == 0 )
                                        <a href="{{route('pembahasan', $data->id)}}" class="btn btn-secondary btn-sm">Pembahasan dan Nilai</a>
									@elseif(cekMasihDikerjakan($data->id,Auth::user()->id) == 1 )
										<a href="{{ url('test/soal/'.$data->id.'/'.'1') }}" class="btn btn-warning btn-sm">Lanjutkan Mengerjakan</a>
									@else
										<a href="{{route('detail.ujian', $data->id)}}" class="btn btn-primary btn-sm {{ waktu($data->date_ujian) }}">Lihat Detail</a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mt-5">

</div>
@endsection