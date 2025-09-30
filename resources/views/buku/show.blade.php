@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>
    
    <a href="{{ url('/buku') }}" class="btn btn-secondary mb-3">Kembali</a>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>Judul:</strong> {{ $buku->judul }}</h5>
            <p class="card-text"><strong>Penulis:</strong> {{ $buku->penulis }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($buku->harga) }}</p>
            {{-- <p class="card-text"><strong>Tanggal Terbit:</strong> {{ $buku->tgl_terbit->format('d-m-Y') }}</p> --}}
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ url('/buku/' . $buku->id . '/edit') }}" class="btn btn-warning">Edit</a>
        <form action="{{ url('/buku/' . $buku->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
        </form>
    </div>
</div>
@endsection
