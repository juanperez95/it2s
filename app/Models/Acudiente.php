<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    //
    protected $fillable = [
        'id',
        'nombre',
        'genero'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
