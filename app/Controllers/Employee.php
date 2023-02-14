<?php

namespace App\Controllers;

use App\Libraries\Api\Employee\Crud;
use CodeIgniter\RESTful\ResourceController;

class Employee extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $employeeCrud = new Crud();
        return $employeeCrud->getRecords();
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $employeeCrud = new Crud();
        return $employeeCrud->getRecord($id);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $json = $this->request->getGetPost();
        $employeeCrud = new Crud();
        return $employeeCrud->createRecord($json);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $jsonGet = $this->request->getPostGet();
        $employeeCrud = new Crud();
        return $employeeCrud->updateRecord($id, $jsonGet);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $employeeCrud = new Crud();
        return $employeeCrud->deleteRecord($id);
    }
}