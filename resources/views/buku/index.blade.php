@extends('layouts.master')

@section('content')
<a href="{{ url('buku/terbaru') }}">
    <button style="margin-bottom:20px; padding:10px; cursor:pointer">
        Tampilkan 5 data teratas
    </button>
</a>

<form action="/buku" method="GET" style="margin-bottom:20px;">
    <input type="text" name="judul_buku" placeholder="Cari judul buku..." style="padding: 10px;" value="{{ request('judul_buku') }}">
    
    <select style="padding: 10px;" name="penulis">
        <option value="default" hidden>Filter Penulis</option>
        @foreach ($nama_penulis as $penulis)
        <option value="{{$penulis}}"  {{ request('penulis') == $penulis ? 'selected' : '' }}>{{ $penulis }}</option>
        @endforeach
    </select>
    
    <button type="submit" style="padding: 10px; cursor:pointer">Cari</button>
    <a href="{{ url()->current() }}"><button style="padding: 10px;">Reset</button></a>
</form>


<div>
    <table border="1" cellpadding="5" cellspacing="1" width="600px">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
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
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center;">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
    </table>
</div>

<div style="display: flex; gap: 20px; margin-top: 20px;">
<div style="margin-top:20px; padding:40px; border:1px solid #000000ff; width:fit-content; background:linear-gradient(to right, #EA5455, #F07B3F, #FFD460 100%);">
    <p style="font-size:2rem; line-height:3rem; text-align:center;">Jumlah Buku: <br>{{$jumlah_buku}}</p>
</div>
<div style="margin-top:20px; padding:40px; border:1px solid #000000ff; width:fit-content; background:linear-gradient(to right, #C6D870, #8FA31E, #556B2F 100%);">
<p style="font-size:2rem; line-height:3rem; text-align:center;">Total harga: <br>Rp{{number_format($total_harga)}}</p>
</div>
<div style="margin-top:20px; padding:40px; border:1px solid #000000ff; width:fit-content; background:linear-gradient(to right, #EA5455, #F07B3F, #FFD460 100%);">
<p style="font-size:2rem; line-height:3rem; text-align:center;">Paling Mahal: <br>Rp{{number_format($paling_mahal)}}</p>
</div>
<div style="margin-top:20px; padding:40px; border:1px solid #000000ff; width:fit-content; background:linear-gradient(to right, #EA5455, #F07B3F, #FFD460 100%);">
<p style="font-size:2rem; line-height:3rem; text-align:center;">Paling Murah: <br>Rp{{ number_format($paling_murah)}}</p>
</div>
</div>

@endsection('')