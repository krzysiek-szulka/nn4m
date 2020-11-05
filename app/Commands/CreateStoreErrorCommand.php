<?php declare(strict_types=1);

namespace App\Commands;

use Illuminate\Console\Command;

class CreateStoreErrorCommand extends Command
{
    /** @var string[] */
    private array $errors;
    private string $source;
    private int $sourceIdentity;

    /**
     * CreateStoreErrorCommand constructor.
     * @param string[] $errors
     */
    public function __construct(array $errors, string $source, int $sourceIdentity)
    {
        parent::__construct();
        $this->errors = $errors;
        $this->source = $source;
        $this->sourceIdentity = $sourceIdentity;
    }

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getSourceIdentity(): int
    {
        return $this->sourceIdentity;
    }
}
