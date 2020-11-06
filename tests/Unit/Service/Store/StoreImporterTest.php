<?php

namespace Tests\Unit\Service\Store;

use App\Commands\CreateStoreCommand;
use App\DTO\AddressDto;
use App\DTO\Factory\DtoFactory;
use App\DTO\StoreDto;
use App\Service\Store\StoreImporter;
use App\Service\Store\XmlFileReader;
use Illuminate\Bus\Dispatcher;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;

class StoreImporterTest extends TestCase
{
    public function testStoreImporterCallsCreateStoreCommand()
    {
        $firstStore = new StoreDto([
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

        $secondStore = new StoreDto([
            'storeNumber' => 102,
            'storeName' => 'Bedford',
            'address' => new AddressDto([
                'addressLine1' => 'Debenhams Retail plc',
                'addressLine2' => 'Debenhams Bedford',
                'addressLine3' => '48-54 High Street',
                'city' => 'Bedford',
                'county' => 'Bedfordshire',
                'country' => 'United Kingdom',
                'postcode' => 'MK40 1SP',
            ]),
            'siteId' => 'GB',
            'latitude' => 52.136900,
            'longitude' => -0.466730,
            'phoneNumber' => '0344 800 8877',
            'cfsFlag' => false,
        ]);

        $stringUuid = '253e0f90-8842-4731-91dd-0191816e6a28';
        $uuid = Uuid::fromString($stringUuid);
        $factoryMock = \Mockery::mock(UuidFactory::class . '[uuid4]', [
            'uuid4' => $uuid,
        ]);
        Uuid::setFactory($factoryMock);

        $filePath = __DIR__ . '/../../utll/stores.xml';
        $fileName = 'stores.xml';

        $dispatcher = $this->getMockBuilder(Dispatcher::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dispatcher->expects($this->exactly(2))
            ->method('dispatch')
            ->withConsecutive(
                [new CreateStoreCommand($firstStore, $fileName, 1, $stringUuid)],
                [new CreateStoreCommand($secondStore, $fileName, 2, $stringUuid)]
            );

        $service = new StoreImporter(new XmlFileReader(), new DtoFactory(), $dispatcher);
        $service->importFromFile($filePath, $fileName);
    }
}
