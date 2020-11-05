<?php declare(strict_types=1);

namespace App\Commands;

use App\DTO\StoreDto;
use Illuminate\Console\Command;

class CreateStoreCommand extends Command
{
    private StoreDto $storeDto;
    private string $source;
    private int $sourceIdentity;

    public function __construct(StoreDto $storeDto, string $source, int $sourceIdentity)
    {
        parent::__construct();
        $this->storeDto = $storeDto;
        $this->source = $source;
        $this->sourceIdentity = $sourceIdentity;
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
}
