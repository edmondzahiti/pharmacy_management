<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository extends BaseRepository
{
    public function getModel()
    {
        return new Employee();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Employee $employee, array $data)
    {
        return $employee->update($data);
    }

    public function delete(Employee $employee) : bool
    {
        $employee->delete();

        return true;
    }
}
