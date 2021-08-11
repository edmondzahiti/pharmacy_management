<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PharmacyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pharmacy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => $this->faker->text(7),
            'email'      => $this->faker->email,
            'vat_number' => $this->faker->unique()->numberBetween(1, 1000),
            'phone'      => $this->faker->phoneNumber,
            'active'     => true,
        ];
    }

}
