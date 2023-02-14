<?php

namespace App\Libraries\Api\Helpers\Exceptions;

use App\Libraries\Api\Helpers\Constants\CrudResponse;

trait CrudMessageTrait
{
    /**
     * Constant Response Messages
     * @var string[]
     */
    protected $crudResponse;

    protected function setCrudResponse()
    {
        $this->crudResponse = CrudResponse::MESSAGES;
    }
    /**
     * Not found Error
     * @return string
     */
    protected function notFoundMessage(): string
    {
        $this->setCrudResponse();
        return $this->crudResponse['not_found'];
    }

    /**
     * Not Saved Error
     * @return string
     */
    protected function failedSaveMessage(): string
    {
        $this->setCrudResponse();
        return $this->crudResponse['not_save'];
    }

    /**
     * Not Update Error
     * @return string
     */
    protected function failedUpdateMessage(): string
    {
        $this->setCrudResponse();
        return $this->crudResponse['not_updated'];
    }

    /**
     * Not deleted Error
     * @return string
     */
    protected function failedDeleteMessage(): string
    {
        $this->setCrudResponse();
        return $this->crudResponse['not_deleted'];
    }


    /**
     * Successfully Deleted a record
     * @return string
     */
    protected function successDeleteMessage(): string
    {
        $this->setCrudResponse();
        return $this->crudResponse['success_delete'];
    }

    /**
     * Record Exists
     * @return string
     */
    protected function recordExistsMessage(): string
    {
        $this->setCrudResponse();
        return $this->crudResponse['record_exists'];
    }
}