<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Error;

class ErrorRepository
{
    public function create(Error $error): bool
    {
        return $error->save();
    }

}
