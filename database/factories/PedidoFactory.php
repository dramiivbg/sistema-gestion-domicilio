<?php

namespace Database\Factories;

use App\Models\Operadore;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'num_pedido'=> $this->faker->sentence(),
            'direccion'=> $this->faker->sentence(),
            'id_domiciliario' => Operadore::all()->random()->id,
            'empresa_cliente'=> $this->faker->sentence(),
            'telefono_comprador'=> $this->faker->phoneNumber(),
            'telefono_vendedor'=> $this->faker->phoneNumber(),
            'email_vendedor'=> $this->faker->email(),
            'email_comprador'=> $this->faker->email(),
            'estado'=> $this->faker->sentence(),
            'fecha_llegada'=> $this->faker->date(),
            'fecha_entrega'=> $this->faker->date(),

        ];
    }
}
