<?php

namespace App\Libraries\Api\Helpers\Exceptions;

use CodeIgniter\API\ResponseTrait;

trait CrudResponseTrait
{
    use ResponseTrait;
    use CrudMessageTrait;


    /**
     * Not found Error
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function notFoundResponse()
    {
        return $this->failNotFound($this->notFoundMessage());
    }

    /**
     * Not Saved Error
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function failedSaveResponse()
    {
        return $this->fail($this->failedSaveMessage(),400);
    }

    /**
     * Not Update Error
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function failedUpdateResponse()
    {
        return $this->fail($this->failedUpdateMessage(), 400);
    }

    /**
     * Not deleted Error
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function failedDeleteResponse()
    {
        return $this->fail($this->failedDeleteMessage(), 400);
    }

    /**
     * Success message
     * @param $data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function success($data)
    {
        return $this->respond($data);
    }

    /**
     * Successfully Created a record
     * @param $data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function successCreated($data)
    {
        return $this->respondCreated($data);
    }

    /**
     * Successfully Deleted a record
     * @param $data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    protected function successDeleted($data)
    {
        return $this->respondDeleted($data, $this->successDeleteMessage());
    }
}