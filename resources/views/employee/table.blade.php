<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>NIK Karyawan</th>
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>Tanggal Kontrak</th>
            <th>Tanggal Kerja</th>
            <th>Status</th>
            <th>Jabatan</th>
            <th>NUPTK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Email</th>
            <th>Hobi</th>
            <th>Status Pernikahan</th>
            <th>Alamat Lengkap</th>
            <th>Nomor Handphone</th>
            <th>Alamat Darurat</th>
            <th>Nomor Handphone Darurat</th>
            <th>Golongan Darah</th>
            <th>Pendidikan Terakhir</th>
            <th>Lembaga</th>
            <th>Tahun Lulus</th>
            <th>Tempat Pelatihan Kompetensi</th>
            <th>Pengalaman Organisasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id_number }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->nickname }}</td>
                <td>{{ $employee->contract_date }}</td>
                <td>{{ $employee->work_date }}</td>
                <td>{{ $employee->status }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->nuptk }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->place_birth }}</td>
                <td>{{ $employee->birth_date }}</td>
                <td>{{ $employee->religion }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->hobby }}</td>
                <td>{{ $employee->marital_status }}</td>
                <td>{{ $employee->residence_address }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->address_emergency }}</td>
                <td>{{ $employee->phone_emergency }}</td>
                <td>{{ $employee->blood_type }}</td>
                <td>{{ $employee->last_education }}</td>
                <td>{{ $employee->agency }}</td>
                <td>{{ $employee->graduation_year }}</td>
                <td>{{ $employee->competency_training_place }}</td>
                <td>{{ $employee->organizational_experience }}</td>
                <td>
                    <a href="{{ route('employee.edit', $employee->id_number) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('employee.archive', $employee->id_number) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm">Arsip</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
