<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\PharmacyService;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $pharmacyService;

    public function __construct(EmployeeService $employeeService, PharmacyService $pharmacyService)
    {
        $this->employeeService = $employeeService;
        $this->pharmacyService = $pharmacyService;
    }

    public function index()
    {
        try {
            $employees = $this->employeeService->all();
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return new EmployeeCollection($employees);
    }

    public function store(StoreEmployeeRequest $request)
    {
        try {
            $employee = $this->employeeService->create($request->validated());
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return new EmployeeResource($employee);
    }

    public function show($id)
    {
        try {
            $employee = $this->employeeService->find($id);
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        try {
            $employee = $this->employeeService->update($id, $request->validated());
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }

        return new EmployeeResource($employee);
    }

    public function destroy($id)
    {
        try {
            $this->employeeService->delete($id);
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return response()->json([
            'type' => 'success',
            'message' => 'Employee deleted successfully'
        ]);
    }
}
