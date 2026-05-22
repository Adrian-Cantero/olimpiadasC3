<?php

namespace Database\Seeders;

use App\Models\ResultadoOlimpiada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultadoOlimpiadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResultadoOlimpiada::factory()->count(30)->create();
    }
}
