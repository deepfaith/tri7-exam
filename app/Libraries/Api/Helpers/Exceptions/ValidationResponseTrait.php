<?php

namespace App\Libraries\Api\Helpers\Exceptions;

use CodeIgniter\API\ResponseTrait;

trait ValidationResponseTrait
{
    use ResponseTrait;

    /**
     * Failed Validation Error
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function failedValidation($errors)
    {
        return $this->fail($errors,400);
    }
}