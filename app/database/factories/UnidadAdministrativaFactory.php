<?php

namespace Database\Factories;

use App\Models\UnidadAdministrativa;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadAdministrativaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnidadAdministrativa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence,
            'estatus' => $this->faker->randomElement([1,2]),
        ];
    }
}
