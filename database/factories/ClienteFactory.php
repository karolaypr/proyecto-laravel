<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'dni'=>$this->faker->numberBetween(1,9),
            'telefono'=>$this->faker->numberBetween(1,9),
            'direccion'=>$this->faker->sentence(),
            'email'=>$this->faker->sentence(),
            'avatar'=>$this->faker->sentence(),
            'ruta'=>$this->faker->sentence()
        ];
    }
}
