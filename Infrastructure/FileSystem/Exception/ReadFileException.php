<?php declare(strict_types=1);

namespace Infrastructure\FileSystem\Exception;

use Exception;
use Throwable;

class ReadFileException extends Exception
{
    public function __construct(string $message, Throwable $previous = null)
    {
        parent::__construct($message, $previous);
    }
}
