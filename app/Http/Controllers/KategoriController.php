<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Tampilkan semua kategori
    public function index(Request $request)
    {
        $kategoris = Kategori::latest()->paginate(5);

        return view('kategori.index', [
            'kategoris' => $kategoris,
        ]);
    }

    // Form tambah kategori
    public function create(Request $request)
    {
        return view('kategori.create', [
            'from' => $request->from,
            'id' => $request->id,
        ]);
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        // Redirect dengan parameter asal (jika ada)
        $query = [];
        if ($request->has('from')) {
            $query['from'] = $request->from;
        }
        if ($request->has('id')) {
            $query['id'] = $request->id;
        }

        return redirect()->route('kategori.index', $query)->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Form edit kategori
    public function edit($id, Request $request)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', [
            'kategori' => $kategori,
            'from' => $request->from,
            'id' => $request->id,
        ]);
    }

    // Update kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
        ]);

        $query = [];
        if ($request->has('from')) {
            $query['from'] = $request->from;
        }
        if ($request->has('id')) {
            $query['id'] = $request->id;
        }

        return redirect()->route('kategori.index', $query)->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy($id, Request $request)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        $query = [];
        if ($request->has('from')) {
            $query['from'] = $request->from;
        }
        if ($request->has('id')) {
            $query['id'] = $request->id;
        }

        return redirect()->route('kategori.index', $query)->with('success', 'Kategori berhasil dihapus.');
    }
}
