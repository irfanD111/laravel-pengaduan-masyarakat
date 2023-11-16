<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bs1/bs2/css/bootstrap.min.css">
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        <br><br>
        <h2 style="text-align: center">{{ $hi }}</h2>
        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">nomer telpon</th>
                    <th scope="col">level</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $petugas)
                    <tr>
                        <td>{{ $petugas->id }}</td>
                        <td>{{ $petugas->nama_petugas }}</td>
                        <td>{{ $petugas->telp }}</td>
                        <td>{{ $petugas->level }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
