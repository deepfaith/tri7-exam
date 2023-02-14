<?php

namespace App\Controllers;

use App\Libraries\Api\Employee\Crud;
use CodeIgniter\RESTful\ResourceController;

class Auth extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $json = $this->request->getJSON();
        return $employeeCrud->getRecords();
    }

}