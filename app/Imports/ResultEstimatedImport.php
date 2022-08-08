<?php

namespace App\Imports;

use App\Models\ResultEstimated;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class ResultEstimatedImport implements ToModel
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ResultEstimated([
            'ID' => $row[0],
            'ClassName' => $row[1],
            'Speed' => $row[2],
            'Times' => $row[3],
        ]);
    }
}
