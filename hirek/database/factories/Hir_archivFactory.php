<?php

namespace Database\Factories;

use App\Models\hir;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hir_archiv>
 */
class Hir_archivFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hir'=>hir::all()->random()->hir_id,
            'csere'=>fake()->dateTime(),
            'ervenyesseg'=>fake()->dateTime(),
            'cim'=>fake()->title(),
            'tartalom'=>fake()->text(),
        ];
    }
}
