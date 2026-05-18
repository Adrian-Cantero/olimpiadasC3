<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'edicion_id',
        'fecha_inicial',
        'fecha_final',
        'enlace_moddle'
    ];

    public function edicion()
    {
        return $this->belongsTo(Edicion::class);
    }

}
