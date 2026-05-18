<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicion extends Model
{
    use HasFactory;

    protected $table = 'ediciones'; //nombre de la tabla de la base de datos en phpmyadmin me daba problemas y la he especificado

    protected $fillable = [
        'curso_escolar',
        'num_olimpiada',
        'num_modding',
        'num_videojuegos',
        'fecha_celebracion',
        'fecha_apertura',
        'fecha_cierre',
        'css_file'
    ];

    public static function getEdicionActual()
    {
        // Si la sesión ya tiene una edición, devolverla
        if (session()->has('edicion')) {
            return session('edicion');
        }

        // Obtener la edición más reciente por fecha de apertura
        return Edicion::orderBy('fecha_apertura', 'DESC')->first();
    }

    public function resultados()
    {
        return $this->hasOne(Resultado::class, 'id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categorias_ediciones')
                    ->withPivot('num_convocatoria');
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'edicion_grupo');
    }

    public function cursos()
    {
        return $this->hasOne(Curso::class, 'edicion_id');
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

//faltan añadir las relaciones entre tablas
