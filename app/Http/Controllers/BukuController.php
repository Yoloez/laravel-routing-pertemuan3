<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();
        // filter berdasarkan judul
        if ($request->filled('judul_buku')) {
            $query->where('judul', 'like', '%'.$request->judul_buku.'%');
        }
        // filter berdasarkan penulis
        if ($request->filled('penuliss') && $request->penuliss != 'default') {
            $query->where('penulis', $request->penuliss);
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
        $total_harga = $data_buku->sum('harga');
        $paling_mahal = $data_buku->max('harga');
        $paling_murah = $data_buku->min('harga');
        return view('buku.terbaru', compact('data_buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
$buku = new Buku();
$buku->judul = $request->judul;
$buku->penulis = $request->penulis;
$buku->harga = $request->harga;
$buku->tgl_terbit = $request->tgl_terbit;  
$buku->save();
return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect('/buku')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('success', 'Buku berhasil dihapus');
    }
}
