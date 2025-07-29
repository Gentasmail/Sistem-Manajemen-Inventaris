<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $totalBarang = Barang::count();
        $totalKategori = Kategori::count();
        $totalHarga = Barang::sum(DB::raw('jumlah * harga_satuan'));
        $barangs = Barang::latest()->take(5)->get();

        return view('home', compact('totalBarang', 'totalKategori', 'totalHarga', 'barangs'));
    }
}
