<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KorlatokFactory extends Factory
{
    public function definition()
    {

        return [
        'beallitas_kezdete'=>$this->faker->date(),
        'admin'=>$this->faker->randomDigit(),
        'cim_hossza'=>$this->faker->randomDigit(),
        'tartalom_hossza'=>$this->faker->randomDigit(),
        ];
    }
}
