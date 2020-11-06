<?php

namespace Tests\Unit\Handlers\Commands;

use App\Commands\CreateStoreCommand;
use App\DTO\AddressDto;
use App\DTO\StoreDto;
use App\Handlers\Commands\CreateStoreHandler;
use App\Repositories\StoreRepository;
use Illuminate\Bus\Dispatcher;
use Tests\TestCase;

class CreateStoreHandlerTest extends TestCase
{
    public function testHandlerCreatesStore()
    {
        $repository = $this->createMock(StoreRepository::class);
        $repository->expects($this->once())->method('create');

        $dispatcher = $this->createMock(Dispatcher::class);
        $dispatcher->expects($this->never())->method('dispatch');

        $handler = new CreateStoreHandler($repository, $dispatcher);
        $handler->handle(new CreateStoreCommand($this->getDto(), 'some-file', 1, 'uuid'));
    }

    public function testHandlerCreatesError()
    {
        $repository = $this->createMock(StoreRepository::class);
        $repository->expects($this->never())->method('create');

        $dispatcher = $this->createMock(Dispatcher::class);
        $dispatcher->expects($this->once())->method('dispatch');

        $dto = $this->getDto();
        $dto->storeName = null;
        $dto->storeNumber = null;

        $handler = new CreateStoreHandler($repository, $dispatcher);
        $handler->handle(new CreateStoreCommand($dto, 'some-file', 1, 'uuid'));
    }

    private function getDto(): StoreDto
    {
        return new StoreDto([
            'storeNumber' => 101,
            'storeName' => 'Silverburn',
            'address' => new AddressDto([
                'addressLine1' => 'Debenhams Retail plc',
                'addressLine2' => 'The Square 763 Barrhead Road',
                'addressLine3' => '',
                'city' => 'Silverburn',
                'county' => 'Silverburn',
                'country' => 'United Kingdom',
                'postcode' => 'G53 6AG',
            ]),
            'siteId' => 'GB',
            'latitude' => 55.823200,
            'longitude' => -4.342840,
            'phoneNumber' => '0344 800 8877',
            'cfsFlag' => false,
        ]);
    }
}
