<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GetErrorsTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testGetErrorsReturnsListOfErrors()
    {
        $response = $this->json('GET', 'api/errors');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'file_name',
                'entry_number_in_file',
                'errors',
                'created_at',
                'operation_id',
                'store_id',
            ],
        ]);
    }

    public function testGetErrorByStoreIdReturnsErrorDetails()
    {
        $response = $this->json('GET', 'api/errors');
        $storeId = $response->json()[0]['store_id'];

        $response = $this->json('GET', 'api/errors/' . $storeId);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'file_name',
            'entry_number_in_file',
            'errors',
            'created_at',
            'operation_id',
            'store_id',
        ]);
    }
}
