<?php

namespace App\Traits;

use App\Models\Pharmacy;

trait EmployeeTestInputs
{
    /**
     * @return array
     */
    public function getEmployeesValidInputs()
    {
        return [
            'first_name'  => auth()->user()->name,
            'last_name'   => 'last name',
            'pharmacy_id' => Pharmacy::factory()->create()->id,
            'email'       => 'test@gmail.com',
            'phone'       => 'description test',
        ];
    }

    /**
     * @return array
     */
    public function getEmployeesInvalidInputs()
    {
        return [
            'first_name'  => null,
            'last_name'   => null,
            'pharmacy_id' => null,
            'email'       => null,
            'phone'       => null,
        ];
    }
}
