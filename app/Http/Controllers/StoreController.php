<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Error;
use App\Service\Error\ErrorService;
use App\Service\Exception\ReadFileException;
use App\Service\Store\StoreImporter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StoreController extends Controller
{
    private StoreImporter $storeImporter;
    private ErrorService $errorService;

    public function __construct(StoreImporter $storeImporter, ErrorService $errorService)
    {
        $this->storeImporter = $storeImporter;
        $this->errorService = $errorService;
    }

    public function import(): View
    {
        return view('store/import');
    }

    public function processImport(Request $request): RedirectResponse
    {
        if (!$request->hasFile('file')) {
            return Redirect::back()->withErrors('Import file missing');
        }

        try {
            $uploadedFile = $request->file('file');
            $importId = $this->storeImporter->importFromFile(
                $uploadedFile->getRealPath(),
                $uploadedFile->getClientOriginalName()
            );

            $errors = $this->errorService->getErrorsList($importId);

            return Redirect::back()->with('msg', 'Stores imported')->withErrors($errors);
        } catch (ReadFileException $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
