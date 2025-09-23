@extends('layouts.master')
@section('content')
<a href="{{ url('buku/') }}">
    <button>
        Kembali ke data semua buku
    </button>
</a>
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
@endsection('')


