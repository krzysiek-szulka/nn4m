<?php declare(strict_types=1);

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class StoreDto extends DataTransferObject
{
    public ?int $storeNumber;
    public ?string $storeName;
    public AddressDto $address;
    public ?string $siteId;
    public ?float $latitude;
    public ?float $longitude;
    public ?string $phoneNumber;
    public ?bool $cfsFlag;
}
