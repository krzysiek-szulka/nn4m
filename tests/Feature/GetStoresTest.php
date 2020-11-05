<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GetStoresTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testGetStoriesReturnsListOfStories()
    {
        $response = $this->json('GET', 'api/stores');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'store_number',
                'store_name',
            ],
        ]);
    }

    public function testGetStoreReturnsStoreDetails()
    {
        $response = $this->json('GET', 'api/stores');
        $storeId = $response->json()[0]['id'];

        $response = $this->json('GET', "api/stores/$storeId");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'store_number',
            'store_name',
            'address',
            'site_id',
            'latitude',
            'longitude',
            'phone_number',
            'cfs_flag',
            'created_at',
            'updated_at',
        ]);
    }
}
