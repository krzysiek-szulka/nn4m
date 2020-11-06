<?php

namespace Tests\Unit\Service\Store;

use App\Service\Exception\ReadFileException;
use App\Service\Store\XmlFileReader;
use PHPUnit\Framework\TestCase;

class XmlFileReaderTest extends TestCase
{
    public function testReaderThrowsExceptionIfFileNotExists()
    {
        $filename = 'not_existing';
        $this->expectException(ReadFileException::class);
        $this->expectExceptionMessage("File $filename not exists");

        $reader = new XmlFileReader();
        $reader->getStoresInfo($filename);
    }

    public function testReaderThrowsExceptionIfFileCantBeRead()
    {
        $filename = __DIR__ . '/../../utll/emptyFile.xml';
        $this->expectException(ReadFileException::class);
        $this->expectExceptionMessage('Unable to read file');

        $reader = new XmlFileReader();
        $reader->getStoresInfo($filename);
    }

    public function testReaderThrowsExceptionIfUnableToParseXML()
    {
        $filename = __DIR__ . '/../../utll/notXmlFile.xml';
        $this->expectException(ReadFileException::class);
        $this->expectExceptionMessage('Unable to parse XML file');

        $reader = new XmlFileReader();
        $reader->getStoresInfo($filename);
    }
}
