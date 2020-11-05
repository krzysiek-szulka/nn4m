<?php declare(strict_types=1);

namespace App\Service\Error;

use App\Models\Error;
use App\Repositories\ErrorRepository;

class ErrorService
{
    private ErrorRepository $errorRepository;

    public function __construct(ErrorRepository $errorRepository)
    {
        $this->errorRepository = $errorRepository;
    }

    /**
     * @param string $importId
     * @return string[]
     */
    public function getErrorsList(string $importId): array
    {
        $errorList = [];
        $errors = $this->errorRepository->findByOperationId($importId);

        foreach ($errors as $error) {
            /** @var Error $error */
            $fileName = $error->file_name;
            $entry = $error->entry_number_in_file;

            foreach ($error->errors as $key => $mgsList) {
                foreach ($mgsList as $msg) {
                    $errorList[] = "Entry $entry in $fileName: $key: $msg";
                }
            }
        }

        return $errorList;
    }
}
