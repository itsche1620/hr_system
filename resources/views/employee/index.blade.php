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

    <div class="container mt-4">
            <h1 class="my-4">Data Karyawan</h1>
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('employee.export') }}" class="btn btn-danger">Export</a>
                    <a href="" class="btn btn-success">Import</a>
                </div>
                <a href="{{ url('employee/create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-container">
                    <div class="table-responsive">
                        @include('employee.table', $employees)
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-4">
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
