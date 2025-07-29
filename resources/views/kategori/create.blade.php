@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
        @csrf

        <input type="hidden" name="from" value="{{ request('from') }}">
        <input type="hidden" name="id" value="{{ request('id') }}">

        <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama Kategori</label>
            <input 
                type="text" 
                name="nama" 
                id="nama"
                required 
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
            >
        </div>

        <div class="flex flex-wrap gap-2">
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm"
            >
                Simpan
            </button>

            {{-- Tombol kembali dinamis --}}
            @php
                $from = request('from');
                $id = request('id');
                $backUrl = route('kategori.index'); // Default: ke index kategori

                if ($from === 'barang.create') {
                    $backUrl = route('barang.create');
                } elseif ($from === 'barang.edit' && $id) {
                    $backUrl = route('barang.edit', $id);
                }
            @endphp

            <a 
                href="{{ $backUrl }}" 
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm"
            >
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
