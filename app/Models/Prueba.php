<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'categorias_ediciones_id',
        'patrocinadores_id'
    ];

    public function resultadosOlimpiadas(): HasMany
    {
        return $this->hasMany(ResultadoOlimpiada::class, 'id_prueba');
    }

}
