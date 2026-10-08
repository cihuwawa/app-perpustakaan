@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')

    <h1>Detail Anggota</h1>

    <p>
        <a href="{{ route('members.index') }}">
            &larr; Kembali ke daftar anggota
        </a>
    </p>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $member->nama }}</td>
        </tr>

        <tr>
            <th>NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>

        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ ucfirst($member->status) }}</td>
        </tr>
    </table>

    <h2 style="margin-top: 30px;">
        Riwayat Peminjaman
    </h2>

    <p>
        <em>
            Riwayat peminjaman anggota.
        </em>
    </p>

    <table>
        <thead>
            <tr>
                <th>Tanggal Pinjam</th>
                <th>Batas Pengembalian</th>
                <th>Tanggal Dikembalikan</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($member->loans as $loan)

                <tr>
                    <tr>
                        <td>
                            {{ $loan->tanggal_pinjam }}
                        </td>

                        <td>
                            {{ $loan->tanggal_kembali }}
                        </td>

                        <td>
                            {{ $loan->tanggal_dikembalikan ?? '-' }}
                        </td>

                        <td>
                            {{ $loan->user->name }}
                        </td>

                        <td>
                            @foreach ($loan->loanItems as $item)
                                {{ $item->book->judul }}

                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>

                        <td>
                            {{ ucfirst($loan->status) }}
                        </td>
                    </tr>
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        Anggota ini belum pernah meminjam buku.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

    <p style="margin-top: 20px;">
        <a href="{{ route('members.edit', $member->id) }}" class="btn">
            Edit Anggota
        </a>
    </p>

@endsection