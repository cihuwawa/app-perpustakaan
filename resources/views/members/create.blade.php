@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')

    <h1>Tambah Anggota</h1>

    <p>
        <a href="{{ route('members.index') }}">
            &larr; Kembali ke daftar anggota
        </a>
    </p>

    @if ($errors->any())
        <div style="padding: 10px; margin-bottom: 15px; background: #fee2e2; color: #991b1b; border-radius: 5px;">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">

        @csrf

        <p>
            <label for="nama">Nama</label><br>
            <input
                type="text"
                name="nama"
                id="nama"
                value="{{ old('nama') }}"
                required
            >
        </p>

        <p>
            <label for="nim">NIM</label><br>
            <input
                type="text"
                name="nim"
                id="nim"
                value="{{ old('nim') }}"
                required
            >
        </p>

        <p>
            <label for="email">Email</label><br>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
            >
        </p>

        <p>
            <label for="nomor_telepon">Nomor Telepon</label><br>
            <input
                type="text"
                name="nomor_telepon"
                id="nomor_telepon"
                value="{{ old('nomor_telepon') }}"
                required
            >
        </p>

        <p>
            <label for="alamat">Alamat</label><br>
            <textarea
                name="alamat"
                id="alamat"
                rows="4"
                required
            >{{ old('alamat') }}</textarea>
        </p>

        <p>
            <label for="status">Status</label><br>
            <select name="status" id="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
        </p>

        <button type="submit">
            Simpan
        </button>

    </form>

@endsection