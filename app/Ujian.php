<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table='ujians';
    protected $guarded= ['id'];

    public function soal()
    {
        return $this->hasMany(\App\Soal::class, 'ujian_id','id');
    }

    public function history()
    {
        return $this->hasMany(\App\HistoryUjian::class, 'ujian_id','id');
    }

    public function nilai()
    {
        return $this->hasMany(\App\Nilai::class, 'ujian_id','id');
    }

    public function startujian()
    {
        return $this->hasMany(\App\StartUjian::class, 'ujian_id','id');
    }

    public function soaltemp()
    {
        return $this->hasMany(\App\SoalTemp::class, 'ujian_id','id');
    }

}
