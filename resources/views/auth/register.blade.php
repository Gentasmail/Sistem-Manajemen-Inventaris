@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-br">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">Daftar Akun</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-700">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:border-green-400 @error('name') border-red-500 @enderror"
                    required autofocus>
                @error('name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:border-green-400 @error('email') border-red-500 @enderror"
                    required>
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Password</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:border-green-400 @error('password') border-red-500 @enderror"
                    required>
                @error('password')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-sm text-gray-700">Konfirmasi Password</label>
                <input id="password-confirm" type="password" name="password_confirmation"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:border-green-400"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Daftar</button>

            <div class="mt-4 text-center text-sm">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-green-600 hover:underline">Login di sini</a>
            </div>
        </form>
    </div>
</div>
@endsection
