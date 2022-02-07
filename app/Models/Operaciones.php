<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operaciones extends Model
{
    use HasFactory;


    protected $fillable = [
        'concepto' ,'monto','fecha','tipo'
    ];


}
