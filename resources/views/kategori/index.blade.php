@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Kategori</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kategori.create', request()->only(['from', 'id'])) }}" 
       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600 text-sm">
        + Tambah Kategori
    </a>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 border text-left">No</th>
                    <th class="p-3 border text-left">Nama</th>
                    <th class="p-3 border text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3 border">{{ $loop->iteration + ($kategoris->currentPage() - 1) * $kategoris->perPage() }}</td>
                        <td class="p-3 border">{{ $kategori->nama }}</td>
                        <td class="p-3 border">
                            <form 
                                action="{{ route('kategori.destroy', $kategori->id) }}?from={{ request('from') }}@if(request('id'))&id={{ request('id') }}@endif" 
                                method="POST" 
                                class="inline"
                                onsubmit="return confirm('Yakin ingin hapus kategori ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-gray-500">Belum ada kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 space-y-3 sm:space-y-0 sm:flex sm:justify-between sm:items-center">
        <div>
            @if (request('from') === 'barang.create')
                <a href="{{ route('barang.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm inline-block">
                    ← Kembali ke Tambah Barang
                </a>
            @elseif (request('from') === 'barang.edit' && request('id'))
                <a href="{{ route('barang.edit', request('id')) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm inline-block">
                    ← Kembali ke Edit Barang
                </a>
            @else
                <a href="{{ route('home') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm inline-block">
                    ← Kembali ke Dashboard
                </a>
            @endif
        </div>

        <div class="mt-4 sm:mt-0">
            {{ $kategoris->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
