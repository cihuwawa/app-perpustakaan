@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

    <h1>Tambah Peminjaman</h1>

    <p>
        <a href="{{ route('loans.index') }}">
            &larr; Kembali ke daftar peminjaman
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

    <form action="{{ route('loans.store') }}" method="POST">

        @csrf

        <p>
            <label for="member_id">Anggota</label><br>

            <select name="member_id" id="member_id" required>
                <option value="">-- Pilih Anggota --</option>

                @foreach ($members as $member)
                    <option
                        value="{{ $member->id }}"
                        {{ old('member_id') == $member->id ? 'selected' : '' }}
                    >
                        {{ $member->nama }} - {{ $member->nim }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
           <em>
                Petugas pencatat:
                <strong>{{ auth()->user()->name }}</strong>
                (otomatis dari akun yang login).
            </em>
        </p>

        <p>
            <label for="tanggal_pinjam">Tanggal Pinjam</label><br>

            <input
                type="date"
                name="tanggal_pinjam"
                id="tanggal_pinjam"
                value="{{ old('tanggal_pinjam') }}"
                required
            >
        </p>

        <p>
            <label for="tanggal_kembali">Batas Pengembalian</label>

            <input
                type="date"
                name="tanggal_kembali"
                id="tanggal_kembali"
                value="{{ old('tanggal_kembali') }}"
                required
            >
        </p>

        <p>
            <strong>Pilih Buku</strong>
        </p>

        @foreach ($books as $book)
            <p>
                <label>
                    <input
                        type="checkbox"
                        name="book_ids[]"
                        value="{{ $book->id }}"
                        {{ in_array($book->id, old('book_ids', [])) ? 'checked' : '' }}
                    >

                    {{ $book->judul }}
                    (Stok: {{ $book->stok }})
                </label>
            </p>
        @endforeach

        <button type="submit">
            Simpan Peminjaman
        </button>

    </form>

@endsection