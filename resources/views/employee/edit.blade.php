@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('employee') }}" class="btn btn-primary float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('employee/' . $employee->id_number . '/edit') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h4>Edit Data Karyawan</h4>

                        <div class="mb-3">
                            <label for="id_number" class="form-label">NIK Karyawan</label>
                            <input type="text" id="id_number" name="id_number" class="form-control" value="{{ old('id_number', $employee->id_number) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name', $employee->full_name) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="nickname">Nama Panggilan</label>
                            <input type="text" id="nickname" name="nickname" class="form-control" value="{{ old('nickname', $employee->nickname) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="contract_date">Tanggal Kontrak</label>
                            <input type="date" id="contract_date" name="contract_date" class="form-control" value="{{ old('contract_date', $employee->contract_date) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="work_date">Tanggal Kerja</label>
                            <input type="date" id="work_date" name="work_date" class="form-control" value="{{ old('work_date', $employee->work_date) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Berhenti" {{ old('status', $employee->status) == 'Berhenti' ? 'selected' : '' }}>Berhenti</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="position">Jabatan</label>
                            <input type="text" id="position" name="position" class="form-control" value="{{ old('position', $employee->position) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="nuptk">NUPTK</label>
                            <input type="text" id="nuptk" name="nuptk" class="form-control" value="{{ old('nuptk', $employee->nuptk) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="Pria" {{ old('gender', $employee->gender) == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('gender', $employee->gender) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="place_birth">Tempat Lahir</label>
                            <input type="text" id="place_birth" name="place_birth" class="form-control" value="{{ old('place_birth', $employee->place_birth) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date', $employee->birth_date) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="religion">Agama</label>
                            <select id="religion" name="religion" class="form-control">
                                <option value="Islam" {{ old('religion', $employee->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('religion', $employee->religion) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katholik" {{ old('religion', $employee->religion) == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                <option value="Hindu" {{ old('religion', $employee->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Budha" {{ old('religion', $employee->religion) == 'Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Konghucu" {{ old('religion', $employee->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="hobby">Hobi</label>
                            <input type="text" id="hobby" name="hobby" class="form-control" value="{{ old('hobby', $employee->hobby) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="marital_status">Status Pernikahan</label>
                            <select id="marital_status" name="marital_status" class="form-control">
                                <option value="Menikah" {{ old('marital_status', $employee->marital_status) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="Belum" {{ old('marital_status', $employee->marital_status) == 'Belum' ? 'selected' : '' }}>Belum</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="residence_address">Alamat Lengkap</label>
                            <input type="text" id="residence_address" name="residence_address" class="form-control" value="{{ old('residence_address', $employee->residence_address) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="address_emergency">Alamat Darurat</label>
                            <input type="text" id="address_emergency" name="address_emergency" class="form-control" value="{{ old('address_emergency', $employee->address_emergency) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="phone_emergency">Nomor Telepon Darurat</label>
                            <input type="text" id="phone_emergency" name="phone_emergency" class="form-control" value="{{ old('phone_emergency', $employee->phone_emergency) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="blood_type">Golongan Darah</label>
                            <input type="text" id="blood_type" name="blood_type" class="form-control" value="{{ old('blood_type', $employee->blood_type) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="last_education">Pendidikan Terakhir</label>
                            <input type="text" id="last_education" name="last_education" class="form-control" value="{{ old('last_education', $employee->last_education) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="agency">Lembaga</label>
                            <input type="text" id="agency" name="agency" class="form-control" value="{{ old('agency', $employee->agency) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="graduation_year">Tahun Kelulusan</label>
                            <input type="text" id="graduation_year" name="graduation_year" class="form-control" value="{{ old('graduation_year', $employee->graduation_year) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="competency_training_place">Tempat Pelatihan Kompetensi</label>
                            <input type="text" id="competency_training_place" name="competency_training_place" class="form-control" value="{{ old('competency_training_place', $employee->competency_training_place) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="organizational_experience">Pengalaman Organisasi</label>
                            <textarea id="organizational_experience" name="organizational_experience" class="form-control" rows="3">{{ old('organizational_experience', $employee->organizational_experience) }}</textarea>
                        </div>

                        <h4>Edit Data Keluarga</h4>
                        <div class="mb-3">
                            <label for="mate_name">Nama Pasangan</label>
                            <input type="text" id="mate_name" name="mate_name" class="form-control" value="{{ old('mate_name', $family_data->mate_name ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="child_name">Nama Anak</label>
                            <input type="text" id="child_name" name="child_name" class="form-control" value="{{ old('child_name', $family_data->child_name ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="wedding_date">Tanggal Pernikahan</label>
                            <input type="date" id="wedding_date" name="wedding_date" class="form-control" value="{{ old('wedding_date', $family_data->wedding_date ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="marriage_certificate_number">Nomor Surat Nikah</label>
                            <input type="text" id="marriage_certificate_number" name="marriage_certificate_number" class="form-control" value="{{ old('marriage_certificate_number', $family_data->marriage_certificate_number ?? '') }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
