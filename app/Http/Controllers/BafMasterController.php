<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BafMasterImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BafMasterExport;

class BafMasterController extends Controller
{
    /**
     * Import data from an Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new BafMasterImport, $request->file('file'));

        return back()->with('success', 'Data berhasil diimport.');
    }

    /**
     * Export data to an Excel file.
     */
    public function export()
    {
        return Excel::download(new BafMasterExport, 'baf_master.xlsx');
    }
}
