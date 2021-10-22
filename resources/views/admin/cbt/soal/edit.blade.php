@extends('layouts.admin')
@section('title', 'Edit Soal')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form enctype="multipart/form-data" action="{{route('soal.update', [$ujiann->id, $soall->id])}}" method="POST">
            @method('PUT')
            @csrf
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Soal</label>
                    <textarea name="soal" class="form-control summernote">{!!$soall->soal!!}</textarea>
                </div>

                <div class="form-group">
                    <label>Jenis Soal</label>
                    <select class="form-control rounded-0" id="jenis_soal" name="jenis_soal">
                        <option @if($soall->jenis_soal == '') selected @endif value=""></option>
                        <option @if($soall->jenis_soal == '1') selected @endif value="1">Pilihan Ganda</option>
                        <option @if($soall->jenis_soal == '0') selected @endif value="0">Isian</option>
                    </select>
                </div>

                <div id="a" class="form-group">
                    <label>Jawaban A</label>
                    <textarea id="jawaban_a" name="option_1" class="form-control">{{$soall->option_1}}</textarea>
                </div>
                <div id="b" class="form-group">
                    <label>Jawaban B</label>
                    <textarea id="jawaban_b" name="option_2" class="form-control">{{$soall->option_2}}</textarea>
                </div>
                <div id="c" class="form-group">
                    <label>Jawaban C</label>
                    <textarea id="jawaban_c" name="option_3" class="form-control">{{$soall->option_3}}</textarea>
                </div>
                <div id="d" class="form-group">
                    <label>Jawaban D</label>
                    <textarea id="jawaban_d" name="option_4" class="form-control">{{$soall->option_4}}</textarea>
                </div>
                <div id="e" class="form-group">
                    <label>Jawaban E</label>
                    <textarea id="jawaban_e" name="option_5" class="form-control">{{$soall->option_5}}</textarea>
                </div>

                <div id="f" class="form-group">
                    <label>Jawaban Benar</label>
                    <select class="form-control rounded-0" id="right_answer" name="key_answer">
                        <option @if($soall->right_answer == '') selected @endif value=""></option>
                        <option @if($soall->right_answer == 'a') selected @endif value="a">A</option>
                        <option @if($soall->right_answer == 'b') selected @endif value="b">B</option>
                        <option @if($soall->right_answer == 'c') selected @endif value="c">C</option>
                        <option @if($soall->right_answer == 'd') selected @endif value="d">D</option>
                        <option @if($soall->right_answer == 'e') selected @endif value="e">E</option>
                    </select>
                </div>

                <div id="esay" style="display: none;"> 
                    <div class="form-group">
                      <label>Jawaban Esay</label>
                      <textarea name="esay_answer" id="esay_answer" class="form-control"></textarea>
                    </div>
                  </div>
                
                <div class="form-group">
                    <label>Pembahasan</label>
                    <textarea name="pembahasan" class="form-control summernote">{!!$soall->pembahasan!!}</textarea>
                </div>

                <div class="form-group">
                    <label>Nilai</label>
                    <input name="skor" value="{{$soall->skor}}" class="form-control" type="number"/>
                </div>
                <div class="form-group">
                    <label>Nilai Salah (Meski minus, isinya plus ya kaka hehe)</label>
                    <input name="skor_salah" value="{{$soall->skor_salah}}" class="form-control" type="number"/>
                </div>

            </div>
            
        </div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Perbarui</button></div>
      </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
     $('.summernote').summernote({
           height: 200,
      });
   });
 </script>
     <script type="text/javascript">
        $(function () {
          $("#jenis_soal").change(function() {
            var val = $(this).val();
            if(val == 1) {
                $("#a").show();
                $("#b").show();
                $("#c").show();
                $("#d").show();
                $("#e").show();
                $("#f").show();
                $('#esay').hide();
            }
            else if(val == 0) {
                $("#a").hide();
                $("#b").hide();
                $("#c").hide();
                $("#d").hide();
                $("#e").hide();
                $("#f").hide();
                $('#esay').show();
                document.getElementById("jawaban_a").value = '';
                document.getElementById("jawaban_b").value = '';
                document.getElementById("jawaban_c").value = '';
                document.getElementById("jawaban_d").value = '';
                document.getElementById("jawaban_e").value = '';
                document.getElementById("right_answer").value = '';


            }
          });
        });
        </script>
@endsection