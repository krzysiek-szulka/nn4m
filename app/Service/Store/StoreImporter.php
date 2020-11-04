<?php declare(strict_types=1);

namespace App\Service\Store;

use App\Service\Store\XmlFileReader;

class StoreImporter
{
    private $fileReader;

    public function __construct(XmlFileReader $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    public function importFromFile(string $filePath): void
    {

    }
}
