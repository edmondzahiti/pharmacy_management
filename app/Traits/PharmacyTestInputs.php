<?php

namespace App\Traits;

trait PharmacyTestInputs
{
    /**
     * @return array
     */
    public function getPharmaciesValidInputs()
    {
        return [
            'name'       => 'Pharmacy One',
            'email'      => 'pharmacy_one@gmail.com',
            'vat_number' => '12345678',
            'phone'      => 'description test',
            'active'     => true,
        ];
    }

    /**
     * @return array
     */
    public function getPharmaciesInvalidInputs()
    {
        return [
            'name'       => null,
            'email'      => null,
            'vat_number' => null,
            'phone'      => null,
            'active'     => null,
        ];
    }
}
