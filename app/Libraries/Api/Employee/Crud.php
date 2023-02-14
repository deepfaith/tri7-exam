<?php

namespace App\Libraries\Api\Employee;

use App\Libraries\Api\Helpers\Auth\PasswordHash;
use App\Libraries\Api\Helpers\Exceptions\CrudResponseTrait;
use App\Libraries\Api\Helpers\Exceptions\ValidationResponseTrait;
use App\Libraries\Api\Helpers\Interfaces\CrudInterface;
use App\Models\Employee;
use CodeIgniter\Config\Services;

class Crud implements CrudInterface
{
    use CrudResponseTrait;
    use CrudValidationTrait;
    use ValidationResponseTrait;
    use CrudGuardTrait;
    use CrudSqlQueryTrait;

    private Employee $employeeModel;
    private \App\Libraries\Api\User\Crud $userCrud;

    protected $response;


    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->employeeModel = new Employee();
        $this->userCrud = new \App\Libraries\Api\User\Crud();

        $this->response = Services::response();
        $this->guardRole();
   }


    /**
     * shows all the records
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getRecords()
    {
        $data = $this->getDataSelects()->findAll();
        if(!$data) return $this->notFoundResponse();
        return $this->success($data);
    }

    /**
     * Get a single record
     * @param int $id id of the resource
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getRecord(int $id)
    {

        $data = $this->getDataSelects()->find($id);
        if(!$data) return $this->notFoundResponse();
        return $this->success($data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return \CodeIgniter\HTTP\ResponseInterface|string
     * @throws \ReflectionException
     */
    public function createRecord($json)
    {
        $json = (object) $json;
        $data = [
            'username' => isset($json->username) ? $json->username : '',
            'first_name' => isset($json->first_name) ? $json->first_name : '',
            'last_name' => isset($json->last_name) ? $json->last_name : '',
            'role' => isset($json->role) ? $json->role : '',
            'create_date' => time(),
            'password' => isset($json->password) ? $json->password : '',
            'password_confirm' => isset($json->password_confirm) ? $json->password_confirm : '',
            'role_to_update' => $this->userRoleToUpdate
        ];

        //validates the data
        $is_valid = $this->validateCreateEmployeeParams($data);
        if( $is_valid !== true )
            return $this->failedValidation($is_valid);

        //creates a user record
        $userData = new \stdClass();
        $userData->name = $json->first_name.' '.$json->last_name;
        $userData->username = $json->username;
        try{
            $userData->password = PasswordHash::hash_internal_user_password($json->password);
        }catch (\Exception $e){
            return $this->failedSaveResponse();
        }

        //assigning a user role
        $userData->role = $json->role ? $json->role : 1;
        $userId = $this->userCrud->createRecord($userData);
        $data['user_id'] = $userId;

        if( $userId ){
            $employee = $this->employeeModel->insert($data);
            if(!$employee) return $this->failedSaveResponse();
            $employee =  $this->getDataSelects()->find($employee);
            return $this->successCreated($employee);
        }else{
            return $this->failedSaveResponse();
        }
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param int $id id of the resource
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return \CodeIgniter\HTTP\ResponseInterface
     * @throws \ReflectionException
     */
    public function updateRecord(int $id, $json)
    {
        $json = (object) $json;
        $findById = $this->getDataSelects()->find($id);
        if ( empty($findById) ) return $this->notFoundResponse();
        $findById = (object) $findById;

        $data = [
            'id' => $id,
            'first_name' => isset($json->first_name) ? $json->first_name : $findById->first_name,
            'last_name' => isset($json->last_name) ? $json->last_name : $findById->last_name,
            'role_to_update' => $this->userRoleToUpdate
        ];

        //username
        if( isset($json->username) && $findById->username != $json->username )
            $data['username'] = $json->username;

        //role
        if( $this->userRoleToUpdate == $findById->roleid )
            $data['role'] = $findById->roleid;
        else if( isset($json->role) && !$this->userRoleToUpdate )
            $data['role'] = $json->role;

        //validates the data
        $is_valid = $this->validateUpdateEmployeeParams($data);

        if( $is_valid === true ) {

            $employee = $this->employeeModel->update($id, $data);
            if (!$employee) return $this->failedUpdateResponse();

            //updates a user record
            if( isset($data['username']) ){
                $user = $this->userCrud->updateRecord($findById->user_id,$data);
            }

        }else{
            return $this->failedValidation($is_valid);
        }
        $employee =  $this->getDataSelects()->find($id);
        return $this->success($employee);
    }


    /**
     * Delete the designated resource object from the model
     *
     * @param int $id id of the resource
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function deleteRecord(int $id)
    {
        $findById = $this->getDataSelects()->find($id);

        if( !empty($findById) ){
            $findById = (object) $findById;
            //deletes user and employee
            $is_valid = $this->validateDeleteEmployeeParams(['role_to_update' => $this->userRoleToUpdate, 'role' => $findById->roleid]);

            if( $is_valid !== true ) return $this->failedValidation($is_valid);
            $employee = $this->employeeModel->delete($id);
            $user = $this->userCrud->deleteRecord($findById->user_id);

            if(!$employee) return $this->failedDeleteResponse();
            return $this->successDeleted($findById);
        }else{
            return $this->failedDeleteResponse();
        }

    }

}