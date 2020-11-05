<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\Error\ErrorsListResponse;
use App\Repositories\ErrorRepository;
use Illuminate\Http\JsonResponse;

class ErrorController extends Controller
{
    private ErrorRepository $errorRepository;

    public function __construct(ErrorRepository $errorRepository)
    {
        $this->errorRepository = $errorRepository;
    }

    public function listErrors(): JsonResponse
    {
        $errors = $this->errorRepository->all();
        return new ErrorsListResponse($errors);
    }

    public function getByStoreId(int $storeId): JsonResponse
    {
        $errors = $this->errorRepository->findByStoreId($storeId);

        return new ErrorsListResponse($errors);
    }
}
