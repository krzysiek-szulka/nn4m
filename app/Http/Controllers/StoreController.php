<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
    }

    public function import()
    {
        return view('store/import');
    }

    public function processImport(Request $request)
    {
        var_dump($request->all()); exit;
    }
}
