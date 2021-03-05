<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * @codeCoverageIgnore
 */
class FailedUpdateException extends Exception
{
    public function __construct(Model $entity)
    {
        $message = "Model could not be updated: {$entity}";
        parent::__construct($message);
    }
}
