<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartUjian extends Model
{
    protected $table='start_ujians';
    protected $guarded= ['id'];


    public function ujian()
    {
        return $this->belongsTo(\App\Ujian::class, 'ujian_id','id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id','id');
    }
}
