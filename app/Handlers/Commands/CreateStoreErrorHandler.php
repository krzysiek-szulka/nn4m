<?php declare(strict_types=1);

namespace App\Handlers\Commands;

use App\Commands\CreateStoreErrorCommand;
use App\Models\Error;
use App\Repositories\ErrorRepository;

class CreateStoreErrorHandler
{
    private ErrorRepository $errorRepository;

    public function __construct(ErrorRepository $errorRepository)
    {
        $this->errorRepository = $errorRepository;
    }

    public function handle(CreateStoreErrorCommand $command)
    {
        $error = new Error();
        $error->file_name = $command->getSource();
        $error->entry_number_in_file = $command->getSourceIdentity();
        $error->errors = $command->getErrors();
        $error->operation_id = $command->getImportId();

        $this->errorRepository->create($error);
    }
}
