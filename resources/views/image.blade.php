@extends('layouts.master')

@section('content')
<img src="{{url('/assets/images/sports car.jpeg')}}" alt="" width="300px" height="400px"> 


<table border="1" cellpadding="5" cellspacing="1" width="600px">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
        </tr>
    </thead>

    @forelse ($oddy_limit as $data)
    <tbody>
        <tr>
            <td>{{$loop->iteration}}</td>
            {{-- <td>{{$data->id}}</td> --}}
            <td>{{$data->nama}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->pekerjaan}}</td>
        </tr>
    </tbody>
    @empty
    
    @endforelse
</table>
@endsection('')


