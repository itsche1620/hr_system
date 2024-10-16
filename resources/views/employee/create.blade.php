@extends('main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{ url('employee') }}" class="btn btn-secondary float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('employee/create') }}" method="POST">
                            @csrf

                            <h4 class="mb-4">Data Karyawan</h4>

                            <div class="mb-3">
                                <label for="id_number" class="form-label">NIK Karyawan</label>
                                <input type="text" id="id_number" name="id_number" class="form-control" value="{{ old('id_number') }}" />
                                @error('id_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Lengkap</label>
                                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}" />
                                @error('full_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nickname" class="form-label">Nama Panggilan</label>
                                <input type="text" id="nickname" name="nickname" class="form-control" value="{{ old('nickname') }}" />
                                @error('nickname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contract_date" class="form-label">Tanggal Kontrak</label>
                                <input type="date" id="contract_date" name="contract_date" class="form-control" value="{{ old('contract_date') }}" />
                                @error('contract_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="work_date" class="form-label">Tanggal Kerja</label>
                                <input type="date" id="work_date" name="work_date" class="form-control" value="{{ old('work_date') }}" />
                                @error('work_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Berhenti" {{ old('status') == 'Berhenti' ? 'selected' : '' }}>Berhenti</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Jabatan</label>
                                <input type="text" id="position" name="position" class="form-control" value="{{ old('position') }}" />
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nuptk" class="form-label">NUPTK</label>
                                <input type="text" id="nuptk" name="nuptk" class="form-control" value="{{ old('nuptk') }}" />
                                @error('nuptk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="Pria" {{ old('gender') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="place_birth" class="form-label">Tempat Lahir</label>
                                <input type="text" id="place_birth" name="place_birth" class="form-control" value="{{ old('place_birth') }}" />
                                @error('place_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date') }}" />
                                @error('birth_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="religion" class="form-label">Agama</label>
                                <select id="religion" name="religion" class="form-select">
                                    <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katholik" {{ old('religion') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                    <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('religion') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('religion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hobby" class="form-label">Hobi</label>
                                <input type="text" id="hobby" name="hobby" class="form-control" value="{{ old('hobby') }}" />
                                @error('hobby')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="marital_status" class="form-label">Status Pernikahan</label>
                                <select id="marital_status" name="marital_status" class="form-select" onchange="toggleFamilyFields()">
                                    <option value="Menikah" {{ old('marital_status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Belum" {{ old('marital_status') == 'Belum' ? 'selected' : '' }}>Belum</option>
                                </select>
                                @error('marital_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="residence_address" class="form-label">Alamat Lengkap</label>
                                <input type="text" id="residence_address" name="residence_address" class="form-control" value="{{ old('residence_address') }}" />
                                @error('residence_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" />
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address_emergency" class="form-label">Alamat Darurat</label>
                                <input type="text" id="address_emergency" name="address_emergency" class="form-control" value="{{ old('address_emergency') }}" />
                                @error('address_emergency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone_emergency" class="form-label">Nomor Telepon Darurat</label>
                                <input type="text" id="phone_emergency" name="phone_emergency" class="form-control" value="{{ old('phone_emergency') }}" />
                                @error('phone_emergency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="blood_type" class="form-label">Golongan Darah</label>
                                <input type="text" id="blood_type" name="blood_type" class="form-control" value="{{ old('blood_type') }}" />
                                @error('blood_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="last_education" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" id="last_education" name="last_education" class="form-control" value="{{ old('last_education') }}" />
                                @error('last_education')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="agency" class="form-label">Lembaga</label>
                                <input type="text" id="agency" name="agency" class="form-control" value="{{ old('agency') }}" />
                                @error('agency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="graduation_year" class="form-label">Tahun Kelulusan</label>
                                <input type="text" id="graduation_year" name="graduation_year" class="form-control" value="{{ old('graduation_year') }}" />
                                @error('graduation_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="competency_training_place" class="form-label">Tempat Pelatihan Kompetensi</label>
                                <input type="text" id="competency_training_place" name="competency_training_place" class="form-control" value="{{ old('competency_training_place') }}" />
                                @error('competency_training_place')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="organizational_experience" class="form-label">Pengalaman Organisasi</label>
                                <textarea id="organizational_experience" name="organizational_experience" class="form-control" rows="3">{{ old('organizational_experience') }}</textarea>
                                @error('organizational_experience')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <h4 class="mb-4">Data Keluarga</h4>

                            <div class="mb-3">
                                <label for="mate_name" class="form-label">Nama Pasangan</label>
                                <input type="text" id="mate_name" name="mate_name" class="form-control" value="{{ old('mate_name') }}" />
                                @error('mate_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="child_name" class="form-label">Nama Anak</label>
                                <input type="text" id="child_name" name="child_name" class="form-control" value="{{ old('child_name') }}" />
                                @error('child_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="wedding_date" class="form-label">Tanggal Pernikahan</label>
                                <input type="date" id="wedding_date" name="wedding_date" class="form-control" value="{{ old('wedding_date') }}" />
                                @error('wedding_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="marriage_certificate_number" class="form-label">Nomor Surat Nikah</label>
                                <input type="text" id="marriage_certificate_number" name="marriage_certificate_number" class="form-control" value="{{ old('marriage_certificate_number') }}" />
                                @error('marriage_certificate_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFamilyFields() {
            const maritalStatus = document.getElementById('marital_status').value;
            const familyFields = ['mate_name', 'child_name', 'wedding_date', 'marriage_certificate_number'];

            familyFields.forEach(field => {
                const element = document.getElementById(field);
                if (maritalStatus === 'Belum') {
                    element.setAttribute('disabled', 'disabled');
                    element.value = ''; // Clear value if disabled
                } else {
                    element.removeAttribute('disabled');
                }
            });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            toggleFamilyFields();
        });
    </script>
@endsection
