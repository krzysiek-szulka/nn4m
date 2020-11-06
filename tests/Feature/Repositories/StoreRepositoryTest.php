<?php

namespace Tests\Feature\Repositories;

use App\DTO\AddressDto;
use App\Models\Store;
use App\Repositories\StoreRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StoreRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testSaveStoresError()
    {
        $repo = new StoreRepository();
        $store = new Store();
        $store->store_number = 101;
        $store->store_name = 'My store';
        $store->longitude = 14;
        $store->latitude = 33;
        $store->address = new AddressDto();
        $store->site_id = 'GB';
        $store->phone_number = '12313';
        $store->cfs_flag = true;

        $this->assertTrue($repo->create($store));
    }
}
