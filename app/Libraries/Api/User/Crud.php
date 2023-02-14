<?php

namespace App\Libraries\Api\User;

use App\Libraries\Api\Helpers\Exceptions\CrudMessageTrait;
use App\Libraries\Api\Helpers\Interfaces\CrudInterface;
use App\Models\User;

class Crud implements CrudInterface
{
    use CrudMessageTrait;

    private User $userModel;
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->userModel = new User();
    }


    /**
     * shows all the records
     *
     * @return array|mixed|string
     */
    public function getRecords()
    {
        $data = $this->userModel->findAll();
        if(!$data) return $this->notFoundMessage();
        return $data;
    }


    /**
     * Get a single record
     *
     * @param int $id id of the resource
     * @return mixed|string
     */
    public function getRecord(int $id)
    {
        $data = $this->userModel->find(['id' => $id]);
        if(!$data) return $this->notFoundMessage();
        return $data[0];
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return \CodeIgniter\Database\BaseResult|int|mixed|object|string
     * @throws \ReflectionException
     */
    public function createRecord($json)
    {
        $data = [
            'username' => $json->username,
            'password' => $json->password,
            'role' => $json->role,
            'name' => $json->name,
            'create_date' => time()
        ];

        //check if the user exists
        $userExist = $this->userModel->find(['username' => $json->username]);
        if(!$userExist){
            $user = $this->userModel->insert($data);
            if(!$user) return $this->failedSaveMessage();
            return $user;
        }else{
            return $this->recordExistsMessage();
        }
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param int $id id of the resource
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return bool|mixed|string
     * @throws \ReflectionException
     */
    public function updateRecord(int $id, $json)
    {
        $json = (object) $json;
        if( isset($json->username)  )
            $data['username'] = $json->username;
        if( isset($json->first_name) && isset($json->last_name)  )
            $data['name'] = $json->first_name.' '.$json->last_name;

        if( isset($json->role) )
            $data['role'] = $json->role;
        $findById = $this->userModel->find(['id' => $id]);
        if(!$findById) return $this->notFoundMessage();

        $employee = $this->userModel->update($id, $data);
        if(!$employee) return $this->failedUpdateMessage();
        return $employee;
    }


    /**
     * Delete the designated resource object from the model
     *
     * @param int $id id of the resource
     * @return bool|\CodeIgniter\Database\BaseResult|mixed|string
     */
    public function deleteRecord(int $id)
    {
        $findById = $this->userModel->find(['id' => $id]);
        if(!$findById) return $this->notFoundMessage();

        $employee = $this->userModel->delete($id);
        if(!$employee) return $this->failedDeleteMessage();
        return $employee;
    }

}