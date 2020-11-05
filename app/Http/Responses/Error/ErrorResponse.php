<?php declare(strict_types=1);

namespace App\Http\Responses\Error;

use App\Models\Error;
use Illuminate\Http\JsonResponse;
use Narrowspark\HttpStatus\HttpStatus;

class ErrorResponse extends JsonResponse
{
    public function __construct(Error $error)
    {
        parent::__construct($error, HttpStatus::STATUS_OK);
    }
}
