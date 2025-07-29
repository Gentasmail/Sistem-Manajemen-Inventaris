@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h2>

    @if (session('status'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    {{-- Stat Boxes --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Total Barang</p>
            <p class="text-2xl font-bold text-blue-600">{{ $totalBarang }}</p>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Total Kategori</p>
            <p class="text-2xl font-bold text-green-600">{{ $totalKategori }}</p>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Total Nilai Inventaris</p>
            <p class="text-2xl font-bold text-indigo-600">Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Barang Terbaru --}}
    <div class="bg-white shadow-md rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Barang Terbaru</h3>
        <ul class="divide-y divide-gray-200">
            @forelse ($barangs as $barang)
                <li class="py-4">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                        <div>
                            <p class="font-medium text-gray-800">{{ $barang->nama }} ({{ $barang->jumlah }} unit)</p>
                            <p class="text-sm text-gray-500">Kategori: {{ $barang->kategori->nama ?? '-' }}</p>
                        </div>
                        <div class="text-sm text-gray-500 sm:text-right">
                            Rp {{ number_format($barang->harga_satuan, 0, ',', '.') }}
                        </div>
                    </div>
                </li>
            @empty
                <li class="py-2 text-gray-500">Tidak ada data barang.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
