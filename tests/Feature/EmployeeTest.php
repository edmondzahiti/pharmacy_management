<?php

namespace Tests\Feature;

use App\Traits\EmployeeTestInputs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    use EmployeeTestInputs;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setBaseRoute('employees');
        $this->setBaseModel('App\Models\Employee');
    }

    private $testingRouteName = 'employees.index';
    private $testingRoute = 'api/employees';

    public function test_api_is_accessible()
    {
        $this->signInAsAdmin();
        $this->isApiAccessible($this->testingRoute);
    }

    public function test_a_user_with_permission_can_create_employees()
    {
        $this->signInAsAdmin();
        $this->create();
    }

    public function test_a_user_with_permission_can_update_employees()
    {
        $this->signInAsAdmin();
        $data = $this->getEmployeesValidInputs();

        $this->update($data);
    }

    public function test_a_user_with_permission_can_delete_employees()
    {
        $this->signInAsAdmin();

        $this->destroy();
    }
}
