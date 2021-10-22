@extends('layouts.admin')
@section('title', 'Tambah Soal')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form enctype="multipart/form-data" action="{{route('soal.store', $ujiann->id)}}" method="POST">
            {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Soal</label>
                    <textarea name="soal" class="form-control summernote"></textarea>
                </div>

                <div class="form-group">
                    <label>Jenis Soal</label>
                    <select class="form-control rounded-0" id="jenis_soal" name="jenis_soal">
                        <option value=""></option>
                        <option value="1">Pilihan Ganda</option>
                        <option value="0">Isian</option>
                    </select>
                </div>

                <div id="a" class="form-group">
                    <label>Jawaban A</label>
                    <textarea id="jawaban_a" name="option_1" class="form-control"></textarea>
                </div>
                <div id="b" class="form-group">
                    <label>Jawaban B</label>
                    <textarea id="jawaban_b" name="option_2" class="form-control"></textarea>
                </div>
                <div id="c" class="form-group">
                    <label>Jawaban C</label>
                    <textarea id="jawaban_c" name="option_3" class="form-control"></textarea>
                </div>
                <div id="d" class="form-group">
                    <label>Jawaban D</label>
                    <textarea id="jawaban_d" name="option_4" class="form-control"></textarea>
                </div>
                <div id="e" class="form-group">
                    <label>Jawaban E</label>
                    <textarea id="jawaban_e" name="option_5" class="form-control"></textarea>
                </div>

                <div id="f" class="form-group">
                    <label>Jawaban Benar</label>
                    <select class="form-control rounded-0" id="right_answer" name="key_answer">
                        <option value=""></option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                        <option value="e">E</option>
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
                    <textarea name="pembahasan" class="form-control summernote"></textarea>
                </div>

                <div class="form-group">
                    <label>Nilai Benar</label>
                    <input name="skor" class="form-control" type="number"/>
                </div>

                <div class="form-group">
                    <label>Nilai Salah (Meski minus, isinya plus ya kaka hehe)</label>
                    <input name="skor_salah" class="form-control" type="number"/>
                </div>
            </div>
            
        </div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Simpan</button></div>
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