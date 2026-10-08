@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')

    <h1>Edit Peminjaman</h1>

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

    <table>
        <tr>
            <th>Anggota</th>
            <td>{{ $loan->member->nama }}</td>
        </tr>

        <tr>
            <th>Petugas</th>
            <td>{{ $loan->user->name }}</td>
        </tr>

        <tr>
            <th>Tanggal Pinjam</th>
            <td>{{ $loan->tanggal_pinjam }}</td>
        </tr>

        <tr>
            <th>Buku</th>
            <td>
                @foreach ($loan->loanItems as $item)
                    {{ $item->book->judul }}

                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </td>
        </tr>
    </table>

    <form action="{{ route('loans.update', $loan->id) }}" method="POST" style="margin-top: 20px;">

        @csrf
        @method('PUT')

        <p>
            <label for="tanggal_kembali">
                Batas Pengembalian
            </label>
            <br>

            <input
                type="date"
                name="tanggal_kembali"
                id="tanggal_kembali"
                value="{{ old('tanggal_kembali', $loan->tanggal_kembali) }}"
                required
            >
        </p>

        <p>
            <label for="status">
                Status
            </label>
            <br>

            <select name="status" id="status" required>

                <option
                    value="dipinjam"
                    {{ old('status', $loan->status) == 'dipinjam' ? 'selected' : '' }}
                >
                    Dipinjam
                </option>

                <option
                    value="dikembalikan"
                    {{ old('status', $loan->status) == 'dikembalikan' ? 'selected' : '' }}
                >
                    Dikembalikan
                </option>

                <option
                    value="terlambat"
                    {{ old('status', $loan->status) == 'terlambat' ? 'selected' : '' }}
                >
                    Terlambat
                </option>

            </select>
        </p>

        <button type="submit">
            Simpan Perubahan
        </button>

    </form>

@endsection