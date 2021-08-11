<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()
            ->count(5)
            ->create();
    }
}
