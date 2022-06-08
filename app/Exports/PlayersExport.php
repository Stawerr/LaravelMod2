<?php

namespace App\Exports;

use App\Player;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlayersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Player::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Address',
            'Description',
            'Retired',
            'Created_at',
            'Updated_at',
        ];
    }
}
