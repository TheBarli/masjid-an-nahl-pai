@extends('admin.layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Pengurus</h2>
        <a href="{{ route('admin.pengurus.create') }}" class="btn btn-primary">
            + Tambah Pengurus
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th width="90">Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Kontak</th>
                        <th width="80">Urutan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pengurus as $p)
                        <tr>
                            <td>
                                <img src="{{ $p->foto ? asset('storage/' . $p->foto) : 'https://placehold.co/80x80?text=No+Foto' }}"
                                     width="60" height="60"
                                     class="rounded-circle">
                            </td>

                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->jabatan }}</td>
                            <td>{{ $p->kontak ?? '-' }}</td>
                            <td>{{ $p->urutan }}</td>

                            <td>
                                <a href="{{ route('admin.pengurus.edit', $p->id) }}" 
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.pengurus.destroy', $p->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus pengurus ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada pengurus.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
