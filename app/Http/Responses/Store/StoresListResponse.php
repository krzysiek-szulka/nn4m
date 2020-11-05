<?php declare(strict_types=1);

namespace App\Http\Responses\Store;

use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Narrowspark\HttpStatus\HttpStatus;

class StoresListResponse extends JsonResponse
{
    public function __construct(Collection $stores)
    {
        parent::__construct(array_map(fn(array $storeData) => [
            'id' => $storeData['id'],
            'store_number' => $storeData['store_number'],
            'store_name' => $storeData['store_name'],
        ], $stores->toArray()), HttpStatus::STATUS_OK);
    }
}
