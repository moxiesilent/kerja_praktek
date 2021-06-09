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
  <h2>Tambah Data Prestasi</h2>
<!-- alert sukses apabila prestasi berhasil ditambahkan -->
  @if(session('status'))
    <div class="alert alert-success">
      <strong>Success!</strong>{{session('status')}}
    </div>
  @endif
  <!-- form untuk menambahkan prestasi -->
  <form method="POST" action="{{url('prestasis')}}">
  @csrf
    <div class="form-group">
      <label for="kegiatan">Nama kegiatan</label>
      <input type="text" class="form-control" id="kegiatan" placeholder="Nama kegiatan" name="kegiatan">
    </div>
    <div class="form-group">
      <label for="tahun">Tahun</label>
      <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun">
    </div>
    <div class="radio">
        <label><input type="radio" name="tingkat" value="lokal">Lokal</label>&nbsp&nbsp
        <label><input type="radio" name="tingkat" value="regional">Regional</label>&nbsp&nbsp
        <label><input type="radio" name="tingkat" value="nasional">Nasional</label>&nbsp&nbsp
        <label><input type="radio" name="tingkat" value="internasional">Internasional</label>
    </div>
    <div class="form-group">
      <label for="prestasi">Prestasi yang dicapai</label>
      <input type="text" class="form-control" id="prestasi" placeholder="Prestasi yang dicapai" name="prestasi">
    </div>
    <a href="{{url('prestasis')}}" class="btn btn-default" role="button">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
