@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{url('dashboard')}}">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('prestasi')}}">
      <i class="ni ni-planet text-orange"></i>
      <span class="nav-link-text">Prestasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('dosen')}}">
      <i class="ni ni-pin-3 text-primary"></i>
      <span class="nav-link-text">Dosen</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('matakuliah')}}">
      <i class="ni ni-single-02 text-yellow"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('mahasiswa')}}">
      <i class="ni ni-bullet-list-67 text-default"></i>
      <span class="nav-link-text">Mahasiswa</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('semester')}}">
      <i class="ni ni-key-25 text-info"></i>
      <span class="nav-link-text">Semester</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('mengajar')}}">
      <i class="ni ni-circle-08 text-pink"></i>
      <span class="nav-link-text">Jadwal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('jurnal')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
</ul>
@endsection
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
          <th></th>
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
            <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="dropdown-item">
                    <a class="dropdown-item" href="{{url('mahasiswas/'.$d->idmahasiswa.'/edit')}}">Edit</a>
                  </div> 
                    <form class="dropdown-item" method="POST" action="{{url('mahasiswas/'.$d->idmahasiswa)}}">
                      @csrf
                      @method('DELETE')
                      <a class="dropdown-item" type="submit" onclick="if(!confirm('apakah anda yakin menghapus data ini?')) return false;">Hapus</a>
                    </form>
                </div>
            </div>
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
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
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
