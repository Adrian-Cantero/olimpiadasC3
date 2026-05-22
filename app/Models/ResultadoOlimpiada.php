<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResultadoOlimpiada extends Model
{
    use HasFactory;

    protected $table = 'resultados_olimpiadas_cache';

    protected $fillable = [
        'grado',
        'lastname',
        'firstname',
        'id_prueba',
        'maxpuntuacion',
        'MomentoConsecución',
        'penalizaciones',
        'TiempoFinal',
        'nombrePrueba'
    ];

    public function prueba(): BelongsTo
    {
        return $this->belongsTo(Prueba::class, 'id_prueba');
    }

}
