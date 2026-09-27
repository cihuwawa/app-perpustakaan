@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')

    <h1>Daftar Anggota</h1>

    @if (session('success'))
        <div style="padding: 10px; margin-bottom: 15px; background: #dcfce7; color: #166534; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('members.create') }}" class="btn">
            + Tambah Anggota
        </a>
    </p>

    <form action="{{ route('members.index') }}" method="GET" style="margin-bottom: 20px;">
        <label for="search">Cari Nama Anggota</label>
        <br>

        <input
            type="text"
            name="search"
            id="search"
            value="{{ request('search') }}"
            placeholder="Masukkan nama anggota"
        >

        <button type="submit" class="btn">
            Cari
        </button>

        @if (request('search'))
            <a href="{{ route('members.index') }}" class="btn">
                Reset
            </a>
        @endif
    </form>

    @if ($members->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->nama }}</td>
                        <td>{{ $member->nim }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->nomor_telepon }}</td>
                        <td>{{ $member->status }}</td>
                        <td>
                            <a href="{{ route('members.show', $member->id) }}">
                                Detail
                            </a>

                            |

                            <a href="{{ route('members.edit', $member->id) }}">
                                Edit
                            </a>

                            |

                            <form
                                action="{{ route('members.destroy', $member->id) }}"
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
                @endforeach
            </tbody>
        </table>

    @else

        @if (request('search'))
            <p>
                Tidak ada anggota dengan nama "{{ request('search') }}".
            </p>
        @else
            <p>
                Belum ada data anggota.
            </p>
        @endif

    @endif

    <div style="margin-top: 20px;">
        {{ $members->appends(request()->query())->links() }}
    </div>

@endsection