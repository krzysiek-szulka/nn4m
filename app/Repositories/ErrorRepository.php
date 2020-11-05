<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Error;
use Illuminate\Database\Eloquent\Collection;

class ErrorRepository
{
    public function create(Error $error): bool
    {
        return $error->save();
    }

    /**
     * @param string $operationId
     * @return Collection of Error
     */
    public function findByOperationId(string $operationId): Collection
    {
        return Error::all()->where('operation_id', '=', $operationId);
    }

    /**
     * @return Collection of Error
     */
    public function all(): Collection
    {
        return Error::all();
    }

    /**
     * @param int $storeId
     * @return Collection of Error
     */
    public function findByStoreId(int $storeId): Collection
    {
        return Error::all()->where('store_id', '=', $storeId);
    }
}
