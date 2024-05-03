<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hir>
 */
class HirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "szerkeszto"=>User::all()->random()->felhasznalo_id,
            "cim"=>fake()->title(),
            "tartalom"=>fake()->text(),
            "letrehozas"=>fake()->dateTime(),
            "utolso_szerkesztes"=>fake()->dateTime(),
            "felolvasasok_szama"=>fake()->randomNumber(),
            "ervenyesseg"=>fake()->dateTime(),
        ];
    }
};