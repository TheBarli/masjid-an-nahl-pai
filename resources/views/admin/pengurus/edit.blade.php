@extends('admin.layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Edit Pengurus</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.pengurus.update', $pengurus->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama*</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pengurus->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan / Tugas*</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $pengurus->jabatan }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kontak (Opsional)</label>
                    <input type="text" name="kontak" class="form-control" value="{{ $pengurus->kontak }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="urutan" class="form-control" value="{{ $pengurus->urutan }}">
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Foto Saat Ini</label>
                    <img src="{{ $pengurus->foto ? asset('storage/' . $pengurus->foto) : 'https://placehold.co/100x100?text=No+Foto' }}"
                         width="100" height="100" class="rounded mb-2">

                    <input type="file" name="foto" class="form-control mt-3">
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
