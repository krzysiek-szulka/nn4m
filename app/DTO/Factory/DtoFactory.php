<?php declare(strict_types=1);

namespace App\DTO\Factory;

use App\DTO\AddressDto;
use App\DTO\StoreDto;
use InvalidArgumentException;
use SimpleXMLElement;
use Spatie\DataTransferObject\DataTransferObject;

class DtoFactory implements DtoFactoryInterface
{
    public function createFromXml(string $type, SimpleXMLElement $xml): DataTransferObject
    {
        switch ($type) {
            case StoreDto::class:
                return $this->createStoreDto($xml);
            case AddressDto::class:
                return $this->createAddressDto($xml);
            default:
                throw new InvalidArgumentException("Unknown type $type to create");
        }
    }

    private function createStoreDto(SimpleXMLElement $store): StoreDto
    {
        $storeNumber = isset($store->number) ? (int)$store->number : null;
        $storeName = isset($store->name) ? (string)$store->name : null;
        $address = isset($store->address) ? $this->createFromXml(AddressDto::class, $store->address) : new AddressDto([]);
        $siteId = isset($store->siteid) ? (string)$store->siteid : null;
        $latitude = isset($store->coordinates->lat) ? (float)$store->coordinates->lat : null;
        $longitude = isset($store->coordinates->lon) ? (float)$store->coordinates->lon : null;
        $phoneNumber = isset($store->phone_number) ? (string)$store->phone_number : null;
        $cfsFlag = isset($store->cfs_flag) ? strtolower((string)$store->cfs_flag) === 'y' : null;

        return new StoreDto([
            'storeNumber' => $storeNumber,
            'storeName' => $storeName,
            'address' => $address,
            'siteId' => $siteId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'phoneNumber' => $phoneNumber,
            'cfsFlag' => $cfsFlag,
        ]);
    }

    private function createAddressDto(SimpleXMLElement $addressXml): AddressDto
    {
        return new AddressDto([
            'addressLine1' => isset($addressXml->address_line_1) ? (string)$addressXml->address_line_1 : null,
            'addressLine2' => isset($addressXml->address_line_2) ? (string)$addressXml->address_line_2 : null,
            'addressLine3' => isset($addressXml->address_line_3) ? (string)$addressXml->address_line_3 : null,
            'city' => isset($addressXml->city) ? (string)$addressXml->city : null,
            'county' => isset($addressXml->county) ? (string)$addressXml->county : null,
            'country' => isset($addressXml->country) ? (string)$addressXml->country : null,
            'postcode' => isset($addressXml->postcode) ? (string)$addressXml->postcode : null,
        ]);
    }
}
