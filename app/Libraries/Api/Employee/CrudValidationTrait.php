<?php

namespace App\Libraries\Api\Employee;

use App\Libraries\Api\Helpers\Constants\AuthRoles;
use App\Libraries\Api\Helpers\Validation\ValidateTrait;

trait CrudValidationTrait
{
    use ValidateTrait;

    /**
     * Validates data to be submitted upon creating a new employee record
     *
     * @param array $data parameters to be validated
     * @return bool|string[]
     */
    protected function validateCreateEmployeeParams(array $data)
    {
        $rules = [
            "username" => [
                "label" => "User Name",
                "rules" => "required|min_length[3]|max_length[20]|is_unique[user.username]"
            ],
            "first_name" => [
                "label" => "First Name",
                "rules" => "required|min_length[3]|max_length[20]"
            ],
            "last_name" => [
                "label" => "Last Name",
                "rules" => "required|min_length[3]|max_length[20]"
            ],
            "role" => [
                "label" => "User Role",
                "rules" => "required|integer|less_than_equal_to[3]|greater_than_equal_to[1]"
            ],
            "password" => [
                "label" => "Password",
                "rules" => "required|min_length[8]|max_length[20]"
            ],
            "password_confirm" => [
                "label" => "Confirm Password",
                "rules" => "matches[password]"
            ]
        ];
        if( $data['role_to_update'] ){
            $rules['role'] = [
                "label" => "User Role",
                "rules" => "required|integer|matches[role_to_update]",
                'errors' => [
                    'matches' => 'The {field} of this user does not match your role '.AuthRoles::ROLES[$data['role_to_update']].'.',
                ],
            ];
        }
        return $this->runValidation($rules, $data);
    }

    /**
     * Validates data to be submitted upon updating the employee record
     *
     * @param array $data parameters to be validated
     * @return bool|string[]
     */
    protected function validateUpdateEmployeeParams(array $data)
    {
        $rules = [
            "first_name" => [
                "label" => "First Name",
                "rules" => "min_length[3]|max_length[20]"
            ],
            "last_name" => [
                "label" => "Last Name",
                "rules" => "min_length[3]|max_length[20]"
            ],
        ];
        if( isset($data['username']) ){
            $rules['username'] = [
                "label" => "User Name",
                "rules" => "min_length[3]|max_length[20]|is_unique[user.username]"
            ];
        }
        if( $data['role_to_update'] ){
            $rules['role'] = [
                "label" => "User Role",
                "rules" => "required|integer|matches[role_to_update]",
                'errors' => [
                    'matches' => 'The {field} of this user does not match your role '.AuthRoles::ROLES[$data['role_to_update']].'.',
                ],
            ];
        }
        return $this->runValidation($rules, $data);
    }

    /**
     * Validates data to be deleted record
     *
     * @param array $data parameters to be validated
     * @return bool|string[]
     */
    protected function validateDeleteEmployeeParams(array $data)
    {
        if( $data['role_to_update'] ){
            $rules['role'] = [
                "label" => "User Role",
                "rules" => "required|integer|matches[role_to_update]",
                'errors' => [
                    'matches' => 'The {field} of this user does not match your role '.AuthRoles::ROLES[$data['role_to_update']].'.',
                ],
            ];
            return $this->runValidation($rules, $data);
        }
        return true;
    }
}