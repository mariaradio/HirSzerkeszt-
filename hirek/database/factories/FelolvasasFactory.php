<?php

namespace Database\Factories;

use App\Models\hir;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Felolvasas>
 */
class FelolvasasFactory extends Factory
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
            'felolvaso'=>User::all()->random()->felhasznalo_id,
            'felolvasas_datuma'=>fake()->dateTime()
        ];
    }
}
