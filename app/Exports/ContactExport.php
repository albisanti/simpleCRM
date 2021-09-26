<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactExport implements FromCollection, WithHeadings
{
    protected $contacts;
    public function __construct(Collection $contacts){
        $this->contacts = $contacts;
    }

    public function headings(): array{
        return [
            'Id',
            'Type',
            'Name',
            'Company Name',
            'Email',
            'Email 2',
            'Address',
            'City',
            'Nation',
            'What They Do',
            'Notes'
        ];
    }

    public function collection()
    {
        return $this->contacts;

    }
}
