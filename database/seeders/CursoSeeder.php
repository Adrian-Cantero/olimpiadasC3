<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Curso::truncate();
        foreach (self::$cursos as $curso) {
            \App\Models\Curso::create([
                'fecha_inicial' => $curso['fecha_inicial'],
                'fecha_final' => $curso['fecha_final'],
                'edicion_id' => $curso['edicion_id'],
                'enlace_moddle' => $curso['enlace_moddle']
            ]);
        }
    }

    private static $cursos = array (
        array('fecha_inicial' => 2021, 'fecha_final' => 2022, 'edicion_id' => 1, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=13'),
        array('fecha_inicial' => 2022, 'fecha_final' => 2023, 'edicion_id' => 2, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10'),
        array('fecha_inicial' => 2023, 'fecha_final' => 2024, 'edicion_id' => 3, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9'),
        array('fecha_inicial' => 2024, 'fecha_final' => 2026, 'edicion_id' => 4, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=7')
    );

}
