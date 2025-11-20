@extends('admin.layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Tambah Pengurus</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama*</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan / Tugas*</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kontak (Opsional)</label>
                    <input type="text" name="kontak" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="urutan" class="form-control" value="0">
                    <small class="text-muted">Semakin kecil, semakin atas.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>

</div>
@endsection
