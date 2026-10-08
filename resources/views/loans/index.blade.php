@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')

    <h1>Daftar Peminjaman</h1>

    @if (session('success'))
        <div style="padding: 10px; margin-bottom: 15px; background: #dcfce7; color: #166534; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('loans.create') }}" class="btn">
            + Tambah Peminjaman
        </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Tanggal Pinjam</th>
                <th>Batas Pengembalian</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($loans as $loan)

                <tr>
                    <td>{{ $loan->id }}</td>

                    <td>
                        {{ $loan->member->nama }}
                    </td>

                    <td>
                        {{ $loan->user->name }}
                    </td>

                    <td>
                        {{ $loan->tanggal_pinjam }}
                    </td>

                    <td>
                        {{ $loan->tanggal_kembali }}
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
                    <td>
                        <a href="{{ route('loans.show', $loan->id) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('loans.edit', $loan->id) }}">
                            Edit
                        </a>

                        @if ($loan->status === 'dipinjam')
                            |

                            <form
                                action="{{ route('loans.kembalikan', $loan->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                @method('PUT')

                                <button type="submit">
                                    Kembalikan
                                </button>
                            </form>
                        @endif

                        |

                        <form
                            action="{{ route('loans.destroy', $loan->id) }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="8">
                        Belum ada data peminjaman.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $loans->links() }}
    </div>

@endsection