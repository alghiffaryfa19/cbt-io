<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countdown extends Model
{
    protected $table='countdowns';
    protected $guarded= ['id'];
}
