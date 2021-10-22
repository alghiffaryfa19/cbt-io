<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table='biodatas';
    protected $guarded= ['id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id','id');
    }
}
