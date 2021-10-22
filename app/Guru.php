<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table='gurus';
    protected $guarded= ['id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id','id');
    }
}
