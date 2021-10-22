<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table='soals';
    protected $guarded= ['id'];

    public function ujian()
    {
        return $this->belongsTo(\App\Ujian::class, 'ujian_id','id');
    }

    public function history()
    {
        return $this->hasMany(\App\HistoryUjian::class, 'soal_id','id');
    }

    public function soaltemp()
    {
        return $this->hasMany(\App\SoalTemp::class, 'soal_id','id');
    }
}
