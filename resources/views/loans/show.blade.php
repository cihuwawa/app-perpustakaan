@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')

    <h1>Detail Peminjaman</h1>

    <p>
        <a href="{{ route('loans.index') }}">
            &larr; Kembali ke daftar peminjaman
        </a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $loan->id }}</td>
        </tr>

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
            <th>Batas Pengembalian</th>
            <td>{{ $loan->tanggal_kembali }}</td>
        </tr>

        <tr>
            <th>Tanggal Dikembalikan</th>
            <td>{{ $loan->tanggal_dikembalikan ?? '-' }}</td>
        </tr>

        <tr>
        <th>Status</th>
        <td>
            @if ($loan->status === 'dikembalikan')
                <span class="badge badge-dikembalikan">
                    Dikembalikan
                </span>

            @elseif ($loan->status === 'terlambat')
                <span class="badge badge-terlambat">
                    Terlambat
                </span>

            @else
                <span class="badge badge-dipinjam">
                    Dipinjam
                </span>
            @endif
        </td>
    </tr>
    </table>

    <h2 style="margin-top: 30px;">Daftar Buku</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($loan->loanItems as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book->judul }}</td>
                    <td>{{ $item->book->penulis }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="3">
                        Tidak ada buku pada transaksi ini.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

    <p style="margin-top: 20px;">
        <a href="{{ route('loans.edit', $loan->id) }}" class="btn">
            Edit Peminjaman
        </a>
    </p>

@endsection