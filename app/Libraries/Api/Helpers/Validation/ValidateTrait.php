<?php

namespace App\Libraries\Api\Helpers\Validation;

use Config\Services;

trait ValidateTrait
{

    /**
     * Validates data parameters
     *
     * @param array $rules validation rules parameter
     * @param array $data parameters to be validated
     * @return bool|string[]
     */
    protected function runValidation(array $rules, array $data)
    {
        $validation = Services::validation();
        $validation->setRules($rules);
        $valid = $validation->run($data);
        if($validation->getErrors()) {
            return $validation->getErrors();
        } else {
            return true;
        }
    }
}