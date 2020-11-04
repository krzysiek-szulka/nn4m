<?php declare(strict_types=1);

namespace Infrastructure\FileSystem;

interface FileReaderInterface
{
    public function getFileContent(): array;
}
