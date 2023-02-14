<?php

namespace App\Libraries\Api\Employee;

use App\Libraries\Api\Helpers\Constants\AuthRoles;

trait CrudSqlQueryTrait
{

    /**
     * Assembles the query select and join
     * @return Employee
     */
    private function getDataSelects()
    {
        $selectString = 'employee.*, user.role as roleid, user.username, IF(user.role <> 1,IF(user.role = 2,"'.AuthRoles::ROLES[2].'","'.AuthRoles::ROLES[3].'") ,"'.AuthRoles::ROLES[1].'") as role';

        $user =  $this->employeeModel
            ->join('user', 'user.id = employee.user_id', 'inner')
            ->select($selectString);

        //filter users by role
        if( $this->userRoleToUpdate ){
            $user->where('user.role',$this->userRoleToUpdate);
        }
        return $user;
    }
}