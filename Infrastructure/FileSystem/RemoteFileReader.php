<?php declare(strict_types=1);

namespace Infrastructure\FileSystem;

use Infrastructure\FileSystem\Exception\ReadFileException;

class RemoteFileReader implements FileReaderInterface
{
    private $fileUrl;

    public function __construct(string $fileUrl)
    {
        $this->fileUrl = $fileUrl;
    }

    public function getFileContent(): array
    {
        if (!file_exists($this->fileUrl)) {
            throw new ReadFileException("File {$this->fileUrl} not found");
        }

        
    }
}
