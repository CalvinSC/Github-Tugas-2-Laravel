@extends('layout.main')
@section('content')
    <h1>Program Studi</h1>
        <table>
            <th>Nama</th>
            <th>Singkatan</th>
            <th>Kaprodi</th>
            <th>Sekretaris</th>
            <th>Fakultas</th>
        @foreach ($prodi as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td> {{ $item->singkatan }}</td>
            <td>{{ $item->kaprodi}}</td>
            <td>{{ $item->Sekretaris}}</td>
            <td>{{ $item->fakultas->nama}}</td>
        </tr>
        @endforeach
        </table>

@endsection