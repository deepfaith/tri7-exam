<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;
use App\Libraries\Api\Helpers\Auth\PasswordHash;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->truncate();
        $faker = \Faker\Factory::create();
        $user->save(
            [
                'name'        =>    'Admin User',
                'username'       =>    'admin',
                'password'    =>    PasswordHash::hash_internal_user_password('P@ssw0rd'),
                'role'       =>    1,
                'create_date'    =>    time(),
                'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  =>    Time::now()
            ]
        );
    }
}
