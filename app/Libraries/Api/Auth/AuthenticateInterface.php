<?php

namespace App\Libraries\Api\Auth;

interface AuthenticateInterface
{
    /**
     * login user based on the parameters
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return mixed
     */
    public function login($json);
}