@extends('layouts.argon')
@section('sidenav')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{url('dashboard')}}">
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
    <a class="nav-link" href="{{url('mahasiswa')}}">
      <i class="ni ni-single-02 text-default"></i>
      <span class="nav-link-text">Mahasiswa</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{url('semester')}}">
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
    <a class="nav-link active" href="{{url('penelitianback')}}">
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
<h2>Tabel penelitian</h2><br>

<div class="card">
  <div class="card-header border-0">
    <div class="col align-items-center">
        <h3 class="mb-0">Ubah Jurnal</h3><br>
      <form method="POST" action="{{url('penelitians/'.$data->idpenelitian)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kegiatan">Judul</label>
                <input type="text" class="form-control" id="kegiatan" value="{{$data->judul}}" name="judul">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" value="{{$data->tahun}}" name="tahun">
            </div>
            <div class="form-group">
            <div class="radio">
                <label>Jenis Kelamin</label><br>
                @if($data->tipe == 'penelitian')
                <label><input type="radio" name="tipe" value="penelitian" checked> Penelitian</label>&nbsp&nbsp
                <label><input type="radio" name="tipe" value="pengabdian"> Pengabdian</label>&nbsp&nbsp
                @else
                <label><input type="radio" name="tipe" value="penelitian" > Penelitian</label>&nbsp&nbsp
                <label><input type="radio" name="tipe" value="pengabdian" checked> Pengabdian</label>&nbsp&nbsp
                @endif
            </div>
            </div>
            <div class="form-group">
                <label for="sumber">Sumber dan Jenis Dana</label>
                <input type="text" class="form-control" id="sumber" value="{{$data->sumber}}" name="sumber">
            </div>
            <div class="form-group">
                <label for="dana">Jumlah Dana (dalam juta rupiah)</label>
                <input type="text" class="form-control" id="dana" value="{{$data->jumlah_dana}}" name="dana">
            </div>
            <div>
            <a href="{{url('penelitianback')}}" class="btn btn-default" role="button">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection

