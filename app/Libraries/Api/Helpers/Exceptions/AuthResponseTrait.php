<?php

namespace App\Libraries\Api\Helpers\Exceptions;

use App\Libraries\Api\Helpers\Constants\AuthResponse;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Services;

trait AuthResponseTrait
{
    use ResponseTrait;

    /**
     * Not Saved Error
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function failedLogin()
    {
        return $this->fail(AuthResponse::MESSAGES['not_found'],400);
    }

}