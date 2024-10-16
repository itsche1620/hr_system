@extends('main')

@section('content')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(75, 72, 72, 0.918);
            margin-bottom: 20px;
        }

        .card-header h4 {
            margin: 0;
        }

        .table-container {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .table thead th {
            background-color: #feffff;
            color: rgb(7, 7, 7);
            text-align: center;
            vertical-align: middle;
        }

        .table tbody tr {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #0a0a0a;
        }

        .btn {
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 0.875rem;
        }

        .btn-primary {
            border-bottom: none;
        }

        .btn-success,
        .btn-danger {
            padding: 4px 8px;
            font-size: 0.75rem;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-title {
            margin-bottom: 20px;
            font-weight: 600;
            color: #343a40;
            text-align: center;
        }
    </style>

    <div class="container">
        <h1 class="my-4">Data Arsipan</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <div class="table-responsive">
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
                                            <form action="{{ route('employee.restore', $employee->id_number) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Keluarga</h4>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIK Karyawan</th>
                                    <th>Nama Pasangan</th>
                                    <th>Nama Anak</th>
                                    <th>Tanggal Pernikahan</th>
                                    <th>Nomor Surat Nikah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($family_data as $data)
                                    <tr>
                                        <td>{{ $data->id_number }}</td>
                                        <td>{{ $data->mate_name }}</td>
                                        <td>{{ $data->child_name }}</td>
                                        <td>{{ $data->wedding_date }}</td>
                                        <td>{{ $data->marriage_certificate_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
