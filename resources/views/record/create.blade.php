@extends('main')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <!-- Success message -->
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Card component for form -->
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Tambah Record Pelanggaran</h4>
                    <a href="{{ url('record') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <!-- Form for adding a new record -->
                    <form action="{{ url('record/create') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="id_number" class="form-label">NIK Karyawan</label>
                            <input type="text" id="id_number" name="id_number" class="form-control" value="{{ old('id_number') }}">
                            @error('id_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="offense_type" class="form-label">Jenis Pelanggaran</label>
                            <input type="text" id="offense_type" name="offense_type" class="form-control" value="{{ old('offense_type') }}">
                            @error('offense_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="offense_date" class="form-label">Tanggal Pelanggaran</label>
                            <input type="date" id="offense_date" name="offense_date" class="form-control" value="{{ old('offense_date') }}">
                            @error('offense_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
