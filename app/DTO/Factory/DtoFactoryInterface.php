<?php declare(strict_types=1);

namespace App\DTO\Factory;

use SimpleXMLElement;
use Spatie\DataTransferObject\DataTransferObject;

interface DtoFactoryInterface
{
    public function createFromXml(string $type, SimpleXMLElement $xml): DataTransferObject;
}
