<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\Store\StoreResponse;
use App\Http\Responses\Store\StoresListResponse;
use App\Repositories\StoreRepository;
use Illuminate\Http\JsonResponse;
use Narrowspark\HttpStatus\HttpStatus;

class StoreController extends Controller
{
    private StoreRepository $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function listStores(): JsonResponse
    {
        $stores = $this->storeRepository->all();
        return new StoresListResponse($stores);
    }

    public function get(int $storeId): JsonResponse
    {
        $store = $this->storeRepository->findById($storeId);
        if ($store) {
            return new StoreResponse($store);
        }

        return new JsonResponse(['error' => "Store $storeId not found"], HttpStatus::STATUS_NOT_FOUND);
    }
}
