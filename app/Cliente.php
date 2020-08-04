<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['apellidos','nombres','email','telefono','iban','dni','direccion'];
}
