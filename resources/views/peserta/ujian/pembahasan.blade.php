@extends('layouts.frontend')
@section('title','Pembahasan'.$detail->nama)
@section('content')
<div class="row justify-content-center">
	<div class="col-md-8 mt-5">
		<div class="card shadow mb-5">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Pembahasan {{ $detail['nama']}}</h6>
			</div>
			<div class="card-body">
                <h4>Detail Pengerjaan Ujian</h4>
                <table>
                  <tbody>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>{{ $nilaii->user->name }}</td>
                    </tr>
                    
                    <tr>
                      <td>Nilai PG</td>
                      <td>:</td>
                      <td>{{ $nilaii['nilai'] }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Isian</td>
                        <td>:</td>
                        <td>{{ $nilaii['nilai_esay'] }}</td>
                      </tr>
                  </tbody>
                </table>
                <hr/>
                <h5>Pengerjaan Anda</h5>
                <ol>
                  @foreach($pengerjaan as $data)
                      <li>{!! $data->soal !!}
                        @if($data->soal_image != NULL)
                          <img class="mb-3" src="{{ asset('images/gambar_soal/'.$data->soal_image) }}" />
                        @endif
                        @if(
                          $data->option_1 != null && $data->option_2 != null &&  $data->option_3 != null &&  $data->option_4 != null &&  $data->option_5 != null
                        )
                        <ol type="a" class="option_test">
                          <li class="{{ CekPengerjaan('a',$data->your_answer,$data->right_answer) }}">
                              @if(strpbrk($data->option_1, 'jpg') == 'jpg' || strpbrk($data->option_1, 'JPG') == 'JPG' || strpbrk($data->option_1, 'png') == 'png' || strpbrk($data->option_1, 'PNG') == 'PNG' )
                                <img class="mb-3" style="width: 100px;" src="{{ asset('images/gambar_jawaban/'.$data->option_1) }}" />
                              @else
                                {{ $data->option_1 }}
                              @endif
                          </li>
                          <li class="{{ CekPengerjaan('b',$data->your_answer,$data->right_answer) }}">
                            @if(strpbrk($data->option_2, 'jpg') == 'jpg' || strpbrk($data->option_2, 'JPG') == 'JPG' || strpbrk($data->option_2, 'png') == 'png' || strpbrk($data->option_2, 'PNG') == 'PNG' )
                                <img class="mb-3" style="width: 100px;" src="{{ asset('images/gambar_jawaban/'.$data->option_2) }}" />
                              @else
                                {{ $data->option_2 }}
                              @endif
                          </li>
                          <li class="{{ CekPengerjaan('c',$data->your_answer,$data->right_answer) }}">
                            @if(strpbrk($data->option_3, 'jpg') == 'jpg' || strpbrk($data->option_3, 'JPG') == 'JPG' || strpbrk($data->option_3, 'png') == 'png' || strpbrk($data->option_3, 'PNG') == 'PNG' )
                                <img class="mb-3" style="width: 100px;" src="{{ asset('images/gambar_jawaban/'.$data->option_3) }}" />
                              @else
                                {{ $data->option_3 }}
                              @endif
                          </li>
                          <li class="{{ CekPengerjaan('d',$data->your_answer,$data->right_answer) }}">@if(strpbrk($data->option_4, 'jpg') == 'jpg' || strpbrk($data->option_4, 'JPG') == 'JPG' || strpbrk($data->option_4, 'png') == 'png' || strpbrk($data->option_4, 'PNG') == 'PNG' )
                                <img class="mb-3" style="width: 100px;" src="{{ asset('images/gambar_jawaban/'.$data->option_4) }}" />
                              @else
                                {{ $data->option_4 }}
                              @endif
                          </li>
                          <li class="{{ CekPengerjaan('e',$data->your_answer,$data->right_answer) }}">
                            @if(strpbrk($data->option_5, 'jpg') == 'jpg' || strpbrk($data->option_5, 'JPG') == 'JPG' || strpbrk($data->option_5, 'png') == 'png' || strpbrk($data->option_5, 'PNG') == 'PNG' )
                                <img class="mb-3" style="width: 100px;" src="{{ asset('images/gambar_jawaban/'.$data->option_5) }}" />
                              @else
                                {{ $data->option_5 }}
                              @endif
                          </li>
                        </ol>
                        @else
                          <br/>
                          <strong>Jawaban Esay : </strong>
                          <span >{{ $data->your_answer }}</span>
                        @endif
                      </li>
            
                  @endforeach
                </ol>
                <hr/>
                <div class="text-center">
                  <strong>Jawaban Benar</strong>
                </div>
                <ol>
                  @foreach($pengerjaan as $data)
                    <li>{{ $data->right_answer }}</li>
                    <span>Pembahasan:</span><br>
                    <p>{!! $data->pembahasan !!}</p>
                  @endforeach
                </ol>
              </div>
        </div>
			
		</div>
	</div>
</div>
@endsection