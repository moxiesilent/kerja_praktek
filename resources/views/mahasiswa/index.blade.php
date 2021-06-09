<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="top-right links">
  <a href="{{ url('/home') }}" class="btn btn-default">Home</a>
</div>
  <h2>Daftar Mahasiswa</h2><br>
  <!-- <a href="{{url('mahasiswas/create')}}" class="btn btn-primary" role="button">Tambah matakuliah baru</a> -->
  <table class="table">
    <thead>
      <tr>
        <th>NRP</th>
        <th>Nama Mahasiswa</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Telepon</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
      <tr>
        <td>{{$d->idmahasiswa}}</td>
        <td>{{$d->nama}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->tanggallahir}}</td>
        <td>{{$d->telepon}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
