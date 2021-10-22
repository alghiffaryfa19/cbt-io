@extends('layouts.admin')
@section('title','Detail Pengerjaan')
@section('content')
<div class="container-fluid">
    <h5 class="text-dark mb-4">Nilai {{$ujiann->nama}}</h5>
    <div class="card shadow">
        
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
          <form enctype="multipart/form-data" action="{{route('nilai.update', [$ujiann->id, $nilaii->id])}}" method="POST">
            @method('PUT')
            @csrf
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nilai Esay</label>
                    <input type="number" value="{{$nilaii->nilai_esay}}" class="form-control" name="nilai_esay">
                    
                </div>
            </div>
            
        </div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button>
      </form>
    </div>
</div>
</div>
@endsection