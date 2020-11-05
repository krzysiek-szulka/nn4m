<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
    public function create(Store $store): bool
    {
        return $store->save();
    }

}
