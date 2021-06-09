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
  <h2>Tambah Matakuliah</h2>
<!-- alert sukses apabila prestasi berhasil ditambahkan -->
  @if(session('status'))
    <div class="alert alert-success">
      <strong>Success!</strong>{{session('status')}}
    </div>
  @endif
  <!-- form untuk menambahkan prestasi -->
  <form method="POST" action="{{url('matakuliahs')}}">
  @csrf
    <div class="form-group">
      <label for="nama">Nama Matakuliah</label>
      <input type="text" class="form-control" id="nama" placeholder="Nama matakuliah" name="nama">
    </div>
    <div class="form-group">
      <label for="kode">Kode Matakuliah</label>
      <input type="text" class="form-control" id="kode" placeholder="Kode matakuliah" name="kode">
    </div>
    <div class="form-group">
      <label for="sks">Jumlah SKS</label>
      <input type="text" class="form-control" id="sks" placeholder="Jumlah sks (angka)" name="sks">
    </div>
    <a href="{{url('matakuliahs')}}" class="btn btn-default" role="button">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
