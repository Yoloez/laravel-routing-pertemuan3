<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        // filter berdasarkan penulis
        if ($request->filled('penulis') && $request->penulis != 'default') {
            $query->where('penulis', $request->penulis);
        }

        // filter berdasarkan judul
        if ($request->filled('judul_buku')) {
            $query->where('judul', 'like', '%'.$request->judul_buku.'%');
        }

        // ambil data sesuai query
        $data_buku = $query->get();

        $jumlah_buku = $data_buku->count();
        $total_harga = $data_buku->sum('harga');
        $paling_mahal = $data_buku->max('harga');
        $paling_murah = $data_buku->min('harga');

        $nama_penulis = Buku::select('penulis')
            ->orderBy('penulis', 'asc')
            ->distinct()
            ->pluck('penulis');

        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga', 'nama_penulis', 'paling_mahal', 'paling_murah'));
    }

    public function terbaru()
    {
        $data_buku = Buku::orderBy('tgl_terbit', 'desc')->limit(5)->get();
        return view('buku.terbaru', compact('data_buku'));
    }
}
