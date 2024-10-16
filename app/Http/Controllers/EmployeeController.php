<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Family_data;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $family_data = Family_data::all();
        return view('employee.index', compact('employees', 'family_data'));
    }
    public function create()
    {
        return view('employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|numeric|unique:employees,id_number',
            'full_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'contract_date' => 'required|date',
            'work_date' => 'required|date',
            'status' => 'required|in:Aktif,Berhenti',
            'position' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'gender' => 'required|in:Pria,Wanita',
            'place_birth' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hobby' => 'required|string|max:255',
            'marital_status' => 'required|in:Menikah,Belum',
            'residence_address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address_emergency' => 'required|string|max:255',
            'phone_emergency' => 'required|string|max:255',
            'blood_type' => 'required|string|max:255',
            'last_education' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'graduation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'competency_training_place' => 'required|string|max:255',
            'organizational_experience' => 'required|string',
        ]);

        Employee::create([
            'id_number' => $request->id_number,
            'full_name' => $request->full_name,
            'nickname' => $request->nickname,
            'contract_date' => $request->contract_date,
            'work_date' => $request->work_date,
            'status' => $request->status,
            'position' => $request->position,
            'nuptk' => $request->nuptk,
            'gender' => $request->gender,
            'place_birth' => $request->place_birth,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'email' => $request->email,
            'hobby' => $request->hobby,
            'marital_status' => $request->marital_status,
            'residence_address' => $request->residence_address,
            'phone' => $request->phone,
            'address_emergency' => $request->address_emergency,
            'phone_emergency' => $request->phone_emergency,
            'blood_type' => $request->blood_type,
            'last_education' => $request->last_education,
            'agency' => $request->agency,
            'graduation_year' => $request->graduation_year,
            'competency_training_place' => $request->competency_training_place,
            'organizational_experience' => $request->organizational_experience,
        ]);

        $request->validate([
            'id_number' => 'required|numeric|exists:employees,id_number',
            'mate_name' => 'required|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'wedding_date' => 'required|date',
            'marriage_certificate_number' => 'required|string|max:255',
        ]);
        // dd($request);

        Family_data::create([
            'id_number' => $request->id_number,
            'mate_name' => $request->mate_name,
            'child_name' => $request->child_name,
            'wedding_date' => $request->wedding_date,
            'marriage_certificate_number' => $request->marriage_certificate_number,
        ]);

        return redirect('employee/create')->with('status', 'Data telah ditambahkan');
    }
    public function edit(int $id_number)
    {
        $employee = Employee::findOrFail($id_number);
        $family_data = Family_data::where('id_number', $id_number)->first();

        return view('employee.edit', compact('employee', 'family_data'));
    }
    public function update(Request $request, int $id_number)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'contract_date' => 'required|date',
            'work_date' => 'required|date',
            'status' => 'required|in:Aktif,Berhenti',
            'position' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'gender' => 'required|in:Pria,Wanita',
            'place_birth' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hobby' => 'required|string|max:255',
            'marital_status' => 'required|in:Menikah,Belum',
            'residence_address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address_emergency' => 'required|string|max:255',
            'phone_emergency' => 'required|string|max:255',
            'blood_type' => 'required|string|max:255',
            'last_education' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'graduation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'competency_training_place' => 'required|string|max:255',
            'organizational_experience' => 'required|string',
        ]);

        $employee = Employee::findOrFail($id_number);
        $employee->update([
            'full_name' => $request->full_name,
            'nickname' => $request->nickname,
            'contract_date' => $request->contract_date,
            'work_date' => $request->work_date,
            'status' => $request->status,
            'position' => $request->position,
            'nuptk' => $request->nuptk,
            'gender' => $request->gender,
            'place_birth' => $request->place_birth,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'email' => $request->email,
            'hobby' => $request->hobby,
            'marital_status' => $request->marital_status,
            'residence_address' => $request->residence_address,
            'phone' => $request->phone,
            'address_emergency' => $request->address_emergency,
            'phone_emergency' => $request->phone_emergency,
            'blood_type' => $request->blood_type,
            'last_education' => $request->last_education,
            'agency' => $request->agency,
            'graduation_year' => $request->graduation_year,
            'competency_training_place' => $request->competency_training_place,
            'organizational_experience' => $request->organizational_experience,
        ]);


        $request->validate([
            'mate_name' => 'nullable|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'marriage_certificate_number' => 'nullable|string|max:255',
        ]);

        $familyData = Family_data::where('id_number', $id_number)->first();
        if ($familyData) {
            $familyData->update([
                'mate_name' => $request->mate_name,
                'child_name' => $request->child_name,
                'wedding_date' => $request->wedding_date,
                'marriage_certificate_number' => $request->marriage_certificate_number,
            ]);
        } else {

            if ($request->filled(['mate_name', 'child_name', 'wedding_date', 'marriage_certificate_number'])) {
                Family_data::create([
                    'id_number' => $id_number,
                    'mate_name' => $request->mate_name,
                    'child_name' => $request->child_name,
                    'wedding_date' => $request->wedding_date,
                    'marriage_certificate_number' => $request->marriage_certificate_number,
                ]);
            }
        }


        return redirect()->back()->with('status', 'Data telah diubah');
    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees_family_data.xlsx');
    }

    public function archive($id_number)
    {
        $employee = Employee::findOrFail($id_number);
        $employee->delete(); // Soft delete

        return redirect()->route('employee.index')->with('success', 'Data berhasil di arsipkan!');
    }
    public function archived()
    {
        $employees = Employee::onlyTrashed()->get();
        $family_data = Family_data::onlyTrashed()->get();

        return view('employee.archived', compact('employees', 'family_data'));
    }
    public function restore($id_number)
    {
        $employee = Employee::withTrashed()->where('id_number', $id_number)->firstOrFail();
        $employee->restore();

        return redirect()->route('employee.archived')->with('success', 'Data berhasil dipulihkan!');
    }
}
