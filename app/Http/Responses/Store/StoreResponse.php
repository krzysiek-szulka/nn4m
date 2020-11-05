<?php declare(strict_types=1);

namespace App\Http\Responses\Store;

use App\Models\Store;
use Illuminate\Http\JsonResponse;
use Narrowspark\HttpStatus\HttpStatus;

class StoreResponse extends JsonResponse
{
    public function __construct(Store $store)
    {
        parent::__construct($store, HttpStatus::STATUS_OK);
    }
}
