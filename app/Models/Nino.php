<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nino extends Model
{
    //
    protected $fillable = [
        'id',
        'nombre',
        'salon',
        'edad',
        'genero',
        'acudiente_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    // El nño pertenece a un acudiente
    public function acudiente(){
        return $this->belongsTo(Acudiente::class, 'acudiente_id');
    }
}
