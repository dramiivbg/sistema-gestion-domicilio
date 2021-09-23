<?php

namespace Database\Factories;

use App\Models\Operadore;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperadoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operadore::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_completo' => $this->faker->sentence(),
            'telefono' => $this->faker->sentence(),
            'num_cedula' => $this->faker->randomNumber(),
            'rol'=> $this->faker->sentence(),
        ];
    }
}
