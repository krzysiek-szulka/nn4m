<?php declare(strict_types=1);

namespace App\Commands;

use Illuminate\Console\Command;

class CreateStoreErrorCommand extends Command
{
    /** @var string[] */
    private array $errors;
    private string $source;
    private int $sourceIdentity;
    private string $importId;
    private ?int $storeNumber;

    /**
     * CreateStoreErrorCommand constructor.
     * @param string[] $errors
     */
    public function __construct(array $errors, string $source, int $sourceIdentity, string $importId, ?int $storeNumber = null)
    {
        parent::__construct();
        $this->errors = $errors;
        $this->source = $source;
        $this->sourceIdentity = $sourceIdentity;
        $this->importId = $importId;
        $this->storeNumber = $storeNumber;
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

    public function getImportId(): string
    {
        return $this->importId;
    }

    public function getStoreNumber(): ?int
    {
        return $this->storeNumber;
    }
}
