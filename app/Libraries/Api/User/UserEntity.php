<?php

namespace App\Libraries\Api\User;

use App\Libraries\Api\Helpers\Exceptions\CrudMessageTrait;
use App\Models\User;

class UserEntity
{
    use CrudMessageTrait;

    private User $userModel;
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->userModel = new User();
    }


    /**
     * Find the user by username and join employee record
     *
     * @param string $username username param
     * @return array|object|string
     */
    public function getUserByUsernameJoinEmployee(string $username)
    {
        $findByUsername = $this->userModel->where(['username' => $username])->join('employee', 'employee.user_id = user.id', 'inner')->first();
        if(!$findByUsername) return null;
        return (object) $findByUsername;
    }

}