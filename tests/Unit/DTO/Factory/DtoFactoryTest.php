<?php

namespace Tests\Unit\DTO\Factory;

use App\DTO\AddressDto;
use App\DTO\Factory\DtoFactory;
use App\DTO\StoreDto;
use App\Service\Store\XmlFileReader;
use PHPUnit\Framework\TestCase;

class DtoFactoryTest extends TestCase
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

        $reader = new XmlFileReader();
        $xml = $reader->getStoresInfo(__DIR__ . '/../../utll/stores.xml');

        $factory = new DtoFactory();
        $this->assertEquals($firstStore, $factory->createFromXml(StoreDto::class, $xml->children()[0]));
        $this->assertEquals($secondStore, $factory->createFromXml(StoreDto::class, $xml->children()[1]));
    }
}
