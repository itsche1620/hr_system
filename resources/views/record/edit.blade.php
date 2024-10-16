@extends('main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('record') }}" class="btn btn-primary float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('record.update', $record->id_number) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="id_number">NIK karyawan</label>
                            <input type="text" id="id_number" name="id_number" value="{{ $record->id_number }}" class="form-control"/>
                            @error('id_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="offense_type">Jenis pelanggaran</label>
                            <input type="text" id="offense_type" name="offense_type" value="{{ $record->offense_type }}" class="form-control"/>
                            @error('offense_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="offense_date">Tanggal pelanggaran</label>
                            <input type="date" id="offense_date" name="offense_date" value="{{ $record->offense_date }}" class="form-control"/>
                            @error('offense_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ $record->description }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
