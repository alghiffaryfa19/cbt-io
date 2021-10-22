<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table='nilais';
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
