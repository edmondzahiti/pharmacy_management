<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class EmployeeService
{
    protected $employeeRepository;

    protected $pharmacyService;

    public function __construct(EmployeeRepository $employeeRepository, PharmacyService $pharmacyService)
    {
        $this->employeeRepository   = $employeeRepository;
        $this->pharmacyService      = $pharmacyService;
    }

    public function all()
    {
        return $this->employeeRepository->get();
    }

    public function find($id)
    {
        return $this->employeeRepository->find($id);
    }

    public function create($data)
    {
        $pharmacy = $this->pharmacyService->find($data['pharmacy_id']);

        if (is_null($pharmacy)) {
            throw new UnprocessableEntityHttpException('Pharmacy selected does not exist!');
        }

        return $this->employeeRepository->create($data);
    }

    public function update($id, $data)
    {
        $employee = $this->employeeRepository->find($id);
        $this->employeeRepository->update($employee, $data);

        return $employee->refresh();
    }

    public function delete($id)
    {
        $employee = $this->employeeRepository->find($id);

        $this->employeeRepository->delete($employee);

        return true;
    }
}
