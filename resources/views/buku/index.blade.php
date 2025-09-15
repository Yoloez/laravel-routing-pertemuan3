@extends('layouts.master')

@section('content')
<a href="{{ url('buku/terbaru') }}">
    <button style="margin-bottom:20px; padding:10px; cursor:pointer">
        Tampilkan 5 data teratas
    </button>
</a>

<select name="sort" id="sort" style="padding:10px" >
    <option value="default" hidden>Sorting</option>
    <option value="harga_terendah">Harga Terendah</option>
    <option value="harga_tertinggi">Harga Tertinggi</option>
    <option value="judul_a_z">Judul A-Z</option>
    <option value="judul_z_a">Judul Z-A</option>
    <option value="terbaru">Terbaru</option>
    <option value="terlama">Terlama</option>
</select>

<select style="padding: 10px;">
    <option value="default" hidden>Filter Penulis</option>
    @foreach ($nama_penulis as $penulis)
    <option value="{{$penulis}}">{{ $penulis }}</option>
    @endforeach
</select>


<div>
    <table border="1" cellpadding="5" cellspacing="1" width="600px">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
        </tr>
        @foreach ($data_buku as $buku)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$buku->judul}}</td>
        <td>{{$buku->penulis}}</td>
        <td>{{$buku->harga}}</td>
        <td>{{$buku->tgl_terbit}}</td>
    </tr>
    @endforeach
    </table>
</div>

<p>Jumlah Buku: {{$jumlah_buku}}</p>
<p>Total harga: {{ $total_harga}}</p>


@endsection('')