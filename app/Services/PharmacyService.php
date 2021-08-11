<?php

namespace App\Services;

use App\Repositories\PharmacyRepository;

class PharmacyService
{
    protected $pharmacyRepository;

    public function __construct(PharmacyRepository $pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
    }

    public function all()
    {
        return $this->pharmacyRepository->get();
    }

    public function find($id)
    {
        return $this->pharmacyRepository->find($id);
    }

    public function create($data)
    {
        return $this->pharmacyRepository->create($data);
    }

    public function update($id, $data)
    {
        $pharmacy = $this->pharmacyRepository->find($id);

        $this->pharmacyRepository->update($pharmacy, $data);

        return $pharmacy->refresh();
    }

    public function delete($id)
    {
        $pharmacy = $this->pharmacyRepository->find($id);

        $this->pharmacyRepository->delete($pharmacy);

        return true;
    }
}
