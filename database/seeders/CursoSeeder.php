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
                'curso' => $curso['curso'],
                'num_olimpiada' => $curso['num_olimpiada'],
                'edicion_id' => $curso['edicion_id'],
                'enlace_moddle' => $curso['enlace_moddle']
            ]);
        }
    }

    private static $cursos = array (
        array('curso' => '2021-2022', 'num_olimpiada' => 13, 'edicion_id' => 1, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=13'),
        array('curso' => '2022-2023', 'num_olimpiada' => 14, 'edicion_id' => 2, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=10'),
        array('curso' => '2023-2024', 'num_olimpiada' => 15, 'edicion_id' => 3, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=9'),
        array('curso' => '2024-2025', 'num_olimpiada' => 16, 'edicion_id' => 4, 'enlace_moddle' => 'https://cifpcarlos3.net/codeweek/course/view.php?id=7')
    );

}
