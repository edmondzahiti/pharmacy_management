<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Http\Resources\PharmacyCollection;
use App\Http\Resources\PharmacyResource;
use App\Services\PharmacyService;

class PharmacyController extends Controller
{
    protected $pharmacyService;

    public function __construct(PharmacyService $pharmacyService)
    {
        $this->pharmacyService = $pharmacyService;
    }

    public function index()
    {
        try {
            $pharmacies = $this->pharmacyService->all();
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }

        return new PharmacyCollection($pharmacies);
    }

    public function store(StorePharmacyRequest $request)
    {
        try {
            $pharmacy = $this->pharmacyService->create($request->validated());
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return new PharmacyResource($pharmacy);
    }

    public function show($id)
    {
        try {
            $pharmacy = $this->pharmacyService->find($id);
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return new PharmacyResource($pharmacy);
    }

    public function update(UpdatePharmacyRequest $request, $id)
    {
        try {
            $pharmacy = $this->pharmacyService->update($id, $request->validated());
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return new PharmacyResource($pharmacy);
    }

    public function destroy($id)
    {
        try {
            $this->pharmacyService->delete($id);
        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
        return response()->json([
            'type'    => 'success',
            'message' => 'Pharmacy deleted successfully'
        ]);
    }
}
