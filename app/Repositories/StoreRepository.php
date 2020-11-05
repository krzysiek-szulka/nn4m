<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;

class StoreRepository
{
    public function create(Store $store): bool
    {
        return $store->save();
    }

    public function findById(int $id): ?Store
    {
        return Store::find($id);
    }

    /**
     * @return Collection of Store
     */
    public function all(): Collection
    {
        return Store::all();
    }
}
