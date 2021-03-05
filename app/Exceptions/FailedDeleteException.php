<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * @codeCoverageIgnore
 */
class FailedDeleteException extends Exception
{
    public function __construct(Model $entity)
    {
        $message = "Model could not be deleted: {$entity}";
        parent::__construct($message);
    }
}
