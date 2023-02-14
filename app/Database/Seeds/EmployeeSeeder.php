<?php

namespace App\Database\Seeds;

use App\Models\Employee;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employee = new Employee();
        $employee->truncate();
        $faker = \Faker\Factory::create();
        $employee->save(
            [
                'user_id'        =>    1,
                'first_name'        =>    'Admin',
                'last_name'       =>    'User',
                'create_date'    =>    time(),
                'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  =>    Time::now()
            ]
        );
    }
}
