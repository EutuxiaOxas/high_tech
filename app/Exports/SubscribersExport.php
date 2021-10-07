<?php

namespace App\Exports;

use App\Subscriptor;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscribersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subscriptor::select('email', 'created_at')->get();
    }
}
