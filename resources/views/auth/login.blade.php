@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-br">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Login</h2>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:border-blue-400 @error('email') border-red-500 @enderror"
                    required autocomplete="email" autofocus>
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Password</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:border-blue-400 @error('password') border-red-500 @enderror"
                    required autocomplete="current-password">
                @error('password')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="text-sm text-gray-700">Ingat Saya</label>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Login</button>

            @if (Route::has('password.request'))
                <div class="mt-4 text-right">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
                </div>
            @endif

            <div class="mt-4 text-center text-sm">
                Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
            </div>
        </form>
    </div>
</div>
@endsection
