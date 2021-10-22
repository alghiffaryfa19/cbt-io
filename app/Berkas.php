<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table='berkas';
    protected $guarded= ['id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id','id');
    }
}
