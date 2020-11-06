<?php

namespace Tests\Unit\Handlers\Commands;

use App\Commands\CreateStoreErrorCommand;
use App\Handlers\Commands\CreateStoreErrorHandler;
use App\Repositories\ErrorRepository;
use Tests\TestCase;

class CreateErrorHandlerTest extends TestCase
{
    public function testHandlerCreatesStore()
    {
        $repository = $this->createMock(ErrorRepository::class);
        $repository->expects($this->once())->method('create');

        $handler = new CreateStoreErrorHandler($repository);
        $handler->handle(new CreateStoreErrorCommand(['sth gone wrong'], 'some-file', 1, 'uuid'));
    }
}
