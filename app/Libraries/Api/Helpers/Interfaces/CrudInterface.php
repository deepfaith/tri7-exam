<?php

namespace App\Libraries\Api\Helpers\Interfaces;

interface CrudInterface
{
    /**
     * Create a new resource object, from "posted" parameters
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return mixed
     */
    public function createRecord($json);

    /**
     * Add or update a model resource, from "posted" properties
     * @param int $id id of the resource
     * @param array|bool|float|int|stdClass|null $json posted parameters
     * @return mixed
     */
    public function updateRecord(int $id, $json);

    /**
     * Delete the designated resource object from the model
     * @param int $id id of the resource
     * @return mixed
     */
    public function deleteRecord(int $id);

    /**
     * Get a single record
     * @param int $id id of the resource
     * @return mixed
     */
    public function getRecord(int $id);

    /**
     * shows all the records
     * @return mixed
     */
    public function getRecords();
}