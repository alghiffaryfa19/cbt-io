<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryUjian extends Model
{
    protected $table='history_ujians';
    protected $guarded= ['id'];


    public function ujian()
    {
        return $this->belongsTo(\App\Ujian::class, 'ujian_id','id');
    }

    public function soal()
    {
        return $this->belongsTo(\App\Soal::class, 'soal_id','id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id','id');
    }
}
