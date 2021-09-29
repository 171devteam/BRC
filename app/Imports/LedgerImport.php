<?php

namespace App\Imports;

use App\Models\Ledger;
use Maatwebsite\Excel\Concerns\ToModel;

class LedgerImport implements ToModel
{

    /**
     * Instantiate a new LedgerImport instance.
     */
    public function __construct($bank_id, $created_by)
    {
        $this->bankid = $bank_id;
        $this->createdby = $created_by;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ledger([
            'name' => $row[0],
            'particulars' => $row[1],
            'cheque_no' => $row[2],
            'issue_date' => $this->transformDate($row[3]),
            'amount' => $row[4],
            'bank_id' => $this->bankid,
            'created_by' => $this->createdby,
        ]);
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
