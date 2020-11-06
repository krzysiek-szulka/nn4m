<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class StoresTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testGetStoreReturnsFormToUploadFile()
    {
        $response = $this->get('store/import');
        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\StoreController
     */
    public function testGetStoriesReturnsListOfStories()
    {
        $response = $this->json('POST', '/store/import', [
            'file' => UploadedFile::fake()->createWithContent('stores.xml', file_get_contents(__DIR__ . '/utils/stores.xml'))
        ]);
        $response->assertStatus(302);
    }
}
