<?php

    // Load Laravel bootstrap file to have access to the application
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

    use App\Models\Employee;
    use App\Models\Family_data;

    // Fetch employee and family data
    $employees = Employee::all();
    $familyData = Family_data::all();

    // Set headers for CSV download
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=\"data_karyawan.csv\"");

    // Open the output stream
    $output = fopen('php://output', 'w');

    // Write the column headers (first row)
    fputcsv($output, [
        'ID Number', 'Full Name', 'Nickname', 'Contract Date', 'Work Date',
        'Status', 'Position', 'NUPTK', 'Gender', 'Place of Birth', 'Birth Date',
        'Religion', 'Email', 'Hobby', 'Marital Status', 'Residence Address',
        'Phone', 'Address Emergency', 'Phone Emergency', 'Blood Type',
        'Last Education', 'Agency', 'Graduation Year', 'Competency Training Place',
        'Organizational Experience', 'Mate Name', 'Child Name', 'Wedding Date',
        'Marriage Certificate Number'
    ]);

    // Write each employee and their related family data (as rows)
    foreach ($employees as $employee) {
        // Find related family data for this employee
        $family = $familyData->where('id_number', $employee->id_number)->first();

        // Write a row for this employee
        fputcsv($output, [
            $employee->id_number, $employee->full_name, $employee->nickname,
            $employee->contract_date, $employee->work_date, $employee->status,
            $employee->position, $employee->nuptk, $employee->gender,
            $employee->place_birth, $employee->birth_date, $employee->religion,
            $employee->email, $employee->hobby, $employee->marital_status,
            $employee->residence_address, $employee->phone,
            $employee->address_emergency, $employee->phone_emergency,
            $employee->blood_type, $employee->last_education,
            $employee->agency, $employee->graduation_year,
            $employee->competency_training_place, $employee->organizational_experience,
            // Family data columns (if exists, otherwise empty)
            $family ? $family->mate_name : '',
            $family ? $family->child_name : '',
            $family ? $family->wedding_date : '',
            $family ? $family->marriage_certificate_number : ''
        ]);
    }

    // Close output stream
    fclose($output);
    exit;
