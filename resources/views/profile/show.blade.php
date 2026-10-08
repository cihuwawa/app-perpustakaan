@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')

    <h1>Profil Pengguna</h1>

    <p>
        Berikut adalah informasi akun yang sedang login.
    </p>

    <div style="background: #f8fafc; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; margin-top: 20px;">

        <p>
            <strong>Nama:</strong>
            {{ $user->name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $user->email }}
        </p>

        <p>
            <strong>Role:</strong>
            {{ ucfirst($user->role) }}
        </p>

    </div>

    <p style="margin-top: 20px;">
        <a href="{{ route('books.index') }}">
            &larr; Kembali ke Daftar Buku
        </a>
    </p>

    
<h2 style="margin-top: 35px;">Ganti Password</h2>

<p>
    Untuk keamanan akun, masukkan password lama dan
    password baru yang ingin digunakan.
</p>

<form action="{{ route('profile.password.update') }}"
      method="POST"
      style="background: #f8fafc; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">

    @csrf

    <p>
        <label for="current_password">Password Lama</label><br>
        <input
            type="password"
            name="current_password"
            id="current_password"
            required
            autocomplete="current-password"
        >
        @error('current_password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label for="password">Password Baru</label><br>
        <input
            type="password"
            name="password"
            id="password"
            minlength="8"
            required
            autocomplete="new-password"
        >
        @error('password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label for="password_confirmation">Konfirmasi Password Baru</label><br>
        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            minlength="8"
            required
            autocomplete="new-password"
        >
    </p>

    <button
        type="submit"
        style="background: #2563eb; color: white; border: none; padding: 10px 18px; border-radius: 5px; cursor: pointer;"
    >
        Simpan Password Baru
    </button>

    </form>

@endsection
