<?php

namespace App\Libraries\Api\Auth;

use App\Libraries\Api\Helpers\Validation\ValidateTrait;

trait AuthValidationTrait
{
    use ValidateTrait;

    /**
     * Validates data to be submitted upon user login
     *
     * @param array $data parameters to be validated
     * @return bool|string[]
     */
    protected function validateUserLogin(array $data)
    {
        $rules = [
            "username" => [
                "label" => "User Id",
                "rules" => "required"
            ],
            "password" => [
                "label" => "Password",
                "rules" => "required|min_length[8]|max_length[20]"
            ],
        ];
        return $this->runValidation($rules, $data);
    }
}