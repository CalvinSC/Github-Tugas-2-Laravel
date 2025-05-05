<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<body>
    <h1>Universitas MDP</h1>
    <a href="{{ url('/fakultas') }}">Fakultas</a>
    <a href="{{ url('/prodi') }}">Program Studi</a>
    <a href="{{ url('/mahasiswa') }}">Mahasiswa</a>
    @yield('content')
    &copy; 2025
</body>
</html>