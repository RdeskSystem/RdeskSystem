<?php

namespace App\Imports;

use App\Models\BafMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BafMasterImport implements ToModel
{
    public function model(array $row)
    {
        return new BafMaster([
            'agreement_no'         => $row[0],
            'dunner'               => $row[1],
            'customer_name'        => $row[2],
            'due_date'             => Date::excelToDateTimeObject($row[3]),
            'tenor'                => $row[4],
            'sr'                   => $row[5],
            'amount_installment'   => $row[6],
            'sisa_tenor'           => $row[7],
            'jobpos_desc'          => $row[8],
            'type_motor'           => $row[9],
            'office_phone'         => $row[10],
            'phone_tagih'          => $row[11],
            'telp_mobile'          => $row[12],
            'other_phone'          => $row[13],
            'warna'                => $row[14],
            'no_polisi'            => $row[15],
            'company_name'         => $row[16],
            'type_case'            => $row[17],
            'product'              => $row[18],
            'dpd'                  => $row[19],
            'branch'               => $row[20],
            'pembayaran_100'       => ($row[21] == 'Yes' || $row[21] == 1) ? true : false,
            'angsuran_pokok'       => $row[22],
            'sisa_denda'           => $row[23],
            'to_time_parsial'      => $row[24],
            'sisa_tagihan'         => $row[25],
            'deal_amount'          => $row[26],
            'wo_years'             => $row[27],
            'category'             => $row[28],
        ]);
    }
}
