<?php

namespace Tests\Feature\Repositories;

use App\Models\Error;
use App\Repositories\ErrorRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ErrorRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testSaveStoresError()
    {
        $repo = new ErrorRepository();
        $error = new Error();
        $error->file_name = 'someFile';
        $error->entry_number_in_file = 1;
        $error->errors = [];
        $error->operation_id = 'some operation';
        $error->store_id = 1;

        $this->assertTrue($repo->create($error));
    }

    /**
     * @covers \App\Repositories\ErrorRepository::findByOperationId
     */
    public function findByOperationId()
    {
        $repo = new ErrorRepository();

        $error = new Error();
        $error->file_name = 'someFile';
        $error->entry_number_in_file = 2;
        $error->errors = [];
        $error->operation_id = 'some operation';
        $error->store_id = 12;
        $repo->create($error);


        $found = $repo->findByOperationId('some operation');
        $this->assertInstanceOf(Error::class, $found);
        $this->assertEquals($error->store_id, $found->store_id);
    }
}
