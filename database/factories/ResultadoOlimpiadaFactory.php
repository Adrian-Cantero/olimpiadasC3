<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResultadoOlimpiadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $momento_consecucion = fake()->dateTimeBetween('2026-05-13 00:00:00', '2026-05-13 23:59:59');
        $penalizaciones = fake()->numberBetween(0, 5);

        $oper_tiempo_final = Carbon::instance($momento_consecucion)->addSeconds($penalizaciones * 30);
        $grado = fake()->randomElement(['GM', 'GS']);

        return [
            'grado' => $grado,
            'maxpuntuacion' => fake()->randomElement([0, 33, 66, 100]),
            'MomentoConsecución' => $momento_consecucion,
            'TiempoFinal' => $oper_tiempo_final,
            'penalizaciones' => $penalizaciones,
            'nombrePrueba' => $grado == 'GM' ? fake()->randomElement(['Hardware', 'Sistemas', 'Redes Locales'])
                                             : fake()->randomElement(['Programación', 'Bases de datos', 'Redes Locales', 'Sistemas', 'Lenguajes de Marcas'])
        ];
    }
}
