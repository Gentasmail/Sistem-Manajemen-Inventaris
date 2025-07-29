@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-xl font-bold mb-6">Tambah Barang</h2>

    {{-- Error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4 text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('barang.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Nama --}}
        <div>
            <label for="nama" class="block font-medium mb-1">Nama Barang</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block font-medium mb-1">Kategori</label>
            <div class="flex flex-col sm:flex-row gap-2">
                <select name="kategori_id"
                        class="border rounded px-3 py-2 w-full sm:w-1/2 focus:outline-none focus:ring focus:border-blue-300" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>

                <div class="flex gap-2 w-full sm:w-auto">
                    <a href="{{ route('kategori.create', ['from' => 'barang.create']) }}"
                       class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600 text-sm text-center whitespace-nowrap w-full sm:w-auto">
                        + Kategori
                    </a>

                    <a href="{{ route('kategori.index', ['from' => 'barang.create']) }}"
                       class="bg-orange-500 text-white px-3 py-2 rounded hover:bg-orange-600 text-sm text-center whitespace-nowrap w-full sm:w-auto">
                        Kelola Kategori
                    </a>
                </div>
            </div>
        </div>

        {{-- Jumlah --}}
        <div>
            <label for="jumlah" class="block font-medium mb-1">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" min="1"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        {{-- Harga Satuan --}}
        <div>
            <label for="harga_satuan" class="block font-medium mb-1">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan') }}" min="0"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        {{-- Tombol --}}
        <div class="flex flex-col sm:flex-row gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full sm:w-auto">
                Simpan
            </button>
            <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 w-full sm:w-auto">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
