<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'   => $this->faker->name,
            'last_name'    => $this->faker->lastName,
            'email'        => $this->faker->email,
            'phone'        => $this->faker->phoneNumber,
            'pharmacy_id'  => Pharmacy::factory(),
        ];
    }

}
