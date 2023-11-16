<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{ asset('bs1/bs2/css/bootstrap.min.css') }}>
</head>

<body>
    <div class="container">
        <ul class="nav nav-underline nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/petugas/home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/petugas/logout') }}">loguot</a>
            </li>

        </ul>
            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">nik</th>
                            <th scope="col">isi laporan</th>
                            <th scope="col">foto</th>
                            <th scope="col">Status</th>


                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$pengaduan->id_pengaduan}}</td>
                        <td>{{$pengaduan->tgl_pengaduan}}</td>
                        <td>{{$pengaduan->nik}}</td>
                        <td>{{$pengaduan->isi_laporan}}</td>
                        <td><img src='{{ asset('storage/image/' . $pengaduan->foto) }}' width="125px"
                            style="border-radius: 9px" /></td>
                        <form action="{{ url('/petugas/update', $pengaduan->id_pengaduan) }}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <td>
                            <select name="status">
                                <option>{{ $pengaduan->status }}</option>
                                <option>proses</option>
                                <option>selesai</option>
                            </select>
                            <br><br>
                            <button type="submit"  class="btn btn-outline-success">Simpan</button>
                        </td>
                        </form>
                    </tr>
                    </tbody>
                </table>
                    <form action="{{ url('/petugas/tanggapan' , $pengaduan->id_pengaduan)}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                         @csrf
                         <h2>Tanggapi</h2>
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="tanggapan" style="width: 50%"></textarea>
                                </div>
                                <button type="submit"  class="btn btn-outline-success">tanggapi</button>
                                <br><br>
                <h2>Tanggapan </h2>
                @foreach($tanggapan as $tanggapan)
                <div class="">
                    <p>ID : {{    $tanggapan->id_petugas }}</p>
                    <P>Nama Petugas : {{$tanggapan->nama_petugas}}</P>
                    <p>Isi Tanggapan     : {{   $tanggapan->tanggapan }}</p>
                </div>

                @endforeach
                
                
            </div>
</body>

</html>
