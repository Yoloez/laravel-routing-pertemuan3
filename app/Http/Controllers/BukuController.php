<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $data_buku = Buku::all();
        $jumlah_buku = Buku::count();
        $total_harga = Buku::sum('harga');
        $nama_penulis = Buku::select('penulis') -> orderBy('penulis', 'asc') -> distinct() ->pluck('penulis'); 
        return view('buku/index', compact('data_buku', 'jumlah_buku', 'total_harga', 'nama_penulis'));
    }

    public function terbaru(){
        $data_buku = Buku::orderBy('tgl_terbit', 'desc')->limit(5)->get();
        return view('buku/terbaru', compact('data_buku'));
    }
}
