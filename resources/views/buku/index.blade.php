@extends('layouts.master')

@section('content')
<div style="margin-bottom:20px;">
    <a href="{{ url('/buku/create') }}">
        <button style="padding:10px; cursor:pointer; background-color: #28a745; color: white; border: none; border-radius: 4px;">
            Tambah Buku
        </button>
    </a>
    <a href="{{ url('/terbaru') }}">
        <button style="margin-left:10px; padding:10px; cursor:pointer">
            Tampilkan 5 data teratas
        </button>
    </a>
</div>

<form action="/buku" method="GET" style="margin-bottom:20px;">
    <input type="text" name="judul_buku" placeholder="Cari judul buku..." style="padding: 10px;" value="{{ request('judul_buku') }}">
    
    <select style="padding: 10px;" name="penuliss">
        <option value="default" hidden>Filter Penulis</option>
        @foreach ($nama_penulis as $penulis)
        <option value="{{$penulis}}"  {{ request('penuliss') == $penulis ? 'selected' : '' }}>{{ $penulis }}</option>
        @endforeach
    </select>   
    
    <button type="submit" style="padding: 10px; cursor:pointer">Cari</button>
    <a href="{{ url()->current() }}"><button style="padding: 10px;">Reset</button></a>
</form>


<div>
    <table border="1" cellpadding="5" cellspacing="1" width="max-content">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($data_buku as $buku)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$buku->judul}}</td>
        <td>{{$buku->penulis}}</td>
        <td>{{$buku->harga}}</td>
        <td>{{$buku->tgl_terbit}}</td>
        <td style="display: flex; gap: 15px; align-items: center;">
            <a href="{{ url('/buku/' . $buku->id) }}" style="padding:6px; cursor:pointer; background-color: #28a745; color: white; border: none; border-radius: 7px; text-decoration:none;">Lihat</a>
            <a href="{{ url('/buku/' . $buku->id . '/edit') }}" class="btn btn-warning btn-sm" style="padding:6px; cursor:pointer; background-color: #d2a419ff; color: white; border: none; border-radius: 7px; text-decoration:none;">Edit</a>
            <form action="{{ url('/buku/' . $buku->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" style="padding:6px; cursor:pointer; background-color: red; color: white; border: none; border-radius: 5px">Hapus</button>
            </form>
        </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center;">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
    </table>
</div>

<div style="display:flex; gap:1rem; margin-top:1.5rem; flex-wrap:wrap;">
  <div style="flex:1 1 200px; padding:2rem; border-radius:1rem; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,.08);">
    <p style="margin:0; font-size:2rem; font-weight:600; color:#1f2937;">Jumlah Buku</p>
    <p style="margin:.25rem 0 0; font-size:2.5rem; font-weight:700; color="#3b82f6;">{{ $jumlah_buku }}</p>
  </div>
  <div style="flex:1 1 200px; padding:2rem; border-radius:1rem; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,.08);">
    <p style="margin:0; font-size:2rem; font-weight:600; color:#1f2937;">Total Harga</p>
    <p style="margin:.25rem 0 0; font-size:2.5rem; font-weight:700; color:#10b981;">Rp{{ number_format($total_harga) }}</p>
  </div>
  <div style="flex:1 1 200px; padding:2rem; border-radius:1rem; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,.08);">
    <p style="margin:0; font-size:2rem; font-weight:600; color:#1f2937;">Paling Mahal</p>
    <p style="margin:.25rem 0 0; font-size:2.5rem; font-weight:700; color="#ef4444;">Rp{{ number_format($paling_mahal) }}</p>
  </div>
  <div style="flex:1 1 200px; padding:2rem; border-radius:1rem; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,.08);">
    <p style="margin:0; font-size:2rem; font-weight:600; color:#1f2937;">Paling Murah</p>
    <p style="margin:.25rem 0 0; font-size:2.5rem; font-weight:700; color:#06b6d4;">Rp{{ number_format($paling_murah) }}</p>
  </div>
</div>

@endsection('')