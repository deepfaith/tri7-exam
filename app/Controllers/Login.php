<?php

namespace App\Controllers;

use App\Libraries\Api\Auth\Authenticate;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
    /**
     * Authenticates the user
     *
     * @return mixed
     */
    public function create()
    {

        $auth = new Authenticate();
        $json = $this->request->getGetPost();
        return $auth->login($json);
    }
}