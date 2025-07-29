<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang dengan fitur pencarian
    public function index(Request $request)
{
    $query = Barang::with('kategori');

    // Filter pencarian
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    // Filter kategori
    if ($request->filled('kategori_id')) {
        $query->where('kategori_id', $request->kategori_id);
    }

    $barangs = $query->latest()->paginate(5)->appends($request->all());

    // Ambil semua kategori untuk dropdown
    $kategoris = Kategori::all();

    // Hitung total harga dan jumlah barang yang difilter
    $totalHarga = $query->sum(\DB::raw('jumlah * harga_satuan'));
    $totalBarang = $query->count();

    return view('barang.index', compact('barangs', 'kategoris', 'totalHarga', 'totalBarang'));
}

    // Menampilkan form tambah barang
    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
        ]);

        Barang::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    // Memperbarui data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil dihapus');
    }
}
