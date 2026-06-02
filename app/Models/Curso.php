<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'edicion_id',
        'curso',
        'num_olimpiada',
        'enlace_moddle'
    ];

    public function edicion()
    {
        return $this->belongsTo(Edicion::class);
    }

    private static function convertirARomano($numero) {
        $n = intval($numero);
        $resultado = '';
        $valores = [
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ];
        foreach ($valores as $romano => $valor) {
            $coincidencias = intval($n / $valor);
            if ($coincidencias > 0) {
                $resultado .= str_repeat($romano, $coincidencias);
                $n = $n % $valor;
            }
        }
        return $resultado;
    }

    protected function numOlimpiadasRomano(): Attribute
    {
        return Attribute::make(
            get: fn () => self::convertirARomano($this->num_olimpiada),
        );
    }

}
