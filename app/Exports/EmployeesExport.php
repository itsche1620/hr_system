<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Family_data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeesExport implements FromCollection, WithHeadings, WithMultipleSheets
{
    public function collection()
    {
        return Employee::all();
    }

    public function headings(): array
    {
        return [
            'ID Number',
            'Full Name',
            'Nickname',
            'Contract Date',
            'Work Date',
            'Status',
            'Position',
            'NUPTK',
            'Gender',
            'Place of Birth',
            'Birth Date',
            'Religion',
            'Email',
            'Hobby',
            'Marital Status',
            'Residence Address',
            'Phone',
            'Emergency Address',
            'Emergency Phone',
            'Blood Type',
            'Last Education',
            'Agency',
            'Graduation Year',
            'Competency Training Place',
            'Organizational Experience',
        ];
    }

    public function sheets(): array
    {
        return [
            new EmployeesSheet(),
            new FamilyDataSheet(),
        ];
    }
}

class EmployeesSheet implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::all();
    }

    public function headings(): array
    {
        return [
            'ID Number',
            'Full Name',
            'Nickname',
            'Contract Date',
            'Work Date',
            'Status',
            'Position',
            'NUPTK',
            'Gender',
            'Place of Birth',
            'Birth Date',
            'Religion',
            'Email',
            'Hobby',
            'Marital Status',
            'Residence Address',
            'Phone',
            'Emergency Address',
            'Emergency Phone',
            'Blood Type',
            'Last Education',
            'Agency',
            'Graduation Year',
            'Competency Training Place',
            'Organizational Experience',
        ];
    }
}

class FamilyDataSheet implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Family_data::all();
    }

    public function headings(): array
    {
        return [
            'ID Number',
            'Mate Name',
            'Child Name',
            'Wedding Date',
            'Marriage Certificate Number',
        ];
    }
}
