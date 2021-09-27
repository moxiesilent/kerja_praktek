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
    @if(session('status'))
      <div class="alert alert-success" role="alert">
          {{session('status')}}
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger" role="alert">
          {{session('error')}}
      </div>
    @endif
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
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{$d->idmahasiswa}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->email}}</td>
            <td>{{date('d-m-Y',strtotime($d->tanggallahir))}}</td>
            <td>{{$d->telepon}}</td>
            <td><a href="#modalEdit" data-toggle="modal" class="btn-sm btn-warning" onclick="getEditForm({{ $d->idmahasiswa }})">edit</a>
                <a href="{{url('mahasiswas/'.$d->idmahasiswa.'/edit')}}" class="btn-sm btn-warning">editt</a>
                <form method="POST" action="{{url('mahasiswas/'.$d->idmahasiswa)}}">
                @csrf
                @method('DELETE')
                <input type="submit" value='hapus' class='btn-sm btn-danger' onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;"/>
                </form>
            </td>
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
          <input type="date" class="form-control" id="tanggallahir" placeholder="01/01/1990" name="tanggallahir">
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
