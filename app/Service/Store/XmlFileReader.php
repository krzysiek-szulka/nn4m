<?php declare(strict_types=1);

namespace App\Service\Store;

use App\Service\Exception\ReadFileException;
use SimpleXMLElement;

class XmlFileReader
{
    /**
     * @param string $filePath
     * @return SimpleXMLElement
     * @throws ReadFileException
     */
    public function getStoresInfo(string $filePath): SimpleXMLElement
    {
        if (!file_exists($filePath)) {
            throw new ReadFileException("File $filePath not exists");
        }

        $xmlString = file_get_contents($filePath);
        if (!$xmlString) {
            throw new ReadFileException("Unable to read file");
        }

        $xmlObject = simplexml_load_string($xmlString);
        if (!$xmlObject) {
            throw new ReadFileException("Unable to parse XML file");
        }

        return $xmlObject;
    }
}
