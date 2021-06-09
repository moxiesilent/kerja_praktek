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
  <h2>Lengkapi Data Diri Anda</h2>
<!-- alert sukses apabila prestasi berhasil ditambahkan -->
  @if(session('status'))
    <div class="alert alert-success">
      <strong>Success!</strong>{{session('status')}}
    </div>
  @endif
  <!-- form untuk menambahkan prestasi -->
  <form method="POST" action="{{url('mahasiswas')}}">
  @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" disabled>
    </div>
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama" placeholder="Nama lengkap" name="nama">
    </div>
    <div class="form-group">
      <label for="nrp">NRP</label>
      <input type="text" class="form-control" id="nrp" placeholder="NRP" name="nrp">
    </div>
    <div class="form-group">
      <label for="ttl">Tanggal Lahir</label>
      <input type="date" class="form-control" id="ttl" placeholder="Tanggal lahir" name="ttl">
    </div>
    <a href="{{url('mahasiswas')}}" class="btn btn-default" role="button">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
