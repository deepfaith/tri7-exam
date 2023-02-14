<?php

namespace App\Libraries\Api\Auth;

use App\Libraries\Api\Helpers\Auth\GenerateToken;
use App\Libraries\Api\Helpers\Exceptions\AuthResponseTrait;
use App\Libraries\Api\Helpers\Exceptions\CrudResponseTrait;
use App\Libraries\Api\Helpers\Exceptions\ValidationResponseTrait;
use App\Libraries\Api\User\UserEntity;
use CodeIgniter\Config\Services;

class Authenticate implements AuthenticateInterface
{
    use AuthValidationTrait;
    use AuthResponseTrait;
    use CrudResponseTrait;
    use ValidationResponseTrait;

    private UserEntity $userEntity;
    protected $response;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->userEntity = new UserEntity();
        $this->response = Services::response();
    }

    public function login($json)
    {
        $json = (object) $json;
        $data = [
            'username' => isset($json->username) ? $json->username : '',
            'password' => isset($json->password) ? $json->password : ''
        ];
        //validates the data
        $is_valid = $this->validateUserLogin($data);
        if( $is_valid === true ) {
            $user = $this->userEntity->getUserByUsernameJoinEmployee($json->username);
            if (!$user) return $this->failedLogin();
            else{
                $token = GenerateToken::generate_jwt($user);
                $user->token = $token;
            }
        }else{
            return $this->failedValidation($is_valid);
        }
        return $this->success($user);
    }

}