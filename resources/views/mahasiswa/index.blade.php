@extends('layouts.argon')
@section('content')
<h2>Daftar Mahasiswa</h2><br>
<div class="card">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Daftar Mahasiswa</h3>
      </div>
      <div class="col text-right">
      <a href="" role="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
        Tambah Mahasiswa
      </a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
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
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('mahasiswas')}}">
      @csrf
        <div class="form-group">
          <label for="idmahasiswa">Nomor Mahasiswa</label>
          <input type="text" class="form-control" id="idmahasiswa" placeholder="1234xxxx" name="idmahasiswa">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="contoh@gmail.com" name="email">
        </div>
        <div class="form-group">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control datepicker" id="tanggallahir" placeholder="01/01/1990" name="tanggallahir">
        </div>
        <div class="form-group">
          <label for="telepon">Nomor Telepon</label>
          <input type="text" class="form-control" id="telepon" placeholder="08123xxxxxx" name="telepon">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
