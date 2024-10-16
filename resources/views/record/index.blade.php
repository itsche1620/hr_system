@extends('main')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Pelanggaran</h4>
            <a href="{{ route('record.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <!-- Display success or error messages if any -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Table to display records -->
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>NIK Karyawan</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Tanggal Pelanggaran</th>
                        <th>Deskripsi</th>
                        <th>Status Follow Up</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($record as $item)
                        <tr>
                            <td>{{ $item->id_number }}</td>
                            <td>{{ $item->offense_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->offense_date)->format('d M Y') }}</td>
                            <td>{{ $item->description }}</td>
                            <!-- Conditional check for follow-up status -->
                            <td>
                                @if ($item->follow_up)
                                    <span class="badge bg-success">Sudah di Follow Up</span>
                                    <!-- Eye icon to view follow-up details -->
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewFollowUpModal{{ $item->id_number }}">
                                        <i class="fas fa-eye"></i> Lihat Follow Up
                                    </button>
                                @else
                                    <span class="badge bg-danger">Belum di Follow Up</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('record.edit', $item->id_number) }}" class="btn btn-success btn-sm">Edit</a>

                                <!-- Follow-Up Button triggers modal -->
                                @if (!$item->follow_up)
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#followUpModal{{ $item->id }}">
                                        Follow Up
                                    </button>
                                @endif

                                <a href="{{ route('record.destroy', $item->id_number) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah anda yakin untuk menghapus pelanggaran ini?');">Hapus</a>
                            </td>
                        </tr>

                        <!-- Modal for Follow Up -->
                        <div class="modal fade" id="followUpModal{{ $item->id }}" tabindex="-1" aria-labelledby="followUpModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="followUpModalLabel{{ $item->id }}">Follow Up - ID: {{ $item->id_number }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('record.store', $item->id_number) }}" method="POST">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label for="follow_up_description">Follow Up Description</label>
                                                <textarea name="follow_up_description" class="form-control" rows="4" required></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit Follow Up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal to View Follow Up Details -->
                        <div class="modal fade" id="viewFollowUpModal{{ $item->id }}" tabindex="-1" aria-labelledby="viewFollowUpModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewFollowUpModalLabel{{ $item->id }}">Follow Up Details - ID: {{ $item->id_number }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Deskripsi Follow Up:</strong></p>
                                        <p>{{ $item->follow_up_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
