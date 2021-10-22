<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table='sekolahs';
    protected $guarded= ['id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id','id');
    }
}
