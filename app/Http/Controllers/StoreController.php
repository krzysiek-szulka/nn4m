<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\Exception\ReadFileException;
use App\Service\Store\StoreImporter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StoreController extends Controller
{
    private $storeImporter;

    public function __construct(StoreImporter $storeImporter)
    {
        $this->storeImporter = $storeImporter;
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
            $this->storeImporter->importFromFile(
                $uploadedFile->getRealPath(),
                $uploadedFile->getClientOriginalName()
            );
        } catch (ReadFileException $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }

        return Redirect::back()->with('msg', 'Stores imported');
    }
}
