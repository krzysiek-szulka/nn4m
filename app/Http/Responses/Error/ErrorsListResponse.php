<?php declare(strict_types=1);

namespace App\Http\Responses\Error;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Narrowspark\HttpStatus\HttpStatus;

class ErrorsListResponse extends JsonResponse
{
    public function __construct(Collection $errors)
    {
        parent::__construct($errors, HttpStatus::STATUS_OK);
    }
}
