<?php

namespace App\Repositories;

use App\Models\Pharmacy;

class PharmacyRepository extends BaseRepository
{
    public function getModel()
    {
        return new Pharmacy();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Pharmacy $pharmacy, array $data)
    {
        return $pharmacy->update($data);
    }

    public function delete(Pharmacy $pharmacy): bool
    {
        $pharmacy->delete();

        return true;
    }
}
