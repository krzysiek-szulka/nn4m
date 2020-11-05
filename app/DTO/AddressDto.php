<?php declare(strict_types=1);

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class AddressDto extends DataTransferObject
{
    public ?string $addressLine1;
    public ?string $addressLine2;
    public ?string $addressLine3;
    public ?string $city;
    public ?string $county;
    public ?string $postcode;
    public ?string $country;
}
