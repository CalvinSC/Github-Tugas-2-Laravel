@extends('layout.main')

@section('content')
    <h1>Mahasiswa</h1>

    @foreach ($mahasiswa as $item)
        {{ $item->nama }}
        {{ $item->nim }}
        {{ $item->prodi->nama }}
        {{ $item->prodi->nama }}
    @endforeach
@endsection