<?php declare(strict_types=1);

namespace App\Commands;

use App\DTO\StoreDto;
use Illuminate\Console\Command;

class CreateStoreCommand extends Command
{
    private StoreDto $storeDto;
    private string $source;
    private int $sourceIdentity;
    private string $importId;

    public function __construct(StoreDto $storeDto, string $source, int $sourceIdentity, string $importId)
    {
        parent::__construct();
        $this->storeDto = $storeDto;
        $this->source = $source;
        $this->sourceIdentity = $sourceIdentity;
        $this->importId = $importId;
    }

    public function getStoreDto(): StoreDto
    {
        return $this->storeDto;
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
}
