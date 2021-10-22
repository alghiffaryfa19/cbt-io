<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Ujian;
use Illuminate\Support\Facades\Session;
use App\StartUjian;
use App\Nilai;
use App\HistoryUjian;
use App\SoalTemp;
use App\Soal;

class DataUjianController extends Controller
{
    public function index()
    {
        $now = Carbon::parse(Carbon::now())->format('Y-m-d');
        $ujian = Ujian::all();
        return view('peserta.ujian.list', compact('ujian'));
    }

    public function detail_ujian($ujian)
    {
    	$detail = Ujian::findOrfail($ujian);
    	return view('peserta.ujian.detailujian',compact('detail'));
    }

    public function start_ujian(Request $request)
    {
    	$lm_ujian = $request->lm_ujian;
        $time_end = strtotime(date('H:i:s')) + $lm_ujian;
        StartUjian::create([
            'ujian_id' => $request->ujian_id,
            'user_id' => auth()->user()->id,
            'time_start' => Carbon::parse(Carbon::now())->format('H:i:s'),
            'time_end' => date('H:i:s',$time_end),
            'is_active' => 1,
          ]);

        $soal = Soal::where('ujian_id',$request->ujian_id)->get();
        $no = 0;
        foreach ($soal as $data) {
            $no++;
            SoalTemp::create([
                'nomor_soal' => $no,
                'ujian_id' => $data->ujian_id,
                'user_id' => auth()->user()->id,
                'soal_id' => $data->id,
              ]);

            }

    	$getSoal = SoalTemp::where('ujian_id',$request->ujian_id)->where('user_id',auth()->user()->id)->orderBy('id','ASC')->first();
    	echo json_encode(array('response' => TRUE, 
            'ujian_id' => $getSoal['ujian_id'],
            'no_soal' => $getSoal['nomor_soal']
        ));
    }

    public function getSoal($ujian,$no_soal)
    {
    	$soal = Soal::join('soal_temps','soal_temps.soal_id','=','soals.id')
            ->where('soals.ujian_id',$ujian)->where('soal_temps.nomor_soal',$no_soal)->first();
        $daftarSoal = Soal::join('soal_temps','soal_temps.soal_id','=','soals.id')
            ->where('soal_temps.user_id',auth()->user()->id)
            ->where('soals.ujian_id',$ujian)->get();
        $pengerjaan = StartUjian::where('user_id',auth()->user()->id)
            ->where('ujian_id',$ujian)->first();
    	return view('peserta.ujian.cbt',compact('soal','pengerjaan','daftarSoal'));
    }

    public function simpanSoal(Request $request)
    {
        if(cekSdhJawabSoal($request->soal_id,auth()->user()->id) == 1){
           $getIDhis = HistoryUjian::where('soal_id',$request->soal_id)->where('user_id',auth()->user()->id)->first();
            $hisPengerjaan = HistoryUjian::findOrfail($getIDhis['id']);
        }else{
            $hisPengerjaan = new HistoryUjian();
        } 
        $hisPengerjaan->ujian_id = $request->ujian_id;
        $hisPengerjaan->soal_id = $request->soal_id;
        $hisPengerjaan->user_id = auth()->user()->id;
        $hisPengerjaan->your_answer = $request->answer;
        $hisPengerjaan->betul_or_tidak = cekjawaban($request->soal_id,$request->answer);
        $hisPengerjaan->yakin_or_not = $request->kondisi;
        $hisPengerjaan->save();
        echo json_encode(true);
    }

    public function konfirmasi($id)
    {
        $ragu = HistoryUjian::where('ujian_id',$id)
        ->where('user_id',auth()->user()->id)->where('yakin_or_not',0)->count();

        $yakin = HistoryUjian::where('ujian_id',$id)
        ->where('user_id',auth()->user()->id)->where('yakin_or_not',1)->count();
        
        $mapel = StartUjian::where('ujian_id',$id)->where('user_id',auth()->user()->id)->first();
        return view('peserta.ujian.konfirmasi',compact('mapel','ragu','yakin'));
    }

    public function finish(Request $request)
    {
        StartUjian::where('ujian_id',$request->ujian_id)
            ->where('user_id',auth()->user()->id)->delete();
        SoalTemp::where('ujian_id',$request->ujian_id)
            ->where('user_id',auth()->user()->id)->delete();

        $getSkor = HistoryUjian::where('ujian_id',$request->ujian_id)
            ->where('user_id',auth()->user()->id)
            ->where('betul_or_tidak',1)->get();
        $getSkorSalah = HistoryUjian::where('ujian_id',$request->ujian_id)
            ->where('user_id',auth()->user()->id)
            ->where('betul_or_tidak',0)->get();
        $skorAkhir = 0;
        $skorAkhirSalah = 0;
        foreach ($getSkor as $skor) {
            $soalSkor = Soal::findOrfail($skor->soal_id);
            $skorAkhir = $skorAkhir + $soalSkor['skor'];
        }
        foreach ($getSkorSalah as $skorsalah) {
            $soalSkorSalah = Soal::findOrfail($skorsalah->soal_id);
            $skorAkhirSalah = $skorAkhirSalah + $soalSkor['skor_salah'];
        }
        $nilai = new Nilai();
        $nilai->user_id = auth()->user()->id;
        $nilai->ujian_id = $request->ujian_id;
        $nilai->jumlah_jawaban_benar = jawaban_benar($request->ujian_id,auth()->user()->id);
        $nilai->jumlah_jawaban_salah = jawaban_salah($request->ujian_id,auth()->user()->id);
        $nilai->nilai = $skorAkhir - $skorAkhirSalah;
        $nilai->save();
        echo json_encode(true);
    }

    public function pembahasan($ujian)
    {
        $detail = Ujian::findOrfail($ujian);
        $nilaii = Nilai::where('user_id',auth()->user()->id)->where('ujian_id',$detail->id)->first();
        $pengerjaan = HistoryUjian::join('users','users.id','=','history_ujians.user_id')->join('soals','soals.id','=','history_ujians.soal_id')
    		->where('history_ujians.user_id',auth()->user()->id)
    		->where('history_ujians.ujian_id',$detail->id)->get();
    	return view('peserta.ujian.pembahasan',compact('detail','pengerjaan','nilaii'));
    }
}
