<?php

namespace App\Libraries\Api\Employee;

use App\Libraries\Api\Helpers\Auth\GenerateToken;
use App\Libraries\Api\Helpers\Constants\AuthRoles;
use CodeIgniter\Config\Services;

trait CrudGuardTrait
{
    protected $request;
    protected $userloggedin;
    protected $userloggedinRole;
    protected $userRoleToUpdate;

    /**
     * Constructor
     *
     */
    protected function guardRole()
    {
        $this->request = Services::request();

        $token = $this->request->getServer('HTTP_AUTHORIZATION');
        $this->userloggedin = GenerateToken::decode_jwt($token);
        $this->userloggedinRole = json_decode($this->userloggedin->sub)->role;
        $this->userRoleToUpdate = $this->userloggedinRole;
    }

}