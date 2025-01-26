<?php

namespace App\Exports;

use App\Models\BafMaster;
use Maatwebsite\Excel\Concerns\FromCollection;

class BafMasterExport implements FromCollection
{
    public function collection()
    {
        return BafMaster::all();
    }
}

