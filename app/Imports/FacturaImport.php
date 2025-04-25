<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FacturaImport implements OnEachRow, WithHeadingRow
{
    private $data = [];

    public function onRow(Row $row)
    {
        $this->data[] = $row->toArray();
    }

    public function getData()
    {
        return $this->data;
    }
}

