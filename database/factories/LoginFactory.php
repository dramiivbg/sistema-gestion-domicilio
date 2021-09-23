<?php

namespace Database\Factories;

use App\Models\Login;
use App\Models\Operadore;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Login::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'id_operador' => Operadore::all()->random()->id,
            
            

        ];
    }
}
