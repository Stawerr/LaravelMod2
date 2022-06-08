<?php

namespace App\Imports;

use App\Player;
use Maatwebsite\Excel\Concerns\ToModel;

class PlayersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Player([
            'ID'=>$row[0],
            'Name'=>$row[1],
            'Address'=>$row[2],
            'Description'=>$row[3],
            'Retired'=>$row[4],
            'Created_at'=>$row[5],
            'Updated_at'=>$row[6],
        ]);
    }
}
