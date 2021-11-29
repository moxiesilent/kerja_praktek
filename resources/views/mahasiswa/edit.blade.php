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
    <a class="nav-link" href="{{url('profil')}}">
      <i class="ni ni-planet text-success"></i>
      <span class="nav-link-text">Profil</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('prestasi')}}">
      <i class="ni ni-trophy text-orange"></i>
      <span class="nav-link-text">Prestasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('dosen')}}">
      <i class="ni ni-single-02 text-primary"></i>
      <span class="nav-link-text">Dosen</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('matakuliah')}}">
      <i class="ni ni-books text-yellow"></i>
      <span class="nav-link-text">Matakuliah</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('mahasiswa')}}">
      <i class="ni ni-single-02 text-default"></i>
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
      <i class="ni ni-calendar-grid-58 text-pink"></i>
      <span class="nav-link-text">Jadwal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('jurnalback')}}">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Jurnal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('penelitianback')}}">
      <i class="ni ni-ruler-pencil text-dark"></i>
      <span class="nav-link-text">Penelitian</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('artikelback')}}">
      <i class="ni ni-spaceship text-dark"></i>
      <span class="nav-link-text">Artikel</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('galeri')}}">
      <i class="ni ni-image text-dark"></i>
      <span class="nav-link-text">Galeri</span>
    </a>
  </li>
</ul>
@endsection
@section('nama')
<span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
@endsection
@section('content')
<h2>Tabel Prestasi</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="align-items-center">
        <h2>Edit Mahasiswa</h2><br>
    <form method="POST" action="{{url('mahasiswas/'.$data->idmahasiswa)}}">
      @csrf
      @method('PUT')
        <div class="form-group">
          <label for="idmahasiswa">Nomor Mahasiswa</label>
          <input type="text" class="form-control" id="idmahasiswa" name="idmahasiswa" value="{{$data->idmahasiswa}}" disabled>
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
        </div>
        <div class="form-group">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control datepicker" id="tanggallahir" name="tanggallahir" value="{{$data->tanggallahir}}">
        </div>
        <div class="form-group">
          <div class="radio">
              <label>Jenis Kelamin</label><br>
              @if($data->jenis_kelamin == 'laki-laki')
              <label><input type="radio" name="jeniskelamin" value="laki-laki" checked> Laki-laki</label>&nbsp&nbsp
              <label><input type="radio" name="jeniskelamin" value="perempuan"> Perempuan</label>&nbsp&nbsp
              @else
              <label><input type="radio" name="jeniskelamin" value="laki-laki" > Laki-laki</label>&nbsp&nbsp
              <label><input type="radio" name="jeniskelamin" value="perempuan" checked> Perempuan</label>&nbsp&nbsp
              @endif
          </div>
        </div>
        <div class="form-group">
          <label for="telepon">Nomor Telepon</label>
          <input type="text" class="form-control" id="telepon" name="telepon" value="{{$data->telepon}}">
        </div>
      </div>
            <div>
                <a href="{{url('mahasiswas')}}" class="btn btn-default" role="button">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

