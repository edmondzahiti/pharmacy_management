<?php

namespace Tests\Feature;

use App\Traits\PharmacyTestInputs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PharmacyTest extends TestCase
{
    use RefreshDatabase;
    use PharmacyTestInputs;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setBaseRoute('pharmacies');
        $this->setBaseModel('App\Models\Pharmacy');
    }

    private $testingRouteName = 'pharmacies.index';
    private $testingRoute = 'api/pharmacies';

    public function test_api_is_accessible()
    {
        $this->signInAsAdmin();
        $this->isApiAccessible($this->testingRoute);
    }

    public function test_a_user_with_permission_can_create_pharmacies()
    {
        $this->signInAsAdmin();

        $this->create();
    }

    public function test_a_user_with_permission_can_update_pharmacies()
    {
        $this->signInAsAdmin();
        $data = $this->getPharmaciesValidInputs();

        $this->update($data);
    }

    public function test_a_user_with_permission_can_delete_pharmacies()
    {
        $this->signInAsAdmin();

        $this->destroy();
    }
}
