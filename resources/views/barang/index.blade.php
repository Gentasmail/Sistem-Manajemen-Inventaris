@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-3">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">+ Tambah Barang</a>
    </div>

    <!-- Form Pencarian dan Filter -->
    <form method="GET" class="flex flex-wrap gap-3 mb-6">
        <input 
            type="text" 
            name="search" 
            placeholder="Cari nama barang..." 
            value="{{ request('search') }}"
            class="border border-gray-300 px-4 py-2 rounded w-full md:w-1/3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <select 
            name="kategori_id" 
            class="border border-gray-300 px-4 py-2 rounded w-full md:w-1/4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            <option value="">Semua Kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-sm">Filter</button>
        <a href="{{ route('barang.index') }}" class="text-blue-600 px-3 py-2 text-sm">Reset</a>
    </form>

    <!-- Info Total -->
    <div class="bg-gray-100 p-4 rounded mb-6 text-sm">
        <p><strong>Total Barang:</strong> {{ $totalBarang }}</p>
        <p><strong>Total Harga Semua Barang:</strong> Rp {{ number_format($totalHarga) }}</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Responsif -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $barang)
                <tr class="text-center border-t">
                    <td class="px-4 py-2">{{ $barang->nama }}</td>
                    <td class="px-4 py-2">{{ $barang->kategori->nama }}</td>
                    <td class="px-4 py-2">{{ $barang->jumlah }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($barang->harga_satuan) }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('barang.edit', $barang->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                onclick="return confirm('Hapus barang ini?')" 
                                class="text-red-500 hover:underline"
                            >
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada barang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $barangs->links() }}
    </div>
</div>
@endsection
