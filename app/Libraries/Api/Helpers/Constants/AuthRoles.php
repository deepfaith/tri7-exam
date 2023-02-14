<?php

namespace App\Libraries\Api\Helpers\Constants;

class AuthRoles
{
    const ROLES = [
        1 => 'Manager',
        2 => 'Web Developer ',
        3  => 'Web Designer',
    ];
    const ROLESGUARD = [
        1 => 0,
        2 => 2,
        3  => 3,
    ];

    /**
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}