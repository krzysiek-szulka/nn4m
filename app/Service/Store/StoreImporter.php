<?php declare(strict_types=1);

namespace App\Service\Store;

use App\Commands\CreateStoreCommand;
use App\Commands\CreateStoreErrorCommand;
use App\DTO\Factory\DtoFactory;
use App\DTO\StoreDto;
use Illuminate\Bus\Dispatcher;
use TypeError;

class StoreImporter
{
    private XmlFileReader $fileReader;
    private DtoFactory $dtoFactory;
    private Dispatcher $commandDispatcher;

    public function __construct(XmlFileReader $fileReader, DtoFactory $dtoFactory, Dispatcher $commandDispatcher)
    {
        $this->fileReader = $fileReader;
        $this->dtoFactory = $dtoFactory;
        $this->commandDispatcher = $commandDispatcher;
    }

    /**
     * @param string $filePath
     * @param string $fileOriginalName
     * @throws \App\Service\Exception\ReadFileException
     */
    public function importFromFile(string $filePath, string $fileOriginalName): void
    {
        $xml = $this->fileReader->getStoresInfo($filePath);
        $entryNumber = 0;
        foreach ($xml as $storeData) {
            $entryNumber++;
            try {
                /** @var StoreDto $storeDto */
                $storeDto = $this->dtoFactory->createFromXml(StoreDto::class, $storeData);
                $this->commandDispatcher->dispatch(new CreateStoreCommand($storeDto, $fileOriginalName, $entryNumber));
            } catch (TypeError $typeError) {
                $this->commandDispatcher->dispatch(new CreateStoreErrorCommand([$typeError->getMessage()], $fileOriginalName, $entryNumber));
            } catch (\Exception $e) {
                 // sth bad happend, log the error
                var_dump($e); exit;
            }
        }
    }
}
