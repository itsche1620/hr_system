<?php

namespace App\Http\Controllers;

use App\Models\EmployeeRecord;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $record = EmployeeRecord::get();
        return view('record.index', compact('record'));
    }
    public function create()
    {
        return view('record.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|exists:employees,id_number|integer',
            'offense_type' => 'required|string|max:255',
            'offense_date' => 'required|date',
            'description' => 'required|string',
        ]);

        EmployeeRecord::create([
            'id_number' => $request->id_number,
            'offense_type' => $request->offense_type,
            'offense_date' => $request->offense_date,
            'description' => $request->description,
        ]);

        return redirect('record/create')->with('status', 'Data Telah Masuk');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(int $id_number)
    {
        $record = EmployeeRecord::where('id_number', $id_number)->firstOrFail();
        return view('record.edit', compact('record'));
    }

    public function update(Request $request, int $id_number)
    {
        $request->validate([
            'id_number' => 'required|exists:employees,id_number|integer',
            'offense_type' => 'required|string|max:255',
            'offense_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $record = EmployeeRecord::where('id_number', $id_number)->firstOrFail();
        $record->update([
            'id_number' => $request->id_number,
            'offense_type' => $request->offense_type,
            'offense_date' => $request->offense_date,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('status', 'Pelanggaran berhasil diubah');
    }

    public function destroy(int $id_number)
    {
        $record = EmployeeRecord::where('id_number', $id_number)->firstOrFail();
        $record->delete();
        return redirect()->route('record.index')->with('status', 'Pelanggaran telah dihapus');
    }
    public function storeFollowUp(Request $request, $id_number)
    {
        $request->validate([
            'follow_up_description' => 'required|string',
        ]);

        $record = EmployeeRecord::where('id_number', $id_number)->firstOrFail();

        $record->follow_up_description = $request->follow_up_description;
        $record->follow_up = true;
        $record->save();
        
        return redirect()->route('record.index')->with('status', 'Follow-up berhasil ditambahkan.');
    }
}
