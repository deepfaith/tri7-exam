<?php

namespace App\Libraries\Api\Helpers\Constants;

final class CrudResponse
{
    const MESSAGES = [
        'not_found' => 'No Data Found',
        'not_save' => 'Error Saving the Record',
        'not_updated' => 'Error Updating the Record',
        'not_deleted' => 'Error Deleting the Record',
        'record_exists' => 'Record exists',
        'success_delete' => 'Deleted Successfully',
    ];

    /**
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}